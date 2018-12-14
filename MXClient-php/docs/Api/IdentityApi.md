# atrium\IdentityApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**identifyMember**](IdentityApi.md#identifyMember) | **POST** /users/{user_guid}/members/{member_guid}/identify | Identify
[**listAccountOwners**](IdentityApi.md#listAccountOwners) | **GET** /users/{user_guid}/members/{member_guid}/account_owners | List member account owners


# **identifyMember**
> \atrium\model\MemberResponseBody identifyMember($member_guid, $user_guid)

Identify

The identify endpoint begins an identification process for an already-existing member.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API Key authorization
$config = atrium\Configuration::getDefaultConfiguration()->setHeader('MX-API-Key', 'YOUR_API_KEY');

// Configure Client ID authorization
$config = atrium\Configuration::getDefaultConfiguration()->setHeader('MX-Client-ID', 'YOUR_CLIENT_ID');

$client = new atrium\Api\AtriumClient(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    $config,
    new GuzzleHttp\Client()
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $client->identity->identifyMember($member_guid, $user_guid);
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

[**\atrium\model\MemberResponseBody**](../Model/MemberResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listAccountOwners**
> \atrium\model\AccountOwnersResponseBody listAccountOwners($member_guid, $user_guid)

List member account owners

This endpoint returns an array with information about every account associated with a particular member.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API Key authorization
$config = atrium\Configuration::getDefaultConfiguration()->setHeader('MX-API-Key', 'YOUR_API_KEY');

// Configure Client ID authorization
$config = atrium\Configuration::getDefaultConfiguration()->setHeader('MX-Client-ID', 'YOUR_CLIENT_ID');

$client = new atrium\Api\AtriumClient(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    $config,
    new GuzzleHttp\Client()
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $client->identity->listAccountOwners($member_guid, $user_guid);
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

[**\atrium\model\AccountOwnersResponseBody**](../Model/AccountOwnersResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

