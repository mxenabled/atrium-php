<?php
/**
 * MemberConnectionStatus
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
 * MemberConnectionStatus Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class MemberConnectionStatus implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $mxModelName = 'MemberConnectionStatus';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxTypes = [
        'aggregated_at' => 'string',
        'challenges' => '\atrium\model\Challenge[]',
        'connection_status' => 'string',
        'guid' => 'string',
        'has_processed_accounts' => 'bool',
        'has_processed_transactions' => 'bool',
        'is_authenticated' => 'bool',
        'is_being_aggregated' => 'bool',
        'status' => 'string',
        'successfully_aggregated_at' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxFormats = [
        'aggregated_at' => null,
        'challenges' => null,
        'connection_status' => null,
        'guid' => null,
        'has_processed_accounts' => null,
        'has_processed_transactions' => null,
        'is_authenticated' => null,
        'is_being_aggregated' => null,
        'status' => null,
        'successfully_aggregated_at' => null
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
        'challenges' => 'challenges',
        'connection_status' => 'connection_status',
        'guid' => 'guid',
        'has_processed_accounts' => 'has_processed_accounts',
        'has_processed_transactions' => 'has_processed_transactions',
        'is_authenticated' => 'is_authenticated',
        'is_being_aggregated' => 'is_being_aggregated',
        'status' => 'status',
        'successfully_aggregated_at' => 'successfully_aggregated_at'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'aggregated_at' => 'setAggregatedAt',
        'challenges' => 'setChallenges',
        'connection_status' => 'setConnectionStatus',
        'guid' => 'setGuid',
        'has_processed_accounts' => 'setHasProcessedAccounts',
        'has_processed_transactions' => 'setHasProcessedTransactions',
        'is_authenticated' => 'setIsAuthenticated',
        'is_being_aggregated' => 'setIsBeingAggregated',
        'status' => 'setStatus',
        'successfully_aggregated_at' => 'setSuccessfullyAggregatedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'aggregated_at' => 'getAggregatedAt',
        'challenges' => 'getChallenges',
        'connection_status' => 'getConnectionStatus',
        'guid' => 'getGuid',
        'has_processed_accounts' => 'getHasProcessedAccounts',
        'has_processed_transactions' => 'getHasProcessedTransactions',
        'is_authenticated' => 'getIsAuthenticated',
        'is_being_aggregated' => 'getIsBeingAggregated',
        'status' => 'getStatus',
        'successfully_aggregated_at' => 'getSuccessfullyAggregatedAt'
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
        $this->container['challenges'] = isset($data['challenges']) ? $data['challenges'] : null;
        $this->container['connection_status'] = isset($data['connection_status']) ? $data['connection_status'] : null;
        $this->container['guid'] = isset($data['guid']) ? $data['guid'] : null;
        $this->container['has_processed_accounts'] = isset($data['has_processed_accounts']) ? $data['has_processed_accounts'] : null;
        $this->container['has_processed_transactions'] = isset($data['has_processed_transactions']) ? $data['has_processed_transactions'] : null;
        $this->container['is_authenticated'] = isset($data['is_authenticated']) ? $data['is_authenticated'] : null;
        $this->container['is_being_aggregated'] = isset($data['is_being_aggregated']) ? $data['is_being_aggregated'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['successfully_aggregated_at'] = isset($data['successfully_aggregated_at']) ? $data['successfully_aggregated_at'] : null;
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
     * Gets challenges
     *
     * @return \atrium\model\Challenge[]
     */
    public function getChallenges()
    {
        return $this->container['challenges'];
    }

    /**
     * Sets challenges
     *
     * @param \atrium\model\Challenge[] $challenges challenges
     *
     * @return $this
     */
    public function setChallenges($challenges)
    {
        $this->container['challenges'] = $challenges;

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
     * @return string
     */
    public function getGuid()
    {
        return $this->container['guid'];
    }

    /**
     * Sets guid
     *
     * @param string $guid guid
     *
     * @return $this
     */
    public function setGuid($guid)
    {
        $this->container['guid'] = $guid;

        return $this;
    }

    /**
     * Gets has_processed_accounts
     *
     * @return bool
     */
    public function getHasProcessedAccounts()
    {
        return $this->container['has_processed_accounts'];
    }

    /**
     * Sets has_processed_accounts
     *
     * @param bool $has_processed_accounts has_processed_accounts
     *
     * @return $this
     */
    public function setHasProcessedAccounts($has_processed_accounts)
    {
        $this->container['has_processed_accounts'] = $has_processed_accounts;

        return $this;
    }

    /**
     * Gets has_processed_transactions
     *
     * @return bool
     */
    public function getHasProcessedTransactions()
    {
        return $this->container['has_processed_transactions'];
    }

    /**
     * Sets has_processed_transactions
     *
     * @param bool $has_processed_transactions has_processed_transactions
     *
     * @return $this
     */
    public function setHasProcessedTransactions($has_processed_transactions)
    {
        $this->container['has_processed_transactions'] = $has_processed_transactions;

        return $this;
    }

    /**
     * Gets is_authenticated
     *
     * @return bool
     */
    public function getIsAuthenticated()
    {
        return $this->container['is_authenticated'];
    }

    /**
     * Sets is_authenticated
     *
     * @param bool $is_authenticated is_authenticated
     *
     * @return $this
     */
    public function setIsAuthenticated($is_authenticated)
    {
        $this->container['is_authenticated'] = $is_authenticated;

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


