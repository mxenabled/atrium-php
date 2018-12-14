# atrium\VerificationApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**listAccountNumbers**](VerificationApi.md#listAccountNumbers) | **GET** /users/{user_guid}/members/{member_guid}/account_numbers | Read account numbers
[**listAccountNumbersByAccount**](VerificationApi.md#listAccountNumbersByAccount) | **GET** /users/{user_guid}/accounts/{account_guid}/account_numbers | Read account numbers by account GUID
[**verifyMember**](VerificationApi.md#verifyMember) | **POST** /users/{user_guid}/members/{member_guid}/verify | Verify


# **listAccountNumbers**
> \atrium\model\AccountNumbersResponseBody listAccountNumbers($member_guid, $user_guid)

Read account numbers

Use this endpoint to check whether account and routing numbers are available for accounts associated with a particular member. It returns the account_numbers object, which contains account and routing number data for each account associated with the member.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API Key authorization
$config = atrium\Configuration::getDefaultConfiguration()->setApiKey('MX-API-Key', 'YOUR_API_KEY');

// Configure Client ID authorization
$config = atrium\Configuration::getDefaultConfiguration()->setApiKey('MX-Client-ID', 'YOUR_CLIENT_ID');

$client = new atrium\Api\AtriumClient(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    $config,
    new GuzzleHttp\Client()
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $client->verification->listAccountNumbers($member_guid, $user_guid);
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

[**\atrium\model\AccountNumbersResponseBody**](../Model/AccountNumbersResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listAccountNumbersByAccount**
> \atrium\model\AccountNumbersResponseBody listAccountNumbersByAccount($account_guid, $user_guid)

Read account numbers by account GUID

Use this endpoint to check whether account and routing numbers are available for a specific account. It returns the account_numbers object, which contains account and routing number data.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API Key authorization
$config = atrium\Configuration::getDefaultConfiguration()->setApiKey('MX-API-Key', 'YOUR_API_KEY');

// Configure Client ID authorization
$config = atrium\Configuration::getDefaultConfiguration()->setApiKey('MX-Client-ID', 'YOUR_CLIENT_ID');

$client = new atrium\Api\AtriumClient(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    $config,
    new GuzzleHttp\Client()
);
$account_guid = "account_guid_example"; // string | The unique identifier for an `account`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $client->verification->listAccountNumbersByAccount($account_guid, $user_guid);
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

[**\atrium\model\AccountNumbersResponseBody**](../Model/AccountNumbersResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **verifyMember**
> \atrium\model\MemberResponseBody verifyMember($member_guid, $user_guid)

Verify

The verify endpoint begins a verification process for a member.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API Key authorization
$config = atrium\Configuration::getDefaultConfiguration()->setApiKey('MX-API-Key', 'YOUR_API_KEY');

// Configure Client ID authorization
$config = atrium\Configuration::getDefaultConfiguration()->setApiKey('MX-Client-ID', 'YOUR_CLIENT_ID');

$client = new atrium\Api\AtriumClient(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    $config,
    new GuzzleHttp\Client()
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $client->verification->verifyMember($member_guid, $user_guid);
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

[**\atrium\model\MemberResponseBody**](../Model/MemberResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

