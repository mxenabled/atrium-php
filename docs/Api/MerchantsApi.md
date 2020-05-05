# atrium\MerchantsApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**listMerchantLocations**](MerchantsApi.md#listMerchantLocations) | **GET** /merchants/{merchant_guid}/merchant_locations | List merchant locations
[**listMerchants**](MerchantsApi.md#listMerchants) | **GET** /merchants | List merchants
[**readMerchant**](MerchantsApi.md#readMerchant) | **GET** /merchants/{merchant_guid} | Read merchant
[**readMerchantLocation**](MerchantsApi.md#readMerchantLocation) | **GET** /merchants/{merchant_guid}/merchant_locations/{merchant_location_guid} | Read merchant location


# **listMerchantLocations**
> \atrium\model\MerchantLocationsResponseBody listMerchantLocations($merchant_guid)

List merchant locations

Returns a list of all the merchant locations associated with a merchant, including physical location, latitude, longitude, etc.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$client = new atrium\Api\AtriumClient(
    "YOUR_API_KEY",
    "YOUR_CLIENT_ID",
    new GuzzleHttp\Client()
);

$merchant_guid = "MCH-123"; // string | The unique identifier for a `merchant`.

try {
    $result = $client->merchants->listMerchantLocations($merchant_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MerchantsApi->listMerchantLocations: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **merchant_guid** | **string**| The unique identifier for a &#x60;merchant&#x60;. |

### Return type

[**\atrium\model\MerchantLocationsResponseBody**](../Model/MerchantLocationsResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listMerchants**
> \atrium\model\MerchantsResponseBody listMerchants()

List merchants

Returns a list of merchnants.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$client = new atrium\Api\AtriumClient(
    "YOUR_API_KEY",
    "YOUR_CLIENT_ID",
    new GuzzleHttp\Client()
);


try {
    $result = $client->merchants->listMerchants();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MerchantsApi->listMerchants: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\atrium\model\MerchantsResponseBody**](../Model/MerchantsResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **readMerchant**
> \atrium\model\MerchantResponseBody readMerchant($merchant_guid)

Read merchant

Returns information about a particular merchant, such as a logo, name, and website.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$client = new atrium\Api\AtriumClient(
    "YOUR_API_KEY",
    "YOUR_CLIENT_ID",
    new GuzzleHttp\Client()
);

$merchant_guid = "MCH-123"; // string | The unique identifier for a `merchant`.

try {
    $result = $client->merchants->readMerchant($merchant_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MerchantsApi->readMerchant: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **merchant_guid** | **string**| The unique identifier for a &#x60;merchant&#x60;. |

### Return type

[**\atrium\model\MerchantResponseBody**](../Model/MerchantResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **readMerchantLocation**
> \atrium\model\MerchantLocationResponseBody readMerchantLocation($merchant_guid, $merchant_location_guid)

Read merchant location

Retuns a specific location associated with a merchant, including physical location, latitude, longitude, etc.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$client = new atrium\Api\AtriumClient(
    "YOUR_API_KEY",
    "YOUR_CLIENT_ID",
    new GuzzleHttp\Client()
);

$merchant_guid = "MCH-123"; // string | The unique identifier for a `merchant`.
$merchant_location_guid = "MCL-123"; // string | The unique identifier for a `merchant_location`.

try {
    $result = $client->merchants->readMerchantLocation($merchant_guid, $merchant_location_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MerchantsApi->readMerchantLocation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **merchant_guid** | **string**| The unique identifier for a &#x60;merchant&#x60;. |
 **merchant_location_guid** | **string**| The unique identifier for a &#x60;merchant_location&#x60;. |

### Return type

[**\atrium\model\MerchantLocationResponseBody**](../Model/MerchantLocationResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

