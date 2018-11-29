<?php
/**
 * ConnectWidgetRequestBody
 *
 * PHP version 5
 *
 * @category Class
 * @package  atrium-php
 */

/**
 * MX API
 *
 * The MX Atrium API supports over 48,000 data connections to thousands of financial institutions. It provides secure access to your users' accounts and transactions with industry-leading cleansing, categorization, and classification.  Atrium is designed according to resource-oriented REST architecture and responds with JSON bodies and HTTP response codes.  Use Atrium's development environment, vestibule.mx.com, to quickly get up and running. The development environment limits are 100 users, 25 members per user, and access to the top 15 institutions. Contact MX to purchase production access.
 *
 */


namespace atrium-php\atrium-php;

use \ArrayAccess;
use \atrium-php\ObjectSerializer;

/**
 * ConnectWidgetRequestBody Class Doc Comment
 *
 * @category Class
 * @package  atrium-php
 */
class ConnectWidgetRequestBody implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $mxModelName = 'ConnectWidgetRequestBody';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxTypes = [
        'is_mobile_webview' => 'bool',
        'current_institution_code' => 'string',
        'current_member_guid' => 'string',
        'update_credentials' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxFormats = [
        'is_mobile_webview' => null,
        'current_institution_code' => null,
        'current_member_guid' => null,
        'update_credentials' => null
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
        'is_mobile_webview' => 'is_mobile_webview',
        'current_institution_code' => 'current_institution_code',
        'current_member_guid' => 'current_member_guid',
        'update_credentials' => 'update_credentials'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'is_mobile_webview' => 'setIsMobileWebview',
        'current_institution_code' => 'setCurrentInstitutionCode',
        'current_member_guid' => 'setCurrentMemberGuid',
        'update_credentials' => 'setUpdateCredentials'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'is_mobile_webview' => 'getIsMobileWebview',
        'current_institution_code' => 'getCurrentInstitutionCode',
        'current_member_guid' => 'getCurrentMemberGuid',
        'update_credentials' => 'getUpdateCredentials'
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
        $this->container['is_mobile_webview'] = isset($data['is_mobile_webview']) ? $data['is_mobile_webview'] : null;
        $this->container['current_institution_code'] = isset($data['current_institution_code']) ? $data['current_institution_code'] : null;
        $this->container['current_member_guid'] = isset($data['current_member_guid']) ? $data['current_member_guid'] : null;
        $this->container['update_credentials'] = isset($data['update_credentials']) ? $data['update_credentials'] : null;
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
     * Gets is_mobile_webview
     *
     * @return bool
     */
    public function getIsMobileWebview()
    {
        return $this->container['is_mobile_webview'];
    }

    /**
     * Sets is_mobile_webview
     *
     * @param bool $is_mobile_webview is_mobile_webview
     *
     * @return $this
     */
    public function setIsMobileWebview($is_mobile_webview)
    {
        $this->container['is_mobile_webview'] = $is_mobile_webview;

        return $this;
    }

    /**
     * Gets current_institution_code
     *
     * @return string
     */
    public function getCurrentInstitutionCode()
    {
        return $this->container['current_institution_code'];
    }

    /**
     * Sets current_institution_code
     *
     * @param string $current_institution_code current_institution_code
     *
     * @return $this
     */
    public function setCurrentInstitutionCode($current_institution_code)
    {
        $this->container['current_institution_code'] = $current_institution_code;

        return $this;
    }

    /**
     * Gets current_member_guid
     *
     * @return string
     */
    public function getCurrentMemberGuid()
    {
        return $this->container['current_member_guid'];
    }

    /**
     * Sets current_member_guid
     *
     * @param string $current_member_guid current_member_guid
     *
     * @return $this
     */
    public function setCurrentMemberGuid($current_member_guid)
    {
        $this->container['current_member_guid'] = $current_member_guid;

        return $this;
    }

    /**
     * Gets update_credentials
     *
     * @return bool
     */
    public function getUpdateCredentials()
    {
        return $this->container['update_credentials'];
    }

    /**
     * Sets update_credentials
     *
     * @param bool $update_credentials update_credentials
     *
     * @return $this
     */
    public function setUpdateCredentials($update_credentials)
    {
        $this->container['update_credentials'] = $update_credentials;

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


