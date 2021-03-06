<?php
/**
 * ConnectWidgetRequestBody
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
 * ConnectWidgetRequestBody Class Doc Comment
 *
 * @category Class
 * @package  atrium
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
        'color_scheme' => 'string',
        'current_institution_code' => 'string',
        'current_member_guid' => 'string',
        'disable_institution_search' => 'bool',
        'include_transactions' => 'bool',
        'mode' => 'string',
        'ui_message_version' => 'float',
        'ui_message_webview_url_scheme' => 'string',
        'update_credentials' => 'bool',
        'wait_for_full_aggregation' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxFormats = [
        'is_mobile_webview' => null,
        'color_scheme' => null,
        'current_institution_code' => null,
        'current_member_guid' => null,
        'disable_institution_search' => null,
        'include_transactions' => null,
        'mode' => null,
        'ui_message_version' => null,
        'ui_message_webview_url_scheme' => null,
        'update_credentials' => null,
        'wait_for_full_aggregation' => null
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
        'color_scheme' => 'color_scheme',
        'current_institution_code' => 'current_institution_code',
        'current_member_guid' => 'current_member_guid',
        'disable_institution_search' => 'disable_institution_search',
        'include_transactions' => 'include_transactions',
        'mode' => 'mode',
        'ui_message_version' => 'ui_message_version',
        'ui_message_webview_url_scheme' => 'ui_message_webview_url_scheme',
        'update_credentials' => 'update_credentials',
        'wait_for_full_aggregation' => 'wait_for_full_aggregation'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'is_mobile_webview' => 'setIsMobileWebview',
        'color_scheme' => 'setColorScheme',
        'current_institution_code' => 'setCurrentInstitutionCode',
        'current_member_guid' => 'setCurrentMemberGuid',
        'disable_institution_search' => 'setDisableInstitutionSearch',
        'include_transactions' => 'setIncludeTransactions',
        'mode' => 'setMode',
        'ui_message_version' => 'setUiMessageVersion',
        'ui_message_webview_url_scheme' => 'setUiMessageWebviewUrlScheme',
        'update_credentials' => 'setUpdateCredentials',
        'wait_for_full_aggregation' => 'setWaitForFullAggregation'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'is_mobile_webview' => 'getIsMobileWebview',
        'color_scheme' => 'getColorScheme',
        'current_institution_code' => 'getCurrentInstitutionCode',
        'current_member_guid' => 'getCurrentMemberGuid',
        'disable_institution_search' => 'getDisableInstitutionSearch',
        'include_transactions' => 'getIncludeTransactions',
        'mode' => 'getMode',
        'ui_message_version' => 'getUiMessageVersion',
        'ui_message_webview_url_scheme' => 'getUiMessageWebviewUrlScheme',
        'update_credentials' => 'getUpdateCredentials',
        'wait_for_full_aggregation' => 'getWaitForFullAggregation'
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
        $this->container['color_scheme'] = isset($data['color_scheme']) ? $data['color_scheme'] : null;
        $this->container['current_institution_code'] = isset($data['current_institution_code']) ? $data['current_institution_code'] : null;
        $this->container['current_member_guid'] = isset($data['current_member_guid']) ? $data['current_member_guid'] : null;
        $this->container['disable_institution_search'] = isset($data['disable_institution_search']) ? $data['disable_institution_search'] : null;
        $this->container['include_transactions'] = isset($data['include_transactions']) ? $data['include_transactions'] : null;
        $this->container['mode'] = isset($data['mode']) ? $data['mode'] : null;
        $this->container['ui_message_version'] = isset($data['ui_message_version']) ? $data['ui_message_version'] : null;
        $this->container['ui_message_webview_url_scheme'] = isset($data['ui_message_webview_url_scheme']) ? $data['ui_message_webview_url_scheme'] : null;
        $this->container['update_credentials'] = isset($data['update_credentials']) ? $data['update_credentials'] : null;
        $this->container['wait_for_full_aggregation'] = isset($data['wait_for_full_aggregation']) ? $data['wait_for_full_aggregation'] : null;
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
     * Gets color_scheme
     *
     * @return string
     */
    public function getColorScheme()
    {
        return $this->container['color_scheme'];
    }

    /**
     * Sets color_scheme
     *
     * @param string $color_scheme color_scheme
     *
     * @return $this
     */
    public function setColorScheme($color_scheme)
    {
        $this->container['color_scheme'] = $color_scheme;

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
     * Gets disable_institution_search
     *
     * @return bool
     */
    public function getDisableInstitutionSearch()
    {
        return $this->container['disable_institution_search'];
    }

    /**
     * Sets disable_institution_search
     *
     * @param bool $disable_institution_search disable_institution_search
     *
     * @return $this
     */
    public function setDisableInstitutionSearch($disable_institution_search)
    {
        $this->container['disable_institution_search'] = $disable_institution_search;

        return $this;
    }

    /**
     * Gets include_transactions
     *
     * @return bool
     */
    public function getIncludeTransactions()
    {
        return $this->container['include_transactions'];
    }

    /**
     * Sets include_transactions
     *
     * @param bool $include_transactions include_transactions
     *
     * @return $this
     */
    public function setIncludeTransactions($include_transactions)
    {
        $this->container['include_transactions'] = $include_transactions;

        return $this;
    }

    /**
     * Gets mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->container['mode'];
    }

    /**
     * Sets mode
     *
     * @param string $mode mode
     *
     * @return $this
     */
    public function setMode($mode)
    {
        $this->container['mode'] = $mode;

        return $this;
    }

    /**
     * Gets ui_message_version
     *
     * @return float
     */
    public function getUiMessageVersion()
    {
        return $this->container['ui_message_version'];
    }

    /**
     * Sets ui_message_version
     *
     * @param float $ui_message_version ui_message_version
     *
     * @return $this
     */
    public function setUiMessageVersion($ui_message_version)
    {
        $this->container['ui_message_version'] = $ui_message_version;

        return $this;
    }

    /**
     * Gets ui_message_webview_url_scheme
     *
     * @return string
     */
    public function getUiMessageWebviewUrlScheme()
    {
        return $this->container['ui_message_webview_url_scheme'];
    }

    /**
     * Sets ui_message_webview_url_scheme
     *
     * @param string $ui_message_webview_url_scheme ui_message_webview_url_scheme
     *
     * @return $this
     */
    public function setUiMessageWebviewUrlScheme($ui_message_webview_url_scheme)
    {
        $this->container['ui_message_webview_url_scheme'] = $ui_message_webview_url_scheme;

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
     * Gets wait_for_full_aggregation
     *
     * @return bool
     */
    public function getWaitForFullAggregation()
    {
        return $this->container['wait_for_full_aggregation'];
    }

    /**
     * Sets wait_for_full_aggregation
     *
     * @param bool $wait_for_full_aggregation wait_for_full_aggregation
     *
     * @return $this
     */
    public function setWaitForFullAggregation($wait_for_full_aggregation)
    {
        $this->container['wait_for_full_aggregation'] = $wait_for_full_aggregation;

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


