<?php

namespace Mag\Onfleet;

use  Route4Me\Member;
use Route4M;

/**
 * Class Entity
 * @package Anorgan\Onfleet
 */
abstract class Entity
{
    protected $id;
    protected $metadata = array();

    /**
     * @var Client
     */
    protected $client;

    protected $endpoint;
    protected static $properties = array();

    /**
     * Entity constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @internal
     */
    public function getMetadata()
    {
        throw new \BadMethodCallException('Entity does not support metadata');
    }

    /**
     * @return array
     */
    public function getNormalizedMetadata()
    {
        $normalizedMetadata = array();
        foreach ($this->metadata as $metadatum) {
            $normalizedMetadata[$metadatum['name']] = $metadatum['value'];
        }

        return $normalizedMetadata;
    }

    /**
     * @param array $metadata
     */
    public function setMetadata(array $metadata)
    {
        $structuredMetadata = array();

        foreach ($metadata as $property => $value) {
            $type    = gettype($value);
            $subtype = null;
            switch ($type) {
                case 'boolean':
                case 'string':
                case 'object':
                    // Valid type
                    break;

                case 'integer':
                case 'double':
                    $type = 'number';
                    break;

                case 'array':
                    if (is_string(reset($value))) {
                        $type = 'object';
                        break;
                    }

                    $subtype = gettype($value[0]);
                    array_walk($value, function ($item) use ($subtype, $property) {
                        if (gettype($item) !== $subtype) {
                            throw new \InvalidArgumentException('All array items have to be of the same type for metadata property '. $property);
                        }
                    });

                    if ($subtype == 'integer' || $subtype === 'double') {
                        $subtype = 'number';
                    }
                    $allowedSubtypes = array('boolean', 'number', 'string', 'object');
                    if (!in_array($subtype, $allowedSubtypes)) {
                        throw new \InvalidArgumentException('Unallowed type of '. $subtype .' for array item of metadata property '. $property);
                    }

                    break;

                default:
                    throw new \InvalidArgumentException('Unallowed type of '. $type .' for metadata property '. $property);
            }

            $metadatum = array(
                'name'       => $property,
                'type'       => $type,
                'value'      => $value,
                'visibility' => array('api')
            );

            if (isset($subtype)) {
                $metadatum['subtype'] = $subtype;
            }

            $structuredMetadata[] = $metadatum;
        }

        $this->metadata = $structuredMetadata;
    }

    /**
     * @return Entity
     */
    public function update()
    {
        $response = $this->client->put($this->endpoint .'/'. $this->id, array(
            'json' => $this->toArray()
        ));

        static::setProperties($this, $response->json(array('object' => true)));

        return $this;
    }

    /**
     * @throws \Exception
     */
    public function delete()
    {
        try {
            $this->client->delete($this->endpoint .'/'. $this->id);
        } catch (ClientException $e) {
            $error   = $e->getResponse()->json();
            $message = $error['message']['message'];
            if (isset($error['message']['cause'])) {
                $message .= ' '. $error['message']['cause'];
            }
            throw new \Exception('Unable to delete entity: '. $message);
        }

        $this->id = null;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = array();
        foreach (static::$properties as $property) {
            $array[$property] = $this->$property;
        }
        return $array;
    }

    /**
     * @param object $json
     * @param Client $client
     * @return static
     */
    public static function fromJson($json, Client $client)
    {
        $entity = new static($client);
        static::setProperties($entity, $json);

        return $entity;
    }

    /**
     * @param int $timestamp Timestamp in milliseconds
     * @return \DateTime
     */
    protected function toDateTime($timestamp)
    {
        $date = new \DateTime();
        $date->setTimestamp($timestamp / 1000);
        return $date;
    }

    /**
     * @param int|\DateTime $time
     * @return int
     */
    protected function toTimestamp($time)
    {
        if ($time instanceof \DateTime) {
            $time = $time->getTimestamp() * 1000;
        }

        return $time;
    }

    /**
     * @param Entity $entity
     * @param object $data
     */
    protected static function setProperties(Entity $entity, $data)
    {
        foreach (static::$properties as $property) {
            if (!isset($data->$property)) {
                continue;
            }

            $entity->$property = json_decode(json_encode($data->$property), true);
        }
    }
}
