# atrium\StatementsApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**downloadStatementPdf**](StatementsApi.md#downloadStatementPdf) | **GET** /users/{user_guid}/members/{member_guid}/statements/{statement_guid}.pdf | Download statement PDF
[**fetchStatements**](StatementsApi.md#fetchStatements) | **POST** /users/{user_guid}/members/{member_guid}/fetch_statements | Fetch statements
[**listMemberStatements**](StatementsApi.md#listMemberStatements) | **GET** /users/{user_guid}/members/{member_guid}/statements | List member statements
[**readMemberStatement**](StatementsApi.md#readMemberStatement) | **GET** /users/{user_guid}/members/{member_guid}/statements/{statement_guid} | Read statement JSON


# **downloadStatementPdf**
> \SplFileObject downloadStatementPdf($member_guid, $user_guid, $statement_guid)

Download statement PDF

Use this endpoint to download a specified statement. The endpoint URL is the same as the URI given in each `statement` object.

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
$statement_guid = "STA-123"; // string | The unique identifier for an `statement`.

try {
    $result = $client->statements->downloadStatementPdf($member_guid, $user_guid, $statement_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatementsApi->downloadStatementPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |
 **statement_guid** | **string**| The unique identifier for an &#x60;statement&#x60;. |

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchStatements**
> \atrium\model\MemberResponseBody fetchStatements($member_guid, $user_guid)

Fetch statements

The fetch statements endpoint begins fetching statements for a member.

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

try {
    $result = $client->statements->fetchStatements($member_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatementsApi->fetchStatements: ', $e->getMessage(), PHP_EOL;
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

# **listMemberStatements**
> \atrium\model\StatementsResponseBody listMemberStatements($member_guid, $user_guid, $page, $records_per_page)

List member statements

Certain institutions in Atrium allow developers to access account statements associated with a particular `member`. Use this endpoint to get an array of available statements.  Before this endpoint can be used, `fetch_statements` should be performed on the relevant `member`.

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
    $result = $client->statements->listMemberStatements($member_guid, $user_guid, $page, $records_per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatementsApi->listMemberStatements: ', $e->getMessage(), PHP_EOL;
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

[**\atrium\model\StatementsResponseBody**](../Model/StatementsResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **readMemberStatement**
> \atrium\model\StatementResponseBody readMemberStatement($member_guid, $user_guid, $statement_guid)

Read statement JSON

Use this endpoint to download a specified statement. The endpoint URL is the same as the URI given in each `statement` object.

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
$statement_guid = "STA-123"; // string | The unique identifier for an `statement`.

try {
    $result = $client->statements->readMemberStatement($member_guid, $user_guid, $statement_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatementsApi->readMemberStatement: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |
 **statement_guid** | **string**| The unique identifier for an &#x60;statement&#x60;. |

### Return type

[**\atrium\model\StatementResponseBody**](../Model/StatementResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

