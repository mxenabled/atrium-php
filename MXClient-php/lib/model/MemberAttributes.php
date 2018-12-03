<?php
/**
 * MemberAttributes
 *
 * PHP version 5
 *
 * @category Class
 * @package  atrium
 */

/**
 * MX API
 *
 * The MX Atrium API supports over 48,000 data connections to thousands of financial institutions. It provides secure access to your users' accounts and transactions with industry-leading cleansing, categorization, and classification.  Atrium is designed according to resource-oriented REST architecture and responds with JSON bodies and HTTP response codes.  Use Atrium's development environment, vestibule.mx.com, to quickly get up and running. The development environment limits are 100 users, 25 members per user, and access to the top 15 institutions. Contact MX to purchase production access.
 *
 */


namespace atrium\model;

use \ArrayAccess;
use \atrium\ObjectSerializer;

/**
 * MemberAttributes Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class MemberAttributes implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $mxModelName = 'MemberAttributes';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxTypes = [
        'aggregated_at' => 'string',
        'connection_status' => 'string',
        'guid' => 'bool',
        'identifier' => 'string',
        'institution_code' => 'string',
        'is_being_aggregated' => 'bool',
        'metadata' => 'string',
        'name' => 'string',
        'status' => 'string',
        'successfully_aggregated_at' => 'string',
        'user_guid' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxFormats = [
        'aggregated_at' => null,
        'connection_status' => null,
        'guid' => null,
        'identifier' => null,
        'institution_code' => null,
        'is_being_aggregated' => null,
        'metadata' => null,
        'name' => null,
        'status' => null,
        'successfully_aggregated_at' => null,
        'user_guid' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function mxTypes()
    {
        return self::$mxTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function mxFormats()
    {
        return self::$mxFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'aggregated_at' => 'aggregated_at',
        'connection_status' => 'connection_status',
        'guid' => 'guid',
        'identifier' => 'identifier',
        'institution_code' => 'institution_code',
        'is_being_aggregated' => 'is_being_aggregated',
        'metadata' => 'metadata',
        'name' => 'name',
        'status' => 'status',
        'successfully_aggregated_at' => 'successfully_aggregated_at',
        'user_guid' => 'user_guid'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'aggregated_at' => 'setAggregatedAt',
        'connection_status' => 'setConnectionStatus',
        'guid' => 'setGuid',
        'identifier' => 'setIdentifier',
        'institution_code' => 'setInstitutionCode',
        'is_being_aggregated' => 'setIsBeingAggregated',
        'metadata' => 'setMetadata',
        'name' => 'setName',
        'status' => 'setStatus',
        'successfully_aggregated_at' => 'setSuccessfullyAggregatedAt',
        'user_guid' => 'setUserGuid'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'aggregated_at' => 'getAggregatedAt',
        'connection_status' => 'getConnectionStatus',
        'guid' => 'getGuid',
        'identifier' => 'getIdentifier',
        'institution_code' => 'getInstitutionCode',
        'is_being_aggregated' => 'getIsBeingAggregated',
        'metadata' => 'getMetadata',
        'name' => 'getName',
        'status' => 'getStatus',
        'successfully_aggregated_at' => 'getSuccessfullyAggregatedAt',
        'user_guid' => 'getUserGuid'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$mxModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['aggregated_at'] = isset($data['aggregated_at']) ? $data['aggregated_at'] : null;
        $this->container['connection_status'] = isset($data['connection_status']) ? $data['connection_status'] : null;
        $this->container['guid'] = isset($data['guid']) ? $data['guid'] : null;
        $this->container['identifier'] = isset($data['identifier']) ? $data['identifier'] : null;
        $this->container['institution_code'] = isset($data['institution_code']) ? $data['institution_code'] : null;
        $this->container['is_being_aggregated'] = isset($data['is_being_aggregated']) ? $data['is_being_aggregated'] : null;
        $this->container['metadata'] = isset($data['metadata']) ? $data['metadata'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['successfully_aggregated_at'] = isset($data['successfully_aggregated_at']) ? $data['successfully_aggregated_at'] : null;
        $this->container['user_guid'] = isset($data['user_guid']) ? $data['user_guid'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets aggregated_at
     *
     * @return string
     */
    public function getAggregatedAt()
    {
        return $this->container['aggregated_at'];
    }

    /**
     * Sets aggregated_at
     *
     * @param string $aggregated_at aggregated_at
     *
     * @return $this
     */
    public function setAggregatedAt($aggregated_at)
    {
        $this->container['aggregated_at'] = $aggregated_at;

        return $this;
    }

    /**
     * Gets connection_status
     *
     * @return string
     */
    public function getConnectionStatus()
    {
        return $this->container['connection_status'];
    }

    /**
     * Sets connection_status
     *
     * @param string $connection_status connection_status
     *
     * @return $this
     */
    public function setConnectionStatus($connection_status)
    {
        $this->container['connection_status'] = $connection_status;

        return $this;
    }

    /**
     * Gets guid
     *
     * @return bool
     */
    public function getGuid()
    {
        return $this->container['guid'];
    }

    /**
     * Sets guid
     *
     * @param bool $guid guid
     *
     * @return $this
     */
    public function setGuid($guid)
    {
        $this->container['guid'] = $guid;

        return $this;
    }

    /**
     * Gets identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->container['identifier'];
    }

    /**
     * Sets identifier
     *
     * @param string $identifier identifier
     *
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->container['identifier'] = $identifier;

        return $this;
    }

    /**
     * Gets institution_code
     *
     * @return string
     */
    public function getInstitutionCode()
    {
        return $this->container['institution_code'];
    }

    /**
     * Sets institution_code
     *
     * @param string $institution_code institution_code
     *
     * @return $this
     */
    public function setInstitutionCode($institution_code)
    {
        $this->container['institution_code'] = $institution_code;

        return $this;
    }

    /**
     * Gets is_being_aggregated
     *
     * @return bool
     */
    public function getIsBeingAggregated()
    {
        return $this->container['is_being_aggregated'];
    }

    /**
     * Sets is_being_aggregated
     *
     * @param bool $is_being_aggregated is_being_aggregated
     *
     * @return $this
     */
    public function setIsBeingAggregated($is_being_aggregated)
    {
        $this->container['is_being_aggregated'] = $is_being_aggregated;

        return $this;
    }

    /**
     * Gets metadata
     *
     * @return string
     */
    public function getMetadata()
    {
        return $this->container['metadata'];
    }

    /**
     * Sets metadata
     *
     * @param string $metadata metadata
     *
     * @return $this
     */
    public function setMetadata($metadata)
    {
        $this->container['metadata'] = $metadata;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets successfully_aggregated_at
     *
     * @return string
     */
    public function getSuccessfullyAggregatedAt()
    {
        return $this->container['successfully_aggregated_at'];
    }

    /**
     * Sets successfully_aggregated_at
     *
     * @param string $successfully_aggregated_at successfully_aggregated_at
     *
     * @return $this
     */
    public function setSuccessfullyAggregatedAt($successfully_aggregated_at)
    {
        $this->container['successfully_aggregated_at'] = $successfully_aggregated_at;

        return $this;
    }

    /**
     * Gets user_guid
     *
     * @return string
     */
    public function getUserGuid()
    {
        return $this->container['user_guid'];
    }

    /**
     * Sets user_guid
     *
     * @param string $user_guid user_guid
     *
     * @return $this
     */
    public function setUserGuid($user_guid)
    {
        $this->container['user_guid'] = $user_guid;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


