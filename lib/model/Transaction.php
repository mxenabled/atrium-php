<?php
/**
 * Transaction
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
 * Transaction Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class Transaction implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $mxModelName = 'Transaction';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxTypes = [
        'account_guid' => 'string',
        'amount' => 'float',
        'category' => 'string',
        'check_number' => 'int',
        'check_number_string' => 'string',
        'created_at' => 'string',
        'currency_code' => 'string',
        'date' => 'string',
        'description' => 'string',
        'guid' => 'string',
        'is_bill_pay' => 'bool',
        'is_direct_deposit' => 'bool',
        'is_expense' => 'bool',
        'is_fee' => 'bool',
        'is_income' => 'bool',
        'is_international' => 'bool',
        'is_overdraft_fee' => 'bool',
        'is_payroll_advance' => 'bool',
        'is_subscription' => 'bool',
        'latitude' => 'float',
        'longitude' => 'float',
        'member_guid' => 'string',
        'memo' => 'string',
        'merchant_category_code' => 'int',
        'merchant_guid' => 'string',
        'original_description' => 'string',
        'posted_at' => 'string',
        'status' => 'string',
        'top_level_category' => 'string',
        'transacted_at' => 'string',
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
        'account_guid' => null,
        'amount' => null,
        'category' => null,
        'check_number' => null,
        'check_number_string' => null,
        'created_at' => null,
        'currency_code' => null,
        'date' => null,
        'description' => null,
        'guid' => null,
        'is_bill_pay' => null,
        'is_direct_deposit' => null,
        'is_expense' => null,
        'is_fee' => null,
        'is_income' => null,
        'is_international' => null,
        'is_overdraft_fee' => null,
        'is_payroll_advance' => null,
        'is_subscription' => null,
        'latitude' => null,
        'longitude' => null,
        'member_guid' => null,
        'memo' => null,
        'merchant_category_code' => null,
        'merchant_guid' => null,
        'original_description' => null,
        'posted_at' => null,
        'status' => null,
        'top_level_category' => null,
        'transacted_at' => null,
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
        'account_guid' => 'account_guid',
        'amount' => 'amount',
        'category' => 'category',
        'check_number' => 'check_number',
        'check_number_string' => 'check_number_string',
        'created_at' => 'created_at',
        'currency_code' => 'currency_code',
        'date' => 'date',
        'description' => 'description',
        'guid' => 'guid',
        'is_bill_pay' => 'is_bill_pay',
        'is_direct_deposit' => 'is_direct_deposit',
        'is_expense' => 'is_expense',
        'is_fee' => 'is_fee',
        'is_income' => 'is_income',
        'is_international' => 'is_international',
        'is_overdraft_fee' => 'is_overdraft_fee',
        'is_payroll_advance' => 'is_payroll_advance',
        'is_subscription' => 'is_subscription',
        'latitude' => 'latitude',
        'longitude' => 'longitude',
        'member_guid' => 'member_guid',
        'memo' => 'memo',
        'merchant_category_code' => 'merchant_category_code',
        'merchant_guid' => 'merchant_guid',
        'original_description' => 'original_description',
        'posted_at' => 'posted_at',
        'status' => 'status',
        'top_level_category' => 'top_level_category',
        'transacted_at' => 'transacted_at',
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
        'account_guid' => 'setAccountGuid',
        'amount' => 'setAmount',
        'category' => 'setCategory',
        'check_number' => 'setCheckNumber',
        'check_number_string' => 'setCheckNumberString',
        'created_at' => 'setCreatedAt',
        'currency_code' => 'setCurrencyCode',
        'date' => 'setDate',
        'description' => 'setDescription',
        'guid' => 'setGuid',
        'is_bill_pay' => 'setIsBillPay',
        'is_direct_deposit' => 'setIsDirectDeposit',
        'is_expense' => 'setIsExpense',
        'is_fee' => 'setIsFee',
        'is_income' => 'setIsIncome',
        'is_international' => 'setIsInternational',
        'is_overdraft_fee' => 'setIsOverdraftFee',
        'is_payroll_advance' => 'setIsPayrollAdvance',
        'is_subscription' => 'setIsSubscription',
        'latitude' => 'setLatitude',
        'longitude' => 'setLongitude',
        'member_guid' => 'setMemberGuid',
        'memo' => 'setMemo',
        'merchant_category_code' => 'setMerchantCategoryCode',
        'merchant_guid' => 'setMerchantGuid',
        'original_description' => 'setOriginalDescription',
        'posted_at' => 'setPostedAt',
        'status' => 'setStatus',
        'top_level_category' => 'setTopLevelCategory',
        'transacted_at' => 'setTransactedAt',
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
        'account_guid' => 'getAccountGuid',
        'amount' => 'getAmount',
        'category' => 'getCategory',
        'check_number' => 'getCheckNumber',
        'check_number_string' => 'getCheckNumberString',
        'created_at' => 'getCreatedAt',
        'currency_code' => 'getCurrencyCode',
        'date' => 'getDate',
        'description' => 'getDescription',
        'guid' => 'getGuid',
        'is_bill_pay' => 'getIsBillPay',
        'is_direct_deposit' => 'getIsDirectDeposit',
        'is_expense' => 'getIsExpense',
        'is_fee' => 'getIsFee',
        'is_income' => 'getIsIncome',
        'is_international' => 'getIsInternational',
        'is_overdraft_fee' => 'getIsOverdraftFee',
        'is_payroll_advance' => 'getIsPayrollAdvance',
        'is_subscription' => 'getIsSubscription',
        'latitude' => 'getLatitude',
        'longitude' => 'getLongitude',
        'member_guid' => 'getMemberGuid',
        'memo' => 'getMemo',
        'merchant_category_code' => 'getMerchantCategoryCode',
        'merchant_guid' => 'getMerchantGuid',
        'original_description' => 'getOriginalDescription',
        'posted_at' => 'getPostedAt',
        'status' => 'getStatus',
        'top_level_category' => 'getTopLevelCategory',
        'transacted_at' => 'getTransactedAt',
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
        $this->container['account_guid'] = isset($data['account_guid']) ? $data['account_guid'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['category'] = isset($data['category']) ? $data['category'] : null;
        $this->container['check_number'] = isset($data['check_number']) ? $data['check_number'] : null;
        $this->container['check_number_string'] = isset($data['check_number_string']) ? $data['check_number_string'] : null;
        $this->container['created_at'] = isset($data['created_at']) ? $data['created_at'] : null;
        $this->container['currency_code'] = isset($data['currency_code']) ? $data['currency_code'] : null;
        $this->container['date'] = isset($data['date']) ? $data['date'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['guid'] = isset($data['guid']) ? $data['guid'] : null;
        $this->container['is_bill_pay'] = isset($data['is_bill_pay']) ? $data['is_bill_pay'] : null;
        $this->container['is_direct_deposit'] = isset($data['is_direct_deposit']) ? $data['is_direct_deposit'] : null;
        $this->container['is_expense'] = isset($data['is_expense']) ? $data['is_expense'] : null;
        $this->container['is_fee'] = isset($data['is_fee']) ? $data['is_fee'] : null;
        $this->container['is_income'] = isset($data['is_income']) ? $data['is_income'] : null;
        $this->container['is_international'] = isset($data['is_international']) ? $data['is_international'] : null;
        $this->container['is_overdraft_fee'] = isset($data['is_overdraft_fee']) ? $data['is_overdraft_fee'] : null;
        $this->container['is_payroll_advance'] = isset($data['is_payroll_advance']) ? $data['is_payroll_advance'] : null;
        $this->container['is_subscription'] = isset($data['is_subscription']) ? $data['is_subscription'] : null;
        $this->container['latitude'] = isset($data['latitude']) ? $data['latitude'] : null;
        $this->container['longitude'] = isset($data['longitude']) ? $data['longitude'] : null;
        $this->container['member_guid'] = isset($data['member_guid']) ? $data['member_guid'] : null;
        $this->container['memo'] = isset($data['memo']) ? $data['memo'] : null;
        $this->container['merchant_category_code'] = isset($data['merchant_category_code']) ? $data['merchant_category_code'] : null;
        $this->container['merchant_guid'] = isset($data['merchant_guid']) ? $data['merchant_guid'] : null;
        $this->container['original_description'] = isset($data['original_description']) ? $data['original_description'] : null;
        $this->container['posted_at'] = isset($data['posted_at']) ? $data['posted_at'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['top_level_category'] = isset($data['top_level_category']) ? $data['top_level_category'] : null;
        $this->container['transacted_at'] = isset($data['transacted_at']) ? $data['transacted_at'] : null;
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
     * Gets amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float $amount amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->container['category'];
    }

    /**
     * Sets category
     *
     * @param string $category category
     *
     * @return $this
     */
    public function setCategory($category)
    {
        $this->container['category'] = $category;

        return $this;
    }

    /**
     * Gets check_number
     *
     * @return int
     */
    public function getCheckNumber()
    {
        return $this->container['check_number'];
    }

    /**
     * Sets check_number
     *
     * @param int $check_number check_number
     *
     * @return $this
     */
    public function setCheckNumber($check_number)
    {
        $this->container['check_number'] = $check_number;

        return $this;
    }

    /**
     * Gets check_number_string
     *
     * @return string
     */
    public function getCheckNumberString()
    {
        return $this->container['check_number_string'];
    }

    /**
     * Sets check_number_string
     *
     * @param string $check_number_string check_number_string
     *
     * @return $this
     */
    public function setCheckNumberString($check_number_string)
    {
        $this->container['check_number_string'] = $check_number_string;

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
     * Gets date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->container['date'];
    }

    /**
     * Sets date
     *
     * @param string $date date
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->container['date'] = $date;

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
     * Gets is_bill_pay
     *
     * @return bool
     */
    public function getIsBillPay()
    {
        return $this->container['is_bill_pay'];
    }

    /**
     * Sets is_bill_pay
     *
     * @param bool $is_bill_pay is_bill_pay
     *
     * @return $this
     */
    public function setIsBillPay($is_bill_pay)
    {
        $this->container['is_bill_pay'] = $is_bill_pay;

        return $this;
    }

    /**
     * Gets is_direct_deposit
     *
     * @return bool
     */
    public function getIsDirectDeposit()
    {
        return $this->container['is_direct_deposit'];
    }

    /**
     * Sets is_direct_deposit
     *
     * @param bool $is_direct_deposit is_direct_deposit
     *
     * @return $this
     */
    public function setIsDirectDeposit($is_direct_deposit)
    {
        $this->container['is_direct_deposit'] = $is_direct_deposit;

        return $this;
    }

    /**
     * Gets is_expense
     *
     * @return bool
     */
    public function getIsExpense()
    {
        return $this->container['is_expense'];
    }

    /**
     * Sets is_expense
     *
     * @param bool $is_expense is_expense
     *
     * @return $this
     */
    public function setIsExpense($is_expense)
    {
        $this->container['is_expense'] = $is_expense;

        return $this;
    }

    /**
     * Gets is_fee
     *
     * @return bool
     */
    public function getIsFee()
    {
        return $this->container['is_fee'];
    }

    /**
     * Sets is_fee
     *
     * @param bool $is_fee is_fee
     *
     * @return $this
     */
    public function setIsFee($is_fee)
    {
        $this->container['is_fee'] = $is_fee;

        return $this;
    }

    /**
     * Gets is_income
     *
     * @return bool
     */
    public function getIsIncome()
    {
        return $this->container['is_income'];
    }

    /**
     * Sets is_income
     *
     * @param bool $is_income is_income
     *
     * @return $this
     */
    public function setIsIncome($is_income)
    {
        $this->container['is_income'] = $is_income;

        return $this;
    }

    /**
     * Gets is_international
     *
     * @return bool
     */
    public function getIsInternational()
    {
        return $this->container['is_international'];
    }

    /**
     * Sets is_international
     *
     * @param bool $is_international is_international
     *
     * @return $this
     */
    public function setIsInternational($is_international)
    {
        $this->container['is_international'] = $is_international;

        return $this;
    }

    /**
     * Gets is_overdraft_fee
     *
     * @return bool
     */
    public function getIsOverdraftFee()
    {
        return $this->container['is_overdraft_fee'];
    }

    /**
     * Sets is_overdraft_fee
     *
     * @param bool $is_overdraft_fee is_overdraft_fee
     *
     * @return $this
     */
    public function setIsOverdraftFee($is_overdraft_fee)
    {
        $this->container['is_overdraft_fee'] = $is_overdraft_fee;

        return $this;
    }

    /**
     * Gets is_payroll_advance
     *
     * @return bool
     */
    public function getIsPayrollAdvance()
    {
        return $this->container['is_payroll_advance'];
    }

    /**
     * Sets is_payroll_advance
     *
     * @param bool $is_payroll_advance is_payroll_advance
     *
     * @return $this
     */
    public function setIsPayrollAdvance($is_payroll_advance)
    {
        $this->container['is_payroll_advance'] = $is_payroll_advance;

        return $this;
    }

    /**
     * Gets is_subscription
     *
     * @return bool
     */
    public function getIsSubscription()
    {
        return $this->container['is_subscription'];
    }

    /**
     * Sets is_subscription
     *
     * @param bool $is_subscription is_subscription
     *
     * @return $this
     */
    public function setIsSubscription($is_subscription)
    {
        $this->container['is_subscription'] = $is_subscription;

        return $this;
    }

    /**
     * Gets latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->container['latitude'];
    }

    /**
     * Sets latitude
     *
     * @param float $latitude latitude
     *
     * @return $this
     */
    public function setLatitude($latitude)
    {
        $this->container['latitude'] = $latitude;

        return $this;
    }

    /**
     * Gets longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->container['longitude'];
    }

    /**
     * Sets longitude
     *
     * @param float $longitude longitude
     *
     * @return $this
     */
    public function setLongitude($longitude)
    {
        $this->container['longitude'] = $longitude;

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
     * Gets memo
     *
     * @return string
     */
    public function getMemo()
    {
        return $this->container['memo'];
    }

    /**
     * Sets memo
     *
     * @param string $memo memo
     *
     * @return $this
     */
    public function setMemo($memo)
    {
        $this->container['memo'] = $memo;

        return $this;
    }

    /**
     * Gets merchant_category_code
     *
     * @return int
     */
    public function getMerchantCategoryCode()
    {
        return $this->container['merchant_category_code'];
    }

    /**
     * Sets merchant_category_code
     *
     * @param int $merchant_category_code merchant_category_code
     *
     * @return $this
     */
    public function setMerchantCategoryCode($merchant_category_code)
    {
        $this->container['merchant_category_code'] = $merchant_category_code;

        return $this;
    }

    /**
     * Gets merchant_guid
     *
     * @return string
     */
    public function getMerchantGuid()
    {
        return $this->container['merchant_guid'];
    }

    /**
     * Sets merchant_guid
     *
     * @param string $merchant_guid merchant_guid
     *
     * @return $this
     */
    public function setMerchantGuid($merchant_guid)
    {
        $this->container['merchant_guid'] = $merchant_guid;

        return $this;
    }

    /**
     * Gets original_description
     *
     * @return string
     */
    public function getOriginalDescription()
    {
        return $this->container['original_description'];
    }

    /**
     * Sets original_description
     *
     * @param string $original_description original_description
     *
     * @return $this
     */
    public function setOriginalDescription($original_description)
    {
        $this->container['original_description'] = $original_description;

        return $this;
    }

    /**
     * Gets posted_at
     *
     * @return string
     */
    public function getPostedAt()
    {
        return $this->container['posted_at'];
    }

    /**
     * Sets posted_at
     *
     * @param string $posted_at posted_at
     *
     * @return $this
     */
    public function setPostedAt($posted_at)
    {
        $this->container['posted_at'] = $posted_at;

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
     * Gets top_level_category
     *
     * @return string
     */
    public function getTopLevelCategory()
    {
        return $this->container['top_level_category'];
    }

    /**
     * Sets top_level_category
     *
     * @param string $top_level_category top_level_category
     *
     * @return $this
     */
    public function setTopLevelCategory($top_level_category)
    {
        $this->container['top_level_category'] = $top_level_category;

        return $this;
    }

    /**
     * Gets transacted_at
     *
     * @return string
     */
    public function getTransactedAt()
    {
        return $this->container['transacted_at'];
    }

    /**
     * Sets transacted_at
     *
     * @param string $transacted_at transacted_at
     *
     * @return $this
     */
    public function setTransactedAt($transacted_at)
    {
        $this->container['transacted_at'] = $transacted_at;

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


