<?php

namespace Mag\Onfleet;

use  Route4Me\Member;
use Route4M;

/**
 * Class Client
 * @package Anorgan\Onfleet
 */
class Client
{
    const BASE_URL = 'https://www.route4me.com';

    /**
     * Client constructor.
     * @param string $username
     * @param array $config
     */
    public function __construct($username, array $config = array())
    {

    }

    /**
     * @param string $url
     * @param array $options
     * @throws \Exception
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function post($url = null, array $options = array())
    {
        
    }

    /**
     * @param string $url
     * @param array $options
     * @return \GuzzleHttp\Message\ResponseInterface|null
     */
    public function get($url = null, $options = array())
    {

    }

    /**
     * @return Organization
     */
    public function getMyOrganization()
    {

    }

    /**
     * Get delegatee organization
     *
     * @param string $id
     * @return Organization
     */
    public function getOrganization($id)
    {

    }

    /**
     * @param array $data {
     * @var string $name The administrator’s complete name.
     * @var string $email The administrator’s email address.
     * @var string $phone Optional. The administrator’s phone number.
     * @var boolean $isReadOnly Optional. Whether this administrator can perform write operations.
     * }
     * @return Administrator
     */
    public function createAdministrator(array $data)
    {

    }

    /**
     * @return Administrator[]
     */
    public function getAdministrators()
    {

    }

    /**
     * @param array $data {
     * @var string $name The worker’s complete name.
     * @var string $phone A valid phone number as per the worker’s organization’s country.
     * @var string|array $teams One or more team IDs of which the worker is a member.
     * @var object $vehicle Optional. The worker’s vehicle; providing no vehicle details is equivalent to the
     *                              worker being on foot.
     * @var string $type The vehicle’s type, must be one of CAR, MOTORCYCLE, BICYCLE or TRUCK.
     * @var string $description Optional. The vehicle’s make, model, year, or any other relevant identifying details.
     * @var string $licensePlate Optional. The vehicle’s license plate number.
     * @var string $color Optional. The vehicle's color.
     * @var integer $capacity Optional. The maximum number of units this worker can carry, for route optimization purposes.
     * }
     * @return Worker
     */
    public function createWorker(array $data)
    {
    }

    /**
     * @param string $filter Optional. A comma-separated list of fields to return, if all are not desired. For example, name, location.
     * @param string $teams Optional. A comma-separated list of the team IDs that workers must be part of.
     * @param string $states Optional. A comma-separated list of worker states, where
     *                       0 is off-duty, 1 is idle (on-duty, no active task) and 2 is active (on-duty, active task).
     * @return Worker[]
     */
    public function getWorkers($filter = null, $teams = null, $states = null)
    {

    }

    /**
     * @param string $id
     * @param string $filter Optional. A comma-separated list of fields to return, if all are not desired.
     *                        For example: "name, location".
     * @param bool $analytics Basic worker duty event, traveled distance (meters) and time analytics are optionally
     *                        available by specifying the query parameter analytics as true.
     * @return Worker
     *
     * @todo: Add "from" and "to" timestamps if analytics is true
     */
    public function getWorker($id, $filter = null, $analytics = false)
    {

    }

    /**
     * @return Hub[]
     */
    public function getHubs()
    {

    }

    /**
     * @param array $data {
     * @var string $name A unique name for the team.
     * @var array $workers An array of worker IDs.
     * @var array $managers An array of managing administrator IDs.
     * @var string $hub Optional. The ID of the team's hub.
     * }
     *
     * @return Team
     */
    public function createTeam(array $data)
    {

    }

    /**
     * @return Team[]
     */
    public function getTeams()
    {

    }

    /**
     * @param string $id
     * @return Team
     */
    public function getTeam($id)
    {

    }

    /**
     * @param array $data {
     * @var array $address The destination’s street address details. {
     * @var string $name Optional. A name associated with this address, e.g., "Transamerica Pyramid".
     * @var string $number The number component of this address, it may also contain letters.
     * @var string $street The name of the street.
     * @var string $apartment Optional. The suite or apartment number, or any additional relevant information.
     * @var string $city The name of the municipality.
     * @var string $state Optional. The name of the state, province or jurisdiction.
     * @var string $postalCode Optional. The postal or zip code.
     * @var string $country The name of the country.
     * @var string $unparsed Optional. A complete address specified in a single, unparsed string where the
     *                                 various elements are separated by commas. If present, all other address
     *                                 properties will be ignored (with the exception of name and apartment).
     *                                 In some countries, you may skip most address details (like city or state)
     *                                 if you provide a valid postalCode: for example,
     *                                 543 Howard St, 94105, USA will be geocoded correctly.
     *     }
     * @var string $notes Optional. Note that goes with this destination, e.g. "Please call before"
     * @var array $location Optional. The [ longitude, latitude ] geographic coordinates. If missing, the API will
     *                          geocode based on the address details provided. Note that geocoding may slightly modify
     *                          the format of the address properties. address.unparsed cannot be provided if you are
     *                          also including a location.
     * }
     * @return Destination
     */
    public function createDestination(array $data)
    {
    }

