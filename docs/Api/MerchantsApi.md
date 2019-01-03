# atrium\MerchantsApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**readMerchant**](MerchantsApi.md#readMerchant) | **GET** /merchants/{merchant_guid} | Read merchant


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

