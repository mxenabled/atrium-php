# atrium-php\VerificationApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**listAccountNumbers**](VerificationApi.md#listAccountNumbers) | **GET** /users/{user_guid}/members/{member_guid}/account_numbers | Read account numbers
[**listAccountNumbersByAccount**](VerificationApi.md#listAccountNumbersByAccount) | **GET** /users/{user_guid}/accounts/{account_guid}/account_numbers | Read account numbers by account GUID
[**verifyMember**](VerificationApi.md#verifyMember) | **POST** /users/{user_guid}/members/{member_guid}/verify | Verify


# **listAccountNumbers**
> \atrium-php\atrium-php\AccountNumbers listAccountNumbers($member_guid, $user_guid)

Read account numbers

Use this endpoint to check whether account and routing numbers are available for accounts associated with a particular member. It returns the account_numbers object, which contains account and routing number data for each account associated with the member.

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

$apiInstance = new atrium-php\Api\VerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $apiInstance->listAccountNumbers($member_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VerificationApi->listAccountNumbers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

[**\atrium-php\atrium-php\AccountNumbers**](../Model/AccountNumbers.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listAccountNumbersByAccount**
> \atrium-php\atrium-php\AccountNumbers listAccountNumbersByAccount($account_guid, $user_guid)

Read account numbers by account GUID

Use this endpoint to check whether account and routing numbers are available for a specific account. It returns the account_numbers object, which contains account and routing number data.

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

$apiInstance = new atrium-php\Api\VerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_guid = "account_guid_example"; // string | The unique identifier for an `account`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $apiInstance->listAccountNumbersByAccount($account_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VerificationApi->listAccountNumbersByAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_guid** | **string**| The unique identifier for an &#x60;account&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

[**\atrium-php\atrium-php\AccountNumbers**](../Model/AccountNumbers.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **verifyMember**
> \atrium-php\atrium-php\Member verifyMember($member_guid, $user_guid)

Verify

The verify endpoint begins a verification process for a member.

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

$apiInstance = new atrium-php\Api\VerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $apiInstance->verifyMember($member_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VerificationApi->verifyMember: ', $e->getMessage(), PHP_EOL;
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
