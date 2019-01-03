<?php
/**
 * Holding
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
 * Holding Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class Holding implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $mxModelName = 'Holding';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxTypes = [
        'account_guid' => 'string',
        'cost_basis' => 'float',
        'created_at' => 'string',
        'currency_code' => 'string',
        'cusip' => 'string',
        'daily_change' => 'float',
        'description' => 'string',
        'guid' => 'string',
        'holding_type' => 'string',
        'market_value' => 'float',
        'member_guid' => 'string',
        'purchase_price' => 'float',
        'shares' => 'float',
        'symbol' => 'string',
        'updated_at' => 'string',
        'user_guid' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxFormats = [
        'account_guid' => null,
        'cost_basis' => null,
        'created_at' => null,
        'currency_code' => null,
        'cusip' => null,
        'daily_change' => null,
        'description' => null,
        'guid' => null,
        'holding_type' => null,
        'market_value' => null,
        'member_guid' => null,
        'purchase_price' => null,
        'shares' => null,
        'symbol' => null,
        'updated_at' => null,
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
        'account_guid' => 'account_guid',
        'cost_basis' => 'cost_basis',
        'created_at' => 'created_at',
        'currency_code' => 'currency_code',
        'cusip' => 'cusip',
        'daily_change' => 'daily_change',
        'description' => 'description',
        'guid' => 'guid',
        'holding_type' => 'holding_type',
        'market_value' => 'market_value',
        'member_guid' => 'member_guid',
        'purchase_price' => 'purchase_price',
        'shares' => 'shares',
        'symbol' => 'symbol',
        'updated_at' => 'updated_at',
        'user_guid' => 'user_guid'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account_guid' => 'setAccountGuid',
        'cost_basis' => 'setCostBasis',
        'created_at' => 'setCreatedAt',
        'currency_code' => 'setCurrencyCode',
        'cusip' => 'setCusip',
        'daily_change' => 'setDailyChange',
        'description' => 'setDescription',
        'guid' => 'setGuid',
        'holding_type' => 'setHoldingType',
        'market_value' => 'setMarketValue',
        'member_guid' => 'setMemberGuid',
        'purchase_price' => 'setPurchasePrice',
        'shares' => 'setShares',
        'symbol' => 'setSymbol',
        'updated_at' => 'setUpdatedAt',
        'user_guid' => 'setUserGuid'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account_guid' => 'getAccountGuid',
        'cost_basis' => 'getCostBasis',
        'created_at' => 'getCreatedAt',
        'currency_code' => 'getCurrencyCode',
        'cusip' => 'getCusip',
        'daily_change' => 'getDailyChange',
        'description' => 'getDescription',
        'guid' => 'getGuid',
        'holding_type' => 'getHoldingType',
        'market_value' => 'getMarketValue',
        'member_guid' => 'getMemberGuid',
        'purchase_price' => 'getPurchasePrice',
        'shares' => 'getShares',
        'symbol' => 'getSymbol',
        'updated_at' => 'getUpdatedAt',
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
        $this->container['account_guid'] = isset($data['account_guid']) ? $data['account_guid'] : null;
        $this->container['cost_basis'] = isset($data['cost_basis']) ? $data['cost_basis'] : null;
        $this->container['created_at'] = isset($data['created_at']) ? $data['created_at'] : null;
        $this->container['currency_code'] = isset($data['currency_code']) ? $data['currency_code'] : null;
        $this->container['cusip'] = isset($data['cusip']) ? $data['cusip'] : null;
        $this->container['daily_change'] = isset($data['daily_change']) ? $data['daily_change'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['guid'] = isset($data['guid']) ? $data['guid'] : null;
        $this->container['holding_type'] = isset($data['holding_type']) ? $data['holding_type'] : null;
        $this->container['market_value'] = isset($data['market_value']) ? $data['market_value'] : null;
        $this->container['member_guid'] = isset($data['member_guid']) ? $data['member_guid'] : null;
        $this->container['purchase_price'] = isset($data['purchase_price']) ? $data['purchase_price'] : null;
        $this->container['shares'] = isset($data['shares']) ? $data['shares'] : null;
        $this->container['symbol'] = isset($data['symbol']) ? $data['symbol'] : null;
        $this->container['updated_at'] = isset($data['updated_at']) ? $data['updated_at'] : null;
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
     * @param string $account_guid account_guid
     *
     * @return $this
     */
    public function setAccountGuid($account_guid)
    {
        $this->container['account_guid'] = $account_guid;

        return $this;
    }

    /**
     * Gets cost_basis
     *
     * @return float
     */
    public function getCostBasis()
    {
        return $this->container['cost_basis'];
    }

    /**
     * Sets cost_basis
     *
     * @param float $cost_basis cost_basis
     *
     * @return $this
     */
    public function setCostBasis($cost_basis)
    {
        $this->container['cost_basis'] = $cost_basis;

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
     * @param string $created_at created_at
     *
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets currency_code
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->container['currency_code'];
    }

    /**
     * Sets currency_code
     *
     * @param string $currency_code currency_code
     *
     * @return $this
     */
    public function setCurrencyCode($currency_code)
    {
        $this->container['currency_code'] = $currency_code;

        return $this;
    }

    /**
     * Gets cusip
     *
     * @return string
     */
    public function getCusip()
    {
        return $this->container['cusip'];
    }

    /**
     * Sets cusip
     *
     * @param string $cusip cusip
     *
     * @return $this
     */
    public function setCusip($cusip)
    {
        $this->container['cusip'] = $cusip;

        return $this;
    }

    /**
     * Gets daily_change
     *
     * @return float
     */
    public function getDailyChange()
    {
        return $this->container['daily_change'];
    }

    /**
     * Sets daily_change
     *
     * @param float $daily_change daily_change
     *
     * @return $this
     */
    public function setDailyChange($daily_change)
    {
        $this->container['daily_change'] = $daily_change;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

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
     * Gets holding_type
     *
     * @return string
     */
    public function getHoldingType()
    {
        return $this->container['holding_type'];
    }

    /**
     * Sets holding_type
     *
     * @param string $holding_type holding_type
     *
     * @return $this
     */
    public function setHoldingType($holding_type)
    {
        $this->container['holding_type'] = $holding_type;

        return $this;
    }

    /**
     * Gets market_value
     *
     * @return float
     */
    public function getMarketValue()
    {
        return $this->container['market_value'];
    }

    /**
     * Sets market_value
     *
     * @param float $market_value market_value
     *
     * @return $this
     */
    public function setMarketValue($market_value)
    {
        $this->container['market_value'] = $market_value;

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
     * @param string $member_guid member_guid
     *
     * @return $this
     */
    public function setMemberGuid($member_guid)
    {
        $this->container['member_guid'] = $member_guid;

        return $this;
    }

    /**
     * Gets purchase_price
     *
     * @return float
     */
    public function getPurchasePrice()
    {
        return $this->container['purchase_price'];
    }

    /**
     * Sets purchase_price
     *
     * @param float $purchase_price purchase_price
     *
     * @return $this
     */
    public function setPurchasePrice($purchase_price)
    {
        $this->container['purchase_price'] = $purchase_price;

        return $this;
    }

    /**
     * Gets shares
     *
     * @return float
     */
    public function getShares()
    {
        return $this->container['shares'];
    }

    /**
     * Sets shares
     *
     * @param float $shares shares
     *
     * @return $this
     */
    public function setShares($shares)
    {
        $this->container['shares'] = $shares;

        return $this;
    }

    /**
     * Gets symbol
     *
     * @return string
     */
    public function getSymbol()
    {
        return $this->container['symbol'];
    }

    /**
     * Sets symbol
     *
     * @param string $symbol symbol
     *
     * @return $this
     */
    public function setSymbol($symbol)
    {
        $this->container['symbol'] = $symbol;

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
     * @param string $updated_at updated_at
     *
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->container['updated_at'] = $updated_at;

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


