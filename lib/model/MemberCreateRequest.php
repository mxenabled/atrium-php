<?php
/**
 * MemberCreateRequest
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
 * MemberCreateRequest Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class MemberCreateRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $mxModelName = 'MemberCreateRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxTypes = [
        'credentials' => '\atrium\model\CredentialRequest[]',
        'identifier' => 'string',
        'is_oauth' => 'bool',
        'institution_code' => 'string',
        'metadata' => 'string',
        'referral_source' => 'string',
        'skip_aggregation' => 'bool',
        'ui_message_webview_url_scheme' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $mxFormats = [
        'credentials' => null,
        'identifier' => null,
        'is_oauth' => null,
        'institution_code' => null,
        'metadata' => null,
        'referral_source' => null,
        'skip_aggregation' => null,
        'ui_message_webview_url_scheme' => null
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
        'credentials' => 'credentials',
        'identifier' => 'identifier',
        'is_oauth' => 'is_oauth',
        'institution_code' => 'institution_code',
        'metadata' => 'metadata',
        'referral_source' => 'referral_source',
        'skip_aggregation' => 'skip_aggregation',
        'ui_message_webview_url_scheme' => 'ui_message_webview_url_scheme'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'credentials' => 'setCredentials',
        'identifier' => 'setIdentifier',
        'is_oauth' => 'setIsOauth',
        'institution_code' => 'setInstitutionCode',
        'metadata' => 'setMetadata',
        'referral_source' => 'setReferralSource',
        'skip_aggregation' => 'setSkipAggregation',
        'ui_message_webview_url_scheme' => 'setUiMessageWebviewUrlScheme'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'credentials' => 'getCredentials',
        'identifier' => 'getIdentifier',
        'is_oauth' => 'getIsOauth',
        'institution_code' => 'getInstitutionCode',
        'metadata' => 'getMetadata',
        'referral_source' => 'getReferralSource',
        'skip_aggregation' => 'getSkipAggregation',
        'ui_message_webview_url_scheme' => 'getUiMessageWebviewUrlScheme'
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
        $this->container['credentials'] = isset($data['credentials']) ? $data['credentials'] : null;
        $this->container['identifier'] = isset($data['identifier']) ? $data['identifier'] : null;
        $this->container['is_oauth'] = isset($data['is_oauth']) ? $data['is_oauth'] : null;
        $this->container['institution_code'] = isset($data['institution_code']) ? $data['institution_code'] : null;
        $this->container['metadata'] = isset($data['metadata']) ? $data['metadata'] : null;
        $this->container['referral_source'] = isset($data['referral_source']) ? $data['referral_source'] : null;
        $this->container['skip_aggregation'] = isset($data['skip_aggregation']) ? $data['skip_aggregation'] : null;
        $this->container['ui_message_webview_url_scheme'] = isset($data['ui_message_webview_url_scheme']) ? $data['ui_message_webview_url_scheme'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['institution_code'] === null) {
            $invalidProperties[] = "'institution_code' can't be null";
        }
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
     * Gets credentials
     *
     * @return \atrium\model\CredentialRequest[]
     */
    public function getCredentials()
    {
        return $this->container['credentials'];
    }

    /**
     * Sets credentials
     *
     * @param \atrium\model\CredentialRequest[] $credentials credentials
     *
     * @return $this
     */
    public function setCredentials($credentials)
    {
        $this->container['credentials'] = $credentials;

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
     * Gets is_oauth
     *
     * @return bool
     */
    public function getIsOauth()
    {
        return $this->container['is_oauth'];
    }

    /**
     * Sets is_oauth
     *
     * @param bool $is_oauth is_oauth
     *
     * @return $this
     */
    public function setIsOauth($is_oauth)
    {
        $this->container['is_oauth'] = $is_oauth;

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
     * Gets referral_source
     *
     * @return string
     */
    public function getReferralSource()
    {
        return $this->container['referral_source'];
    }

    /**
     * Sets referral_source
     *
     * @param string $referral_source referral_source
     *
     * @return $this
     */
    public function setReferralSource($referral_source)
    {
        $this->container['referral_source'] = $referral_source;

        return $this;
    }

    /**
     * Gets skip_aggregation
     *
     * @return bool
     */
    public function getSkipAggregation()
    {
        return $this->container['skip_aggregation'];
    }

    /**
     * Sets skip_aggregation
     *
     * @param bool $skip_aggregation skip_aggregation
     *
     * @return $this
     */
    public function setSkipAggregation($skip_aggregation)
    {
        $this->container['skip_aggregation'] = $skip_aggregation;

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


