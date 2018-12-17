<?php
/**
 * Account
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
 * Account Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class Account implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $mxModelName = 'Account';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxTypes = [
        'apr' => 'float',
        'apy' => 'float',
        'available_balance' => 'float',
        'available_credit' => 'float',
        'balance' => 'float',
        'created_at' => 'string',
        'credit_limit' => 'float',
        'currency_code' => 'string',
        'day_payment_is_due' => 'int',
        'guid' => 'string',
        'institution_code' => 'string',
        'interest_rate' => 'float',
        'is_closed' => 'bool',
        'last_payment' => 'float',
        'matures_on' => 'string',
        'member_guid' => 'string',
        'minimum_balance' => 'float',
        'minimum_payment' => 'float',
        'name' => 'string',
        'original_balance' => 'float',
        'payment_due_at' => 'string',
        'payoff_balance' => 'float',
        'started_on' => 'string',
        'subtype' => 'string',
        'total_account_value' => 'float',
        'type' => 'string',
        'updated_at' => 'string',
        'user_guid' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxFormats = [
        'apr' => null,
        'apy' => null,
        'available_balance' => null,
        'available_credit' => null,
        'balance' => null,
        'created_at' => null,
        'credit_limit' => null,
        'currency_code' => null,
        'day_payment_is_due' => null,
        'guid' => null,
        'institution_code' => null,
        'interest_rate' => null,
        'is_closed' => null,
        'last_payment' => null,
        'matures_on' => null,
        'member_guid' => null,
        'minimum_balance' => null,
        'minimum_payment' => null,
        'name' => null,
        'original_balance' => null,
        'payment_due_at' => null,
        'payoff_balance' => null,
        'started_on' => null,
        'subtype' => null,
        'total_account_value' => null,
        'type' => null,
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
        'apr' => 'apr',
        'apy' => 'apy',
        'available_balance' => 'available_balance',
        'available_credit' => 'available_credit',
        'balance' => 'balance',
        'created_at' => 'created_at',
        'credit_limit' => 'credit_limit',
        'currency_code' => 'currency_code',
        'day_payment_is_due' => 'day_payment_is_due',
        'guid' => 'guid',
        'institution_code' => 'institution_code',
        'interest_rate' => 'interest_rate',
        'is_closed' => 'is_closed',
        'last_payment' => 'last_payment',
        'matures_on' => 'matures_on',
        'member_guid' => 'member_guid',
        'minimum_balance' => 'minimum_balance',
        'minimum_payment' => 'minimum_payment',
        'name' => 'name',
        'original_balance' => 'original_balance',
        'payment_due_at' => 'payment_due_at',
        'payoff_balance' => 'payoff_balance',
        'started_on' => 'started_on',
        'subtype' => 'subtype',
        'total_account_value' => 'total_account_value',
        'type' => 'type',
        'updated_at' => 'updated_at',
        'user_guid' => 'user_guid'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'apr' => 'setApr',
        'apy' => 'setApy',
        'available_balance' => 'setAvailableBalance',
        'available_credit' => 'setAvailableCredit',
        'balance' => 'setBalance',
        'created_at' => 'setCreatedAt',
        'credit_limit' => 'setCreditLimit',
        'currency_code' => 'setCurrencyCode',
        'day_payment_is_due' => 'setDayPaymentIsDue',
        'guid' => 'setGuid',
        'institution_code' => 'setInstitutionCode',
        'interest_rate' => 'setInterestRate',
        'is_closed' => 'setIsClosed',
        'last_payment' => 'setLastPayment',
        'matures_on' => 'setMaturesOn',
        'member_guid' => 'setMemberGuid',
        'minimum_balance' => 'setMinimumBalance',
        'minimum_payment' => 'setMinimumPayment',
        'name' => 'setName',
        'original_balance' => 'setOriginalBalance',
        'payment_due_at' => 'setPaymentDueAt',
        'payoff_balance' => 'setPayoffBalance',
        'started_on' => 'setStartedOn',
        'subtype' => 'setSubtype',
        'total_account_value' => 'setTotalAccountValue',
        'type' => 'setType',
        'updated_at' => 'setUpdatedAt',
        'user_guid' => 'setUserGuid'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'apr' => 'getApr',
        'apy' => 'getApy',
        'available_balance' => 'getAvailableBalance',
        'available_credit' => 'getAvailableCredit',
        'balance' => 'getBalance',
        'created_at' => 'getCreatedAt',
        'credit_limit' => 'getCreditLimit',
        'currency_code' => 'getCurrencyCode',
        'day_payment_is_due' => 'getDayPaymentIsDue',
        'guid' => 'getGuid',
        'institution_code' => 'getInstitutionCode',
        'interest_rate' => 'getInterestRate',
        'is_closed' => 'getIsClosed',
        'last_payment' => 'getLastPayment',
        'matures_on' => 'getMaturesOn',
        'member_guid' => 'getMemberGuid',
        'minimum_balance' => 'getMinimumBalance',
        'minimum_payment' => 'getMinimumPayment',
        'name' => 'getName',
        'original_balance' => 'getOriginalBalance',
        'payment_due_at' => 'getPaymentDueAt',
        'payoff_balance' => 'getPayoffBalance',
        'started_on' => 'getStartedOn',
        'subtype' => 'getSubtype',
        'total_account_value' => 'getTotalAccountValue',
        'type' => 'getType',
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
        $this->container['apr'] = isset($data['apr']) ? $data['apr'] : null;
        $this->container['apy'] = isset($data['apy']) ? $data['apy'] : null;
        $this->container['available_balance'] = isset($data['available_balance']) ? $data['available_balance'] : null;
        $this->container['available_credit'] = isset($data['available_credit']) ? $data['available_credit'] : null;
        $this->container['balance'] = isset($data['balance']) ? $data['balance'] : null;
        $this->container['created_at'] = isset($data['created_at']) ? $data['created_at'] : null;
        $this->container['credit_limit'] = isset($data['credit_limit']) ? $data['credit_limit'] : null;
        $this->container['currency_code'] = isset($data['currency_code']) ? $data['currency_code'] : null;
        $this->container['day_payment_is_due'] = isset($data['day_payment_is_due']) ? $data['day_payment_is_due'] : null;
        $this->container['guid'] = isset($data['guid']) ? $data['guid'] : null;
        $this->container['institution_code'] = isset($data['institution_code']) ? $data['institution_code'] : null;
        $this->container['interest_rate'] = isset($data['interest_rate']) ? $data['interest_rate'] : null;
        $this->container['is_closed'] = isset($data['is_closed']) ? $data['is_closed'] : null;
        $this->container['last_payment'] = isset($data['last_payment']) ? $data['last_payment'] : null;
        $this->container['matures_on'] = isset($data['matures_on']) ? $data['matures_on'] : null;
        $this->container['member_guid'] = isset($data['member_guid']) ? $data['member_guid'] : null;
        $this->container['minimum_balance'] = isset($data['minimum_balance']) ? $data['minimum_balance'] : null;
        $this->container['minimum_payment'] = isset($data['minimum_payment']) ? $data['minimum_payment'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['original_balance'] = isset($data['original_balance']) ? $data['original_balance'] : null;
        $this->container['payment_due_at'] = isset($data['payment_due_at']) ? $data['payment_due_at'] : null;
        $this->container['payoff_balance'] = isset($data['payoff_balance']) ? $data['payoff_balance'] : null;
        $this->container['started_on'] = isset($data['started_on']) ? $data['started_on'] : null;
        $this->container['subtype'] = isset($data['subtype']) ? $data['subtype'] : null;
        $this->container['total_account_value'] = isset($data['total_account_value']) ? $data['total_account_value'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
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
     * Gets apr
     *
     * @return float
     */
    public function getApr()
    {
        return $this->container['apr'];
    }

    /**
     * Sets apr
     *
     * @param float $apr apr
     *
     * @return $this
     */
    public function setApr($apr)
    {
        $this->container['apr'] = $apr;

        return $this;
    }

    /**
     * Gets apy
     *
     * @return float
     */
    public function getApy()
    {
        return $this->container['apy'];
    }

    /**
     * Sets apy
     *
     * @param float $apy apy
     *
     * @return $this
     */
    public function setApy($apy)
    {
        $this->container['apy'] = $apy;

        return $this;
    }

    /**
     * Gets available_balance
     *
     * @return float
     */
    public function getAvailableBalance()
    {
        return $this->container['available_balance'];
    }

    /**
     * Sets available_balance
     *
     * @param float $available_balance available_balance
     *
     * @return $this
     */
    public function setAvailableBalance($available_balance)
    {
        $this->container['available_balance'] = $available_balance;

        return $this;
    }

    /**
     * Gets available_credit
     *
     * @return float
     */
    public function getAvailableCredit()
    {
        return $this->container['available_credit'];
    }

    /**
     * Sets available_credit
     *
     * @param float $available_credit available_credit
     *
     * @return $this
     */
    public function setAvailableCredit($available_credit)
    {
        $this->container['available_credit'] = $available_credit;

        return $this;
    }

    /**
     * Gets balance
     *
     * @return float
     */
    public function getBalance()
    {
        return $this->container['balance'];
    }

    /**
     * Sets balance
     *
     * @param float $balance balance
     *
     * @return $this
     */
    public function setBalance($balance)
    {
        $this->container['balance'] = $balance;

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
     * Gets credit_limit
     *
     * @return float
     */
    public function getCreditLimit()
    {
        return $this->container['credit_limit'];
    }

    /**
     * Sets credit_limit
     *
     * @param float $credit_limit credit_limit
     *
     * @return $this
     */
    public function setCreditLimit($credit_limit)
    {
        $this->container['credit_limit'] = $credit_limit;

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
     * Gets day_payment_is_due
     *
     * @return int
     */
    public function getDayPaymentIsDue()
    {
        return $this->container['day_payment_is_due'];
    }

    /**
     * Sets day_payment_is_due
     *
     * @param int $day_payment_is_due day_payment_is_due
     *
     * @return $this
     */
    public function setDayPaymentIsDue($day_payment_is_due)
    {
        $this->container['day_payment_is_due'] = $day_payment_is_due;

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
     * Gets interest_rate
     *
     * @return float
     */
    public function getInterestRate()
    {
        return $this->container['interest_rate'];
    }

    /**
     * Sets interest_rate
     *
     * @param float $interest_rate interest_rate
     *
     * @return $this
     */
    public function setInterestRate($interest_rate)
    {
        $this->container['interest_rate'] = $interest_rate;

        return $this;
    }

    /**
     * Gets is_closed
     *
     * @return bool
     */
    public function getIsClosed()
    {
        return $this->container['is_closed'];
    }

    /**
     * Sets is_closed
     *
     * @param bool $is_closed is_closed
     *
     * @return $this
     */
    public function setIsClosed($is_closed)
    {
        $this->container['is_closed'] = $is_closed;

        return $this;
    }

    /**
     * Gets last_payment
     *
     * @return float
     */
    public function getLastPayment()
    {
        return $this->container['last_payment'];
    }

    /**
     * Sets last_payment
     *
     * @param float $last_payment last_payment
     *
     * @return $this
     */
    public function setLastPayment($last_payment)
    {
        $this->container['last_payment'] = $last_payment;

        return $this;
    }

    /**
     * Gets matures_on
     *
     * @return string
     */
    public function getMaturesOn()
    {
        return $this->container['matures_on'];
    }

    /**
     * Sets matures_on
     *
     * @param string $matures_on matures_on
     *
     * @return $this
     */
    public function setMaturesOn($matures_on)
    {
        $this->container['matures_on'] = $matures_on;

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
     * Gets minimum_balance
     *
     * @return float
     */
    public function getMinimumBalance()
    {
        return $this->container['minimum_balance'];
    }

    /**
     * Sets minimum_balance
     *
     * @param float $minimum_balance minimum_balance
     *
     * @return $this
     */
    public function setMinimumBalance($minimum_balance)
    {
        $this->container['minimum_balance'] = $minimum_balance;

        return $this;
    }

    /**
     * Gets minimum_payment
     *
     * @return float
     */
    public function getMinimumPayment()
    {
        return $this->container['minimum_payment'];
    }

    /**
     * Sets minimum_payment
     *
     * @param float $minimum_payment minimum_payment
     *
     * @return $this
     */
    public function setMinimumPayment($minimum_payment)
    {
        $this->container['minimum_payment'] = $minimum_payment;

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
     * Gets original_balance
     *
     * @return float
     */
    public function getOriginalBalance()
    {
        return $this->container['original_balance'];
    }

    /**
     * Sets original_balance
     *
     * @param float $original_balance original_balance
     *
     * @return $this
     */
    public function setOriginalBalance($original_balance)
    {
        $this->container['original_balance'] = $original_balance;

        return $this;
    }

    /**
     * Gets payment_due_at
     *
     * @return string
     */
    public function getPaymentDueAt()
    {
        return $this->container['payment_due_at'];
    }

    /**
     * Sets payment_due_at
     *
     * @param string $payment_due_at payment_due_at
     *
     * @return $this
     */
    public function setPaymentDueAt($payment_due_at)
    {
        $this->container['payment_due_at'] = $payment_due_at;

        return $this;
    }

    /**
     * Gets payoff_balance
     *
     * @return float
     */
    public function getPayoffBalance()
    {
        return $this->container['payoff_balance'];
    }

    /**
     * Sets payoff_balance
     *
     * @param float $payoff_balance payoff_balance
     *
     * @return $this
     */
    public function setPayoffBalance($payoff_balance)
    {
        $this->container['payoff_balance'] = $payoff_balance;

        return $this;
    }

    /**
     * Gets started_on
     *
     * @return string
     */
    public function getStartedOn()
    {
        return $this->container['started_on'];
    }

    /**
     * Sets started_on
     *
     * @param string $started_on started_on
     *
     * @return $this
     */
    public function setStartedOn($started_on)
    {
        $this->container['started_on'] = $started_on;

        return $this;
    }

    /**
     * Gets subtype
     *
     * @return string
     */
    public function getSubtype()
    {
        return $this->container['subtype'];
    }

    /**
     * Sets subtype
     *
     * @param string $subtype subtype
     *
     * @return $this
     */
    public function setSubtype($subtype)
    {
        $this->container['subtype'] = $subtype;

        return $this;
    }

    /**
     * Gets total_account_value
     *
     * @return float
     */
    public function getTotalAccountValue()
    {
        return $this->container['total_account_value'];
    }

    /**
     * Sets total_account_value
     *
     * @param float $total_account_value total_account_value
     *
     * @return $this
     */
    public function setTotalAccountValue($total_account_value)
    {
        $this->container['total_account_value'] = $total_account_value;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

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


