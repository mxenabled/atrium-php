# atrium-php\IdentityApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**identifyMember**](IdentityApi.md#identifyMember) | **POST** /users/{user_guid}/members/{member_guid}/identify | Identify
[**listAccountOwners**](IdentityApi.md#listAccountOwners) | **GET** /users/{user_guid}/members/{member_guid}/account_owners | List member account owners


# **identifyMember**
> \atrium-php\atrium-php\Member identifyMember($member_guid, $user_guid)

Identify

The identify endpoint begins an identification process for an already-existing member.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: apiKey
$config = atrium-php\Configuration::getDefaultConfiguration()->setApiKey('MX-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = atrium-php\Configuration::getDefaultConfiguration()->setApiKeyPrefix('MX-API-Key', 'Bearer');
// Configure API key authorization: clientID
$config = atrium-php\Configuration::getDefaultConfiguration()->setApiKey('MX-Client-ID', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = atrium-php\Configuration::getDefaultConfiguration()->setApiKeyPrefix('MX-Client-ID', 'Bearer');

$apiInstance = new atrium-php\Api\IdentityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $apiInstance->identifyMember($member_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IdentityApi->identifyMember: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

[**\atrium-php\atrium-php\Member**](../Model/Member.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listAccountOwners**
> \atrium-php\atrium-php\AccountOwners listAccountOwners($member_guid, $user_guid)

List member account owners

This endpoint returns an array with information about every account associated with a particular member.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: apiKey
$config = atrium-php\Configuration::getDefaultConfiguration()->setApiKey('MX-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = atrium-php\Configuration::getDefaultConfiguration()->setApiKeyPrefix('MX-API-Key', 'Bearer');
// Configure API key authorization: clientID
$config = atrium-php\Configuration::getDefaultConfiguration()->setApiKey('MX-Client-ID', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = atrium-php\Configuration::getDefaultConfiguration()->setApiKeyPrefix('MX-Client-ID', 'Bearer');

$apiInstance = new atrium-php\Api\IdentityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $apiInstance->listAccountOwners($member_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IdentityApi->listAccountOwners: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

[**\atrium-php\atrium-php\AccountOwners**](../Model/AccountOwners.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)
