# atrium-php\MembersApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**aggregateMember**](MembersApi.md#aggregateMember) | **POST** /users/{user_guid}/members/{member_guid}/aggregate | Aggregate member
[**createMember**](MembersApi.md#createMember) | **POST** /users/{user_guid}/members | Create member
[**deleteMember**](MembersApi.md#deleteMember) | **DELETE** /users/{user_guid}/members/{member_guid} | Delete member
[**listMemberAccounts**](MembersApi.md#listMemberAccounts) | **GET** /users/{user_guid}/members/{member_guid}/accounts | List member accounts
[**listMemberCredentials**](MembersApi.md#listMemberCredentials) | **GET** /users/{user_guid}/members/{member_guid}/credentials | List member credentials
[**listMemberMFAChallenges**](MembersApi.md#listMemberMFAChallenges) | **GET** /users/{user_guid}/members/{member_guid}/challenges | List member MFA challenges
[**listMemberTransactions**](MembersApi.md#listMemberTransactions) | **GET** /users/{user_guid}/members/{member_guid}/transactions | List member transactions
[**listMembers**](MembersApi.md#listMembers) | **GET** /users/{user_guid}/members | List members
[**readMember**](MembersApi.md#readMember) | **GET** /users/{user_guid}/members/{member_guid} | Read member
[**readMemberStatus**](MembersApi.md#readMemberStatus) | **GET** /users/{user_guid}/members/{member_guid}/status | Read member connection status
[**resumeMember**](MembersApi.md#resumeMember) | **PUT** /users/{user_guid}/members/{member_guid}/resume | Resume aggregation from MFA
[**updateMember**](MembersApi.md#updateMember) | **PUT** /users/{user_guid}/members/{member_guid} | Update member


# **aggregateMember**
> \atrium-php\atrium-php\Member aggregateMember($member_guid, $user_guid)

Aggregate member

Calling this endpoint initiates an aggregation event for the member. This brings in the latest account and transaction data from the connected institution. If this data has recently been updated, MX may not initiate an aggregation event.

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

$apiInstance = new atrium-php\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $apiInstance->aggregateMember($member_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->aggregateMember: ', $e->getMessage(), PHP_EOL;
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

# **createMember**
> \atrium-php\atrium-php\Member createMember($user_guid, $body)

Create member

This endpoint allows you to create a new member. Members are created with the required parameters credentials and institution_code, and the optional parameters identifier and metadata.<br> When creating a member, you'll need to include the correct type of credential required by the financial institution and provided by the user. You can find out which credential type is required with the /institutions/{institution_code}/credentials endpoint.<br> If successful, Atrium will respond with the newly-created member object.<br> Once you successfully create a member, MX will immediately validate the provided credentials and attempt to aggregate data for accounts and transactions.

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

$apiInstance = new atrium-php\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.
$body = new \atrium-php\atrium-php\MemberCreateRequestBody(); // \atrium-php\atrium-php\MemberCreateRequestBody | Member object to be created with optional parameters (identifier and metadata) and required parameters (credentials and institution_code)

try {
    $result = $apiInstance->createMember($user_guid, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->createMember: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |
 **body** | [**\atrium-php\atrium-php\MemberCreateRequestBody**](../Model/MemberCreateRequestBody.md)| Member object to be created with optional parameters (identifier and metadata) and required parameters (credentials and institution_code) |

### Return type

[**\atrium-php\atrium-php\Member**](../Model/Member.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteMember**
> deleteMember($member_guid, $user_guid)

Delete member

Accessing this endpoint will permanently delete a member.

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

$apiInstance = new atrium-php\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $apiInstance->deleteMember($member_guid, $user_guid);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->deleteMember: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

void (empty response body)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listMemberAccounts**
> \atrium-php\atrium-php\Accounts listMemberAccounts($member_guid, $user_guid, $page, $records_per_page)

List member accounts

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

$apiInstance = new atrium-php\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.
$page = 12; // int | Specify current page.
$records_per_page = 12; // int | Specify records per page.

try {
    $result = $apiInstance->listMemberAccounts($member_guid, $user_guid, $page, $records_per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->listMemberAccounts: ', $e->getMessage(), PHP_EOL;
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

[**\atrium-php\atrium-php\Accounts**](../Model/Accounts.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listMemberCredentials**
> \atrium-php\atrium-php\Credentials listMemberCredentials($member_guid, $user_guid)

List member credentials

This endpoint returns an array which contains information on every non-MFA credential associated with a specific member.

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

$apiInstance = new atrium-php\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $apiInstance->listMemberCredentials($member_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->listMemberCredentials: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

[**\atrium-php\atrium-php\Credentials**](../Model/Credentials.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listMemberMFAChallenges**
> \atrium-php\atrium-php\Challenges listMemberMFAChallenges($member_guid, $user_guid)

List member MFA challenges

Use this endpoint for information on what multi-factor authentication challenges need to be answered in order to aggregate a member.<br> If the aggregation is not challenged, i.e., the member does not have a connection status of CHALLENGED, then code 204 No Content will be returned.<br> If the aggregation has been challenged, i.e., the member does have a connection status of CHALLENGED, then code 200 OK will be returned — along with the corresponding credentials.

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

$apiInstance = new atrium-php\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $apiInstance->listMemberMFAChallenges($member_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->listMemberMFAChallenges: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

[**\atrium-php\atrium-php\Challenges**](../Model/Challenges.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listMemberTransactions**
> \atrium-php\atrium-php\Transactions listMemberTransactions($member_guid, $user_guid, $from_date, $to_date, $page, $records_per_page)

List member transactions

Use this endpoint to get all transactions from all accounts associated with a specific member.<br> This endpoint accepts optional URL query parameters — from_date and to_date — which are used to filter transactions according to the date they were posted. If no values are given for the query parameters, from_date will default to 90 days prior to the request and to_date will default to 5 days from the time of the request.

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

$apiInstance = new atrium-php\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.
$from_date = "from_date_example"; // string | Filter transactions from this date.
$to_date = "to_date_example"; // string | Filter transactions to this date.
$page = 12; // int | Specify current page.
$records_per_page = 12; // int | Specify records per page.

try {
    $result = $apiInstance->listMemberTransactions($member_guid, $user_guid, $from_date, $to_date, $page, $records_per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->listMemberTransactions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |
 **from_date** | **string**| Filter transactions from this date. | [optional]
 **to_date** | **string**| Filter transactions to this date. | [optional]
 **page** | **int**| Specify current page. | [optional]
 **records_per_page** | **int**| Specify records per page. | [optional]

### Return type

[**\atrium-php\atrium-php\Transactions**](../Model/Transactions.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listMembers**
> \atrium-php\atrium-php\Members listMembers($user_guid, $page, $records_per_page)

List members

This endpoint returns an array which contains information on every member associated with a specific user.

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

$apiInstance = new atrium-php\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.
$page = 12; // int | Specify current page.
$records_per_page = 12; // int | Specify records per page.

try {
    $result = $apiInstance->listMembers($user_guid, $page, $records_per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->listMembers: ', $e->getMessage(), PHP_EOL;
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

[**\atrium-php\atrium-php\Members**](../Model/Members.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **readMember**
> \atrium-php\atrium-php\Member readMember($member_guid, $user_guid)

Read member

Use this endpoint to read the attributes of a specific member.

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

$apiInstance = new atrium-php\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $apiInstance->readMember($member_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->readMember: ', $e->getMessage(), PHP_EOL;
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

# **readMemberStatus**
> \atrium-php\atrium-php\MemberConnectionStatus readMemberStatus($member_guid, $user_guid)

Read member connection status

This endpoint provides the status of the member's most recent aggregation event. This is an important step in the aggregation process, and the results returned by this endpoint should determine what you do next in order to successfully aggregate a member.<br> MX has introduced new, more detailed information on the current status of a member's connection to a financial institution and the state of its aggregation: the connection_status field. These are intended to replace and expand upon the information provided in the status field, which will soon be deprecated; support for the status field remains for the time being.

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

$apiInstance = new atrium-php\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $apiInstance->readMemberStatus($member_guid, $user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->readMemberStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

[**\atrium-php\atrium-php\MemberConnectionStatus**](../Model/MemberConnectionStatus.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resumeMember**
> \atrium-php\atrium-php\Member resumeMember($member_guid, $user_guid, $body)

Resume aggregation from MFA

This endpoint answers the challenges needed when a member has been challenged by multi-factor authentication.

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

$apiInstance = new atrium-php\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.
$body = new \atrium-php\atrium-php\MemberResumeRequestBody(); // \atrium-php\atrium-php\MemberResumeRequestBody | Member object with MFA challenge answers

try {
    $result = $apiInstance->resumeMember($member_guid, $user_guid, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->resumeMember: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |
 **body** | [**\atrium-php\atrium-php\MemberResumeRequestBody**](../Model/MemberResumeRequestBody.md)| Member object with MFA challenge answers |

### Return type

[**\atrium-php\atrium-php\Member**](../Model/Member.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateMember**
> \atrium-php\atrium-php\Member updateMember($member_guid, $user_guid, $body)

Update member

Use this endpoint to update a member's attributes. Only the credentials, identifier, and metadata parameters can be updated. To get a list of the required credentials for the member, use the list member credentials endpoint.

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

$apiInstance = new atrium-php\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_guid = "member_guid_example"; // string | The unique identifier for a `member`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.
$body = new \atrium-php\atrium-php\MemberUpdateRequestBody(); // \atrium-php\atrium-php\MemberUpdateRequestBody | Member object to be updated with optional parameters (credentials, identifier, metadata)

try {
    $result = $apiInstance->updateMember($member_guid, $user_guid, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->updateMember: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **member_guid** | **string**| The unique identifier for a &#x60;member&#x60;. |
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |
 **body** | [**\atrium-php\atrium-php\MemberUpdateRequestBody**](../Model/MemberUpdateRequestBody.md)| Member object to be updated with optional parameters (credentials, identifier, metadata) | [optional]

### Return type

[**\atrium-php\atrium-php\Member**](../Model/Member.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)
