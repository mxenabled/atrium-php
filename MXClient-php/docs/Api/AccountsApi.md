# atrium-php\AccountsApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**listAccountTransactions**](AccountsApi.md#listAccountTransactions) | **GET** /users/{user_guid}/accounts/{account_guid}/transactions | List account transactions
[**listUserAccounts**](AccountsApi.md#listUserAccounts) | **GET** /users/{user_guid}/accounts | List accounts for a user
[**readAccount**](AccountsApi.md#readAccount) | **GET** /users/{user_guid}/accounts/{account_guid} | Read an account
[**readAccountByMemberGUID**](AccountsApi.md#readAccountByMemberGUID) | **GET** /users/{user_guid}/members/{member_guid}/accounts/{account_guid} | Read an account


# **listAccountTransactions**
> \atrium-php\atrium-php\Transactions listAccountTransactions($account_guid, $user_guid, $from_date, $to_date, $page, $records_per_page)

List account transactions

This endpoint allows you to see every transaction that belongs to a specific account. The default from_date is 90 days prior to the request, and the default to_date is 5 days from the time of the request.<br> The from_date and to_date parameters can optionally be appended to the request.

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

$apiInstance = new atrium-php\Api\AccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_guid = "account_guid_example"; // string | The unique identifier for an `account`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.
$from_date = "from_date_example"; // string | Filter transactions from this date.
$to_date = "to_date_example"; // string | Filter transactions to this date.
$page = 12; // int | Specify current page.
$records_per_page = 12; // int | Specify records per page.

try {
    $result = $apiInstance->listAccountTransactions($account_guid, $user_guid, $from_date, $to_date, $page, $records_per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountsApi->listAccountTransactions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_guid** | **string**| The unique identifier for an &#x60;account&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |
 **from_date** | **string**| Filter transactions from this date. | [optional]
 **to_date** | **string**| Filter transactions to this date. | [optional]
 **page** | **int**| Specify current page. | [optional]
 **records_per_page** | **int**| Specify records per page. | [optional]

### Return type

[**\atrium-php\atrium-php\Transactions**](../Model/Transactions.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listUserAccounts**
> \atrium-php\atrium-php\Accounts listUserAccounts($user_guid, $page, $records_per_page)

List accounts for a user

Use this endpoint to view information about every account that belongs to a user. You'll need the user's GUID to access this list. The information will include the account type — e.g., CHECKING, MONEY_MARKET, or PROPERTY — the account balance, the date the account was started, etc.

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

$apiInstance = new atrium-php\Api\AccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.
$page = 12; // int | Specify current page.
$records_per_page = 12; // int | Specify records per page.

try {
    $result = $apiInstance->listUserAccounts($user_guid, $page, $records_per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountsApi->listUserAccounts: ', $e->getMessage(), PHP_EOL;
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

[**\atrium-php\atrium-php\Accounts**](../Model/Accounts.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **readAccount**
> \atrium-php\atrium-php\Account readAccount($account_guid, $user_guid)

Read an account

Reading an account allows you to get information about a specific account that belongs to a user. That includes the account type — e.g., CHECKING, MONEY_MARKET, or PROPERTY — the balance, the date the account was started, and much more.<br> There are two endpoints for reading an account. Both will return the same information.<br> It's important to remember that balance and available_balance will normally be positive numbers — for all account types. But this should be interpreted differently for debt accounts and asset accounts.<br> An asset account, e.g., CHECKING, SAVINGS, or INVESTMENT, will have a positive balance unless it is in an overdraft condition, in which case the balance will be negative.<br> On the other hand, a debt account, e.g., CREDIT CARD, LOAN, MORTGAGE, would have a positivebalance when the user owes money on the account. It would have a negative balance if the account has been overpaid.

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

$apiInstance = new atrium-php\Api\AccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_guid = "account_guid_example"; // string | The unique identifier for an `account`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $apiInstance->readAccount($account_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountsApi->readAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_guid** | **string**| The unique identifier for an &#x60;account&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

[**\atrium-php\atrium-php\Account**](../Model/Account.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **readAccountByMemberGUID**
> \atrium-php\atrium-php\Account readAccountByMemberGUID($account_guid, $member_guid, $user_guid)

Read an account

Reading an account allows you to get information about a specific account that belongs to a user. That includes the account type — e.g., CHECKING, MONEY_MARKET, or PROPERTY — the balance, the date the account was started, and much more.<br> There are two endpoints for reading an account. Both will return the same information.<br> It's important to remember that balance and available_balance will normally be positive numbers — for all account types. But this should be interpreted differently for debt accounts and asset accounts.<br> An asset account, e.g., CHECKING, SAVINGS, or INVESTMENT, will have a positive balance unless it is in an overdraft condition, in which case the balance will be negative.<br> On the other hand, a debt account, e.g., CREDIT CARD, LOAN, MORTGAGE, would have a positivebalance when the user owes money on the account. It would have a negative balance if the account has been overpaid.

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

$apiInstance = new atrium-php\Api\AccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_guid = "account_guid_example"; // string | The unique identifier for an `account`.
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $apiInstance->readAccountByMemberGUID($account_guid, $member_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountsApi->readAccountByMemberGUID: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_guid** | **string**| The unique identifier for an &#x60;account&#x60;. |
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

[**\atrium-php\atrium-php\Account**](../Model/Account.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

