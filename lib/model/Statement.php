<?php
/**
 * Statement
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
 * Statement Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class Statement implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $mxModelName = 'Statement';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxTypes = [
        'account_guid' => 'string',
        'created_at' => 'string',
        'guid' => 'string',
        'member_guid' => 'string',
        'uri' => 'string',
        'user_guid' => 'string',
        'updated_at' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxFormats = [
        'account_guid' => null,
        'created_at' => null,
        'guid' => null,
        'member_guid' => null,
        'uri' => null,
        'user_guid' => null,
        'updated_at' => null
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
        'account_guid' => 'account_guid',
        'created_at' => 'created_at',
        'guid' => 'guid',
        'member_guid' => 'member_guid',
        'uri' => 'uri',
        'user_guid' => 'user_guid',
        'updated_at' => 'updated_at'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account_guid' => 'setAccountGuid',
        'created_at' => 'setCreatedAt',
        'guid' => 'setGuid',
        'member_guid' => 'setMemberGuid',
        'uri' => 'setUri',
        'user_guid' => 'setUserGuid',
        'updated_at' => 'setUpdatedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account_guid' => 'getAccountGuid',
        'created_at' => 'getCreatedAt',
        'guid' => 'getGuid',
        'member_guid' => 'getMemberGuid',
        'uri' => 'getUri',
        'user_guid' => 'getUserGuid',
        'updated_at' => 'getUpdatedAt'
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
        $this->container['account_guid'] = isset($data['account_guid']) ? $data['account_guid'] : null;
        $this->container['created_at'] = isset($data['created_at']) ? $data['created_at'] : null;
        $this->container['guid'] = isset($data['guid']) ? $data['guid'] : null;
        $this->container['member_guid'] = isset($data['member_guid']) ? $data['member_guid'] : null;
        $this->container['uri'] = isset($data['uri']) ? $data['uri'] : null;
        $this->container['user_guid'] = isset($data['user_guid']) ? $data['user_guid'] : null;
        $this->container['updated_at'] = isset($data['updated_at']) ? $data['updated_at'] : null;
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
     * Gets account_guid
     *
     * @return string
     */
    public function getAccountGuid()
    {
        return $this->container['account_guid'];
    }

    /**
     * Sets account_guid
     *
     * @param string $account_guid The unique identifier for the `account` associated with the `statement`. Defined by MX.
     *
     * @return $this
     */
    public function setAccountGuid($account_guid)
    {
        $this->container['account_guid'] = $account_guid;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string $created_at The date and time the `statement` was created.
     *
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets guid
     *
     * @return string
     */
    public function getGuid()
    {
        return $this->container['guid'];
    }

    /**
     * Sets guid
     *
     * @param string $guid The unique identifier for the `statement`. Defined by MX.
     *
     * @return $this
     */
    public function setGuid($guid)
    {
        $this->container['guid'] = $guid;

        return $this;
    }

    /**
     * Gets member_guid
     *
     * @return string
     */
    public function getMemberGuid()
    {
        return $this->container['member_guid'];
    }

    /**
     * Sets member_guid
     *
     * @param string $member_guid The unique identifier for the `member` associated with the `statement`.  Defined by MX.
     *
     * @return $this
     */
    public function setMemberGuid($member_guid)
    {
        $this->container['member_guid'] = $member_guid;

        return $this;
    }

    /**
     * Gets uri
     *
     * @return string
     */
    public function getUri()
    {
        return $this->container['uri'];
    }

    /**
     * Sets uri
     *
     * @param string $uri A URI for accessing the byte payload of the `statement`.
     *
     * @return $this
     */
    public function setUri($uri)
    {
        $this->container['uri'] = $uri;

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
     * @param string $user_guid The unique identifier for the `user` associated with the `statement`.  Defined by MX.
     *
     * @return $this
     */
    public function setUserGuid($user_guid)
    {
        $this->container['user_guid'] = $user_guid;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param string $updated_at The date and time at which the `statement` was last updated.
     *
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->container['updated_at'] = $updated_at;

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