    /**
     * @param string $id
     * @return Destination
     */
    public function getDestination($id)
    {

    }

    /**
     * @param array $data {
     * @var string $name The recipient’s complete name.
     * @var string $phone A unique, valid phone number as per the recipient’s organization’s country.
     * @var string $notes Optional. Notes for this recipient: these are global notes that should not be
     *                          task- or destination-specific.
     *                          For example, "Customer since June 2012, does not drink non-specialty coffee".
     * @var boolean $skipSMSNotifications Optional. Whether this recipient has requested to not receive SMS
     *                          notifications. Defaults to false if not provided.
     * @var boolean $skipPhoneNumberValidation Optional. Whether to skip validation of this recipient's phone
     *                          number. An E.164-like number is still required (must start with +), however the API
     *                          will not enforce any country-specific validation rules.
     * }
     * @return Recipient
     */
    public function createRecipient(array $data)
    {

    }

    /**
     * @param string $id
     * @return Recipient
     */
    public function getRecipient($id)
    {

    }

    /**
     * @param string $name
     * @return Recipient|null
     */
    public function getRecipientByName($name)
    {

    }

    /**
     * @param string $phone
     * @return Recipient|null
     */
    public function getRecipientByPhone($phone)
    {

    }

    /**
     * @see Task::createAutoAssignedArray
     * @param array $data
     * @return Task
     */
    public function createTask(array $data)
    {

    }

    /**
     * @param int|\DateTime $from The starting time of the range. Tasks created or completed at or after this time will be included.
     *                                 Millisecond precision int or DateTime
     * @param int|\DateTime $to Optional. If missing, defaults to the current time. The ending time of the range.
     *                                 Tasks created or completed before this time will be included.
     *                                 Millisecond precision int or DateTime
     * @param string $lastId Optional. Used to walk the paginated response, if there is one. Tasks created after this ID
     *                       will be returned, up to the per-query limit of 64.
     * @return Task[]
     */
    public function getTasks($from, $to = null, &$lastId = null)
    {

    }

    /**
     * @param string $id
     * @return Task
     */
    public function getTask($id)
    {

    }

    /**
     * @param string $shortId
     * @return Task
     */
    public function getTaskByShortId($shortId)
    {

    }

    /**
     * Replace all organization's tasks.
     *
     * @param array $taskIds
     * @param string $organizationId
     */
    public function setOrganizationTasks(array $taskIds, $organizationId)
    {

    }

    /**
     * @param array $taskIds
     * @param string $organizationId
     */
    public function addTasksToOrganization(array $taskIds, $organizationId)
    {

    }

    /**
     * Replace all team's tasks.
     *
     * @param array $taskIds
     * @param string $teamId
     */
    public function setTeamTasks(array $taskIds, $teamId)
    {

    }

    /**
     * @param array $taskIds
     * @param string $teamId
     */
    public function addTasksToTeam(array $taskIds, $teamId)
    {

    }

    /**
     * Replace all worker's tasks.
     *
     * @param array $taskIds
     * @param string $workerId
     */
    public function setWorkerTasks(array $taskIds, $workerId)
    {

    }

    /**
     * @param array $taskIds
     * @param string $workerId
     */
    public function addTasksToWorker(array $taskIds, $workerId)
    {

    }

    /**
     * @param string $url
     * @param int $triggerId
     * @return Webhook
     */
    public function createWebhook($url, $triggerId)
    {

    }

    /**
     * @return Webhook[]
     */
    public function getWebhooks()
    {

    }

    /**
     * @param string $containerEndpoint "organizations", "workers" or "teams"
     * @param string $targetId ID of organization, worker or team.
     * @param array $taskIds Array of task IDs.
     * @param int $position Insert tasks at a given index. To append to the end, use -1, to prepend, use 0.
     */
    private function setContainerTasks($containerEndpoint, $targetId, array $taskIds, $position = null)
    {

    }
}
