<?php
/**
 * TransactionCleanseAndCategorizeResponse
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
 * TransactionCleanseAndCategorizeResponse Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class TransactionCleanseAndCategorizeResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $mxModelName = 'TransactionCleanseAndCategorizeResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxTypes = [
        'amount' => 'float',
        'category' => 'string',
        'description' => 'string',
        'identifier' => 'string',
        'type' => 'string',
        'is_bill_pay' => 'bool',
        'is_direct_deposit' => 'bool',
        'is_expense' => 'bool',
        'is_fee' => 'bool',
        'is_income' => 'bool',
        'is_international' => 'bool',
        'is_overdraft_fee' => 'bool',
        'is_payroll_advance' => 'bool',
        'merchant_category_code' => 'float',
        'merchant_guid' => 'string',
        'original_description' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxFormats = [
        'amount' => null,
        'category' => null,
        'description' => null,
        'identifier' => null,
        'type' => null,
        'is_bill_pay' => null,
        'is_direct_deposit' => null,
        'is_expense' => null,
        'is_fee' => null,
        'is_income' => null,
        'is_international' => null,
        'is_overdraft_fee' => null,
        'is_payroll_advance' => null,
        'merchant_category_code' => null,
        'merchant_guid' => null,
        'original_description' => null
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
        'amount' => 'amount',
        'category' => 'category',
        'description' => 'description',
        'identifier' => 'identifier',
        'type' => 'type',
        'is_bill_pay' => 'is_bill_pay',
        'is_direct_deposit' => 'is_direct_deposit',
        'is_expense' => 'is_expense',
        'is_fee' => 'is_fee',
        'is_income' => 'is_income',
        'is_international' => 'is_international',
        'is_overdraft_fee' => 'is_overdraft_fee',
        'is_payroll_advance' => 'is_payroll_advance',
        'merchant_category_code' => 'merchant_category_code',
        'merchant_guid' => 'merchant_guid',
        'original_description' => 'original_description'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'category' => 'setCategory',
        'description' => 'setDescription',
        'identifier' => 'setIdentifier',
        'type' => 'setType',
        'is_bill_pay' => 'setIsBillPay',
        'is_direct_deposit' => 'setIsDirectDeposit',
        'is_expense' => 'setIsExpense',
        'is_fee' => 'setIsFee',
        'is_income' => 'setIsIncome',
        'is_international' => 'setIsInternational',
        'is_overdraft_fee' => 'setIsOverdraftFee',
        'is_payroll_advance' => 'setIsPayrollAdvance',
        'merchant_category_code' => 'setMerchantCategoryCode',
        'merchant_guid' => 'setMerchantGuid',
        'original_description' => 'setOriginalDescription'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'category' => 'getCategory',
        'description' => 'getDescription',
        'identifier' => 'getIdentifier',
        'type' => 'getType',
        'is_bill_pay' => 'getIsBillPay',
        'is_direct_deposit' => 'getIsDirectDeposit',
        'is_expense' => 'getIsExpense',
        'is_fee' => 'getIsFee',
        'is_income' => 'getIsIncome',
        'is_international' => 'getIsInternational',
        'is_overdraft_fee' => 'getIsOverdraftFee',
        'is_payroll_advance' => 'getIsPayrollAdvance',
        'merchant_category_code' => 'getMerchantCategoryCode',
        'merchant_guid' => 'getMerchantGuid',
        'original_description' => 'getOriginalDescription'
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
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['category'] = isset($data['category']) ? $data['category'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['identifier'] = isset($data['identifier']) ? $data['identifier'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['is_bill_pay'] = isset($data['is_bill_pay']) ? $data['is_bill_pay'] : null;
        $this->container['is_direct_deposit'] = isset($data['is_direct_deposit']) ? $data['is_direct_deposit'] : null;
        $this->container['is_expense'] = isset($data['is_expense']) ? $data['is_expense'] : null;
        $this->container['is_fee'] = isset($data['is_fee']) ? $data['is_fee'] : null;
        $this->container['is_income'] = isset($data['is_income']) ? $data['is_income'] : null;
        $this->container['is_international'] = isset($data['is_international']) ? $data['is_international'] : null;
        $this->container['is_overdraft_fee'] = isset($data['is_overdraft_fee']) ? $data['is_overdraft_fee'] : null;
        $this->container['is_payroll_advance'] = isset($data['is_payroll_advance']) ? $data['is_payroll_advance'] : null;
        $this->container['merchant_category_code'] = isset($data['merchant_category_code']) ? $data['merchant_category_code'] : null;
        $this->container['merchant_guid'] = isset($data['merchant_guid']) ? $data['merchant_guid'] : null;
        $this->container['original_description'] = isset($data['original_description']) ? $data['original_description'] : null;
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
     * Gets merchant_category_code
     *
     * @return float
     */
    public function getMerchantCategoryCode()
    {
        return $this->container['merchant_category_code'];
    }

    /**
     * Sets merchant_category_code
     *
     * @param float $merchant_category_code merchant_category_code
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


