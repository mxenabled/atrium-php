<?php
/**
 * Institution
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
 * Institution Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class Institution implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $mxModelName = 'Institution';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxTypes = [
        'code' => 'string',
        'medium_logo_url' => 'string',
        'name' => 'string',
        'small_logo_url' => 'string',
        'supports_account_identification' => 'bool',
        'supports_account_statement' => 'bool',
        'supports_account_verification' => 'bool',
        'supports_oauth' => 'bool',
        'supports_transaction_history' => 'bool',
        'url' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxFormats = [
        'code' => null,
        'medium_logo_url' => null,
        'name' => null,
        'small_logo_url' => null,
        'supports_account_identification' => null,
        'supports_account_statement' => null,
        'supports_account_verification' => null,
        'supports_oauth' => null,
        'supports_transaction_history' => null,
        'url' => null
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
        'code' => 'code',
        'medium_logo_url' => 'medium_logo_url',
        'name' => 'name',
        'small_logo_url' => 'small_logo_url',
        'supports_account_identification' => 'supports_account_identification',
        'supports_account_statement' => 'supports_account_statement',
        'supports_account_verification' => 'supports_account_verification',
        'supports_oauth' => 'supports_oauth',
        'supports_transaction_history' => 'supports_transaction_history',
        'url' => 'url'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'code' => 'setCode',
        'medium_logo_url' => 'setMediumLogoUrl',
        'name' => 'setName',
        'small_logo_url' => 'setSmallLogoUrl',
        'supports_account_identification' => 'setSupportsAccountIdentification',
        'supports_account_statement' => 'setSupportsAccountStatement',
        'supports_account_verification' => 'setSupportsAccountVerification',
        'supports_oauth' => 'setSupportsOauth',
        'supports_transaction_history' => 'setSupportsTransactionHistory',
        'url' => 'setUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'code' => 'getCode',
        'medium_logo_url' => 'getMediumLogoUrl',
        'name' => 'getName',
        'small_logo_url' => 'getSmallLogoUrl',
        'supports_account_identification' => 'getSupportsAccountIdentification',
        'supports_account_statement' => 'getSupportsAccountStatement',
        'supports_account_verification' => 'getSupportsAccountVerification',
        'supports_oauth' => 'getSupportsOauth',
        'supports_transaction_history' => 'getSupportsTransactionHistory',
        'url' => 'getUrl'
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
        $this->container['code'] = isset($data['code']) ? $data['code'] : null;
        $this->container['medium_logo_url'] = isset($data['medium_logo_url']) ? $data['medium_logo_url'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['small_logo_url'] = isset($data['small_logo_url']) ? $data['small_logo_url'] : null;
        $this->container['supports_account_identification'] = isset($data['supports_account_identification']) ? $data['supports_account_identification'] : null;
        $this->container['supports_account_statement'] = isset($data['supports_account_statement']) ? $data['supports_account_statement'] : null;
        $this->container['supports_account_verification'] = isset($data['supports_account_verification']) ? $data['supports_account_verification'] : null;
        $this->container['supports_oauth'] = isset($data['supports_oauth']) ? $data['supports_oauth'] : null;
        $this->container['supports_transaction_history'] = isset($data['supports_transaction_history']) ? $data['supports_transaction_history'] : null;
        $this->container['url'] = isset($data['url']) ? $data['url'] : null;
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
     * Gets code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->container['code'];
    }

    /**
     * Sets code
     *
     * @param string $code code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->container['code'] = $code;

        return $this;
    }

    /**
     * Gets medium_logo_url
     *
     * @return string
     */
    public function getMediumLogoUrl()
    {
        return $this->container['medium_logo_url'];
    }

    /**
     * Sets medium_logo_url
     *
     * @param string $medium_logo_url medium_logo_url
     *
     * @return $this
     */
    public function setMediumLogoUrl($medium_logo_url)
    {
        $this->container['medium_logo_url'] = $medium_logo_url;

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
     * Gets small_logo_url
     *
     * @return string
     */
    public function getSmallLogoUrl()
    {
        return $this->container['small_logo_url'];
    }

    /**
     * Sets small_logo_url
     *
     * @param string $small_logo_url small_logo_url
     *
     * @return $this
     */
    public function setSmallLogoUrl($small_logo_url)
    {
        $this->container['small_logo_url'] = $small_logo_url;

        return $this;
    }

    /**
     * Gets supports_account_identification
     *
     * @return bool
     */
    public function getSupportsAccountIdentification()
    {
        return $this->container['supports_account_identification'];
    }

    /**
     * Sets supports_account_identification
     *
     * @param bool $supports_account_identification supports_account_identification
     *
     * @return $this
     */
    public function setSupportsAccountIdentification($supports_account_identification)
    {
        $this->container['supports_account_identification'] = $supports_account_identification;

        return $this;
    }

    /**
     * Gets supports_account_statement
     *
     * @return bool
     */
    public function getSupportsAccountStatement()
    {
        return $this->container['supports_account_statement'];
    }

    /**
     * Sets supports_account_statement
     *
     * @param bool $supports_account_statement supports_account_statement
     *
     * @return $this
     */
    public function setSupportsAccountStatement($supports_account_statement)
    {
        $this->container['supports_account_statement'] = $supports_account_statement;

        return $this;
    }

    /**
     * Gets supports_account_verification
     *
     * @return bool
     */
    public function getSupportsAccountVerification()
    {
        return $this->container['supports_account_verification'];
    }

    /**
     * Sets supports_account_verification
     *
     * @param bool $supports_account_verification supports_account_verification
     *
     * @return $this
     */
    public function setSupportsAccountVerification($supports_account_verification)
    {
        $this->container['supports_account_verification'] = $supports_account_verification;

        return $this;
    }

    /**
     * Gets supports_oauth
     *
     * @return bool
     */
    public function getSupportsOauth()
    {
        return $this->container['supports_oauth'];
    }

    /**
     * Sets supports_oauth
     *
     * @param bool $supports_oauth supports_oauth
     *
     * @return $this
     */
    public function setSupportsOauth($supports_oauth)
    {
        $this->container['supports_oauth'] = $supports_oauth;

        return $this;
    }

    /**
     * Gets supports_transaction_history
     *
     * @return bool
     */
    public function getSupportsTransactionHistory()
    {
        return $this->container['supports_transaction_history'];
    }

    /**
     * Sets supports_transaction_history
     *
     * @param bool $supports_transaction_history supports_transaction_history
     *
     * @return $this
     */
    public function setSupportsTransactionHistory($supports_transaction_history)
    {
        $this->container['supports_transaction_history'] = $supports_transaction_history;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

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


