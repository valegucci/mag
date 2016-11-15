<?php

namespace Mag\Onfleet;

/**
 * Class Team
 * @package Anorgan\Onfleet
 */
class Team extends Entity
{
    protected $name;
    protected $workers  = array();
    protected $managers = array();
    protected $tasks    = array();
    protected $hub;
    protected $timeCreated;
    protected $timeLastModified;

    protected $endpoint = 'teams';

    protected static $properties = array(
        'id',
        'name',
        'workers',
        'managers',
        'tasks',
        'hub',
        'timeCreated',
        'timeLastModified',
    );

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getWorkers()
    {
        return $this->workers;
    }

    /**
     * @param array $workers
     */
    public function setWorkers(array $workers)
    {
        $this->workers = $workers;
    }

    /**
     * @return array
     */
    public function getManagers()
    {
        return $this->managers;
    }

    /**
     * @param array $managers
     */
    public function setManagers(array $managers)
    {
        $this->managers = $managers;
    }

    /**
     * @return array
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @return string
     */
    public function getHub()
    {
        return $this->hub;
    }

    /**
     * @param string $hub
     */
    public function setHub($hub)
    {
        $this->hub = $hub;
    }

    /**
     * @return \DateTime
     */
    public function getTimeCreated()
    {
        return $this->toDateTime($this->timeCreated);
    }

    /**
     * @return \DateTime
     */
    public function getTimeLastModified()
    {
        return $this->toDateTime($this->timeLastModified);
    }

    /**
     * @param array $metadata
     * @internal
     */
    public function setMetadata(array $metadata)
    {
        throw new \BadMethodCallException('Team does not support metadata');
    }
}
