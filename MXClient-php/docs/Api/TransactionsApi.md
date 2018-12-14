# atrium\TransactionsApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**cleanseAndCategorizeTransactions**](TransactionsApi.md#cleanseAndCategorizeTransactions) | **POST** /cleanse_and_categorize | Categorize transactions
[**listUserTransactions**](TransactionsApi.md#listUserTransactions) | **GET** /users/{user_guid}/transactions | List transactions for a user
[**readTransaction**](TransactionsApi.md#readTransaction) | **GET** /users/{user_guid}/transactions/{transaction_guid} | Read a transaction


# **cleanseAndCategorizeTransactions**
> \atrium\model\TransactionsCleanseAndCategorize cleanseAndCategorizeTransactions($body)

Categorize transactions

Use this endpoint to categorize, cleanse, and classify transactions. These transactions are not persisted or stored on the MX platform.

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
$body = new \atrium\model\TransactionsCleanseAndCategorizeRequestBody(); // \atrium\model\TransactionsCleanseAndCategorizeRequestBody | User object to be created with optional parameters (amount, type) amd required parameters (description, identifier)

try {
    $result = $client->transactions->cleanseAndCategorizeTransactions($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionsApi->cleanseAndCategorizeTransactions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\atrium\model\TransactionsCleanseAndCategorizeRequestBody**](../Model/TransactionsCleanseAndCategorizeRequestBody.md)| User object to be created with optional parameters (amount, type) amd required parameters (description, identifier) |

### Return type

[**\atrium\model\TransactionsCleanseAndCategorize**](../Model/TransactionsCleanseAndCategorize.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listUserTransactions**
> \atrium\model\Transactions listUserTransactions($user_guid, $page, $from_date, $records_per_page, $to_date)

List transactions for a user

Use this endpoint to get all transactions that belong to a specific user, across all the user's members and accounts.<br> This endpoint accepts optional query parameters, from_date and to_date, which filter transactions according to the date they were posted. If no values are given, from_date will default to 90 days prior to the request, and to_date will default to 5 days from the time of the request.

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
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.
$page = 12; // int | Specify current page.
$from_date = "from_date_example"; // string | Filter transactions from this date.
$records_per_page = 12; // int | Specify records per page.
$to_date = "to_date_example"; // string | Filter transactions to this date.

try {
    $result = $client->transactions->listUserTransactions($user_guid, $page, $from_date, $records_per_page, $to_date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionsApi->listUserTransactions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |
 **page** | **int**| Specify current page. | [optional]
 **from_date** | **string**| Filter transactions from this date. | [optional]
 **records_per_page** | **int**| Specify records per page. | [optional]
 **to_date** | **string**| Filter transactions to this date. | [optional]

### Return type

[**\atrium\model\Transactions**](../Model/Transactions.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **readTransaction**
> \atrium\model\Transaction readTransaction($transaction_guid, $user_guid)

Read a transaction

This endpoint allows you to view information about a specific transaction that belongs to a user.<br>

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
$transaction_guid = "transaction_guid_example"; // string | The unique identifier for a `transaction`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $client->transactions->readTransaction($transaction_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionsApi->readTransaction: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **transaction_guid** | **string**| The unique identifier for a &#x60;transaction&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

[**\atrium\model\Transaction**](../Model/Transaction.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

