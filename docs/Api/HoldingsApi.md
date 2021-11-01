# atrium\HoldingsApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**listHoldings**](HoldingsApi.md#listHoldings) | **GET** /users/{user_guid}/holdings | List holdings
[**listHoldingsByAccount**](HoldingsApi.md#listHoldingsByAccount) | **GET** /users/{user_guid}/accounts/{account_guid}/holdings | List holdings by account
[**listHoldingsByMember**](HoldingsApi.md#listHoldingsByMember) | **GET** /users/{user_guid}/members/{member_guid}/holdings | List holdings by member
[**readHolding**](HoldingsApi.md#readHolding) | **GET** /users/{user_guid}/holdings/{holding_guid} | Read holding


# **listHoldings**
> \atrium\model\HoldingsResponseBody listHoldings($user_guid, $page, $records_per_page)

List holdings

Use this endpoint to read all holdings associated with a specific user.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$client = new atrium\Api\AtriumClient(
    "YOUR_API_KEY",
    "YOUR_CLIENT_ID",
    new GuzzleHttp\Client()
);

$user_guid = "USR-123"; // string | The unique identifier for a `user`.
$page = 1; // int | Specify current page.
$records_per_page = 12; // int | Specify records per page.

try {
    $result = $client->holdings->listHoldings($user_guid, $page, $records_per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoldingsApi->listHoldings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |
 **page** | **int**| Specify current page. | [optional]
 **records_per_page** | **int**| Specify records per page. | [optional]

### Return type

[**\atrium\model\HoldingsResponseBody**](../Model/HoldingsResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listHoldingsByAccount**
> \atrium\model\HoldingsResponseBody listHoldingsByAccount($account_guid, $user_guid, $page, $records_per_page)

List holdings by account

Use this endpoint to read all holdings associated with a specific account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$client = new atrium\Api\AtriumClient(
    "YOUR_API_KEY",
    "YOUR_CLIENT_ID",
    new GuzzleHttp\Client()
);

$account_guid = "ACT-123"; // string | The unique identifier for an `account`.
$user_guid = "USR-123"; // string | The unique identifier for a `user`.
$page = 1; // int | Specify current page.
$records_per_page = 12; // int | Specify records per page.

try {
    $result = $client->holdings->listHoldingsByAccount($account_guid, $user_guid, $page, $records_per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoldingsApi->listHoldingsByAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_guid** | **string**| The unique identifier for an &#x60;account&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |
 **page** | **int**| Specify current page. | [optional]
 **records_per_page** | **int**| Specify records per page. | [optional]

### Return type

[**\atrium\model\HoldingsResponseBody**](../Model/HoldingsResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listHoldingsByMember**
> \atrium\model\HoldingsResponseBody listHoldingsByMember($member_guid, $user_guid, $page, $records_per_page)

List holdings by member

Use this endpoint to read all holdings associated with a specific member.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$client = new atrium\Api\AtriumClient(
    "YOUR_API_KEY",
    "YOUR_CLIENT_ID",
    new GuzzleHttp\Client()
);

$member_guid = "MBR-123"; // string | The unique identifier for a `member`.
$user_guid = "USR-123"; // string | The unique identifier for a `user`.
$page = 1; // int | Specify current page.
$records_per_page = 12; // int | Specify records per page.

try {
    $result = $client->holdings->listHoldingsByMember($member_guid, $user_guid, $page, $records_per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoldingsApi->listHoldingsByMember: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |
 **page** | **int**| Specify current page. | [optional]
 **records_per_page** | **int**| Specify records per page. | [optional]

### Return type

[**\atrium\model\HoldingsResponseBody**](../Model/HoldingsResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **readHolding**
> \atrium\model\HoldingResponseBody readHolding($holding_guid, $user_guid)

Read holding

Use this endpoint to read the attributes of a specific holding.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$client = new atrium\Api\AtriumClient(
    "YOUR_API_KEY",
    "YOUR_CLIENT_ID",
    new GuzzleHttp\Client()
);

$holding_guid = "HOL-123"; // string | The unique identifier for a `holding`.
$user_guid = "USR-123"; // string | The unique identifier for a `user`.

try {
    $result = $client->holdings->readHolding($holding_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoldingsApi->readHolding: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **holding_guid** | **string**| The unique identifier for a &#x60;holding&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

[**\atrium\model\HoldingResponseBody**](../Model/HoldingResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

