# atrium-php\UsersApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**createUser**](UsersApi.md#createUser) | **POST** /users | Create user
[**deleteUser**](UsersApi.md#deleteUser) | **DELETE** /users/{user_guid} | Delete user
[**listUsers**](UsersApi.md#listUsers) | **GET** /users | List users
[**readUser**](UsersApi.md#readUser) | **GET** /users/{user_guid} | Read user
[**updateUser**](UsersApi.md#updateUser) | **PUT** /users/{user_guid} | Update user


# **createUser**
> \atrium-php\atrium-php\User createUser($body)

Create user

Call this endpoint to create a new user. Atrium will respond with the newly-created user object if successful. This endpoint accepts several parameters: identifier, metadata, and is_disabled.<br> Disabling a user means that accounts and transactions associated with it will not be updated in the background by MX. It will also restrict access to that user's data until they are no longer disabled. Users who are disabled for the entirety of an Atrium billing period will not be factored into that month's bill.

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

$apiInstance = new atrium-php\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \atrium-php\atrium-php\UserCreateRequestBody(); // \atrium-php\atrium-php\UserCreateRequestBody | User object to be created with optional parameters (identifier, is_disabled, metadata)

try {
    $result = $apiInstance->createUser($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->createUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\atrium-php\atrium-php\UserCreateRequestBody**](../Model/UserCreateRequestBody.md)| User object to be created with optional parameters (identifier, is_disabled, metadata) |

### Return type

[**\atrium-php\atrium-php\User**](../Model/User.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteUser**
> deleteUser($user_guid)

Delete user

Calling this endpoint will permanently delete a user from Atrium. If successful, the API will respond with Status: 204 No Content.

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

$apiInstance = new atrium-php\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $apiInstance->deleteUser($user_guid);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->deleteUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

void (empty response body)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listUsers**
> \atrium-php\atrium-php\Users listUsers($page, $records_per_page)

List users

Use this endpoint to list every user you've created in Atrium.

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

$apiInstance = new atrium-php\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 12; // int | Specify current page.
$records_per_page = 12; // int | Specify records per page.

try {
    $result = $apiInstance->listUsers($page, $records_per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->listUsers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **page** | **int**| Specify current page. | [optional]
 **records_per_page** | **int**| Specify records per page. | [optional]

### Return type

[**\atrium-php\atrium-php\Users**](../Model/Users.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **readUser**
> \atrium-php\atrium-php\User readUser($user_guid)

Read user

Use this endpoint to read the attributes of a specific user.

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

$apiInstance = new atrium-php\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.

try {
    $result = $apiInstance->readUser($user_guid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->readUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |

### Return type

[**\atrium-php\atrium-php\User**](../Model/User.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateUser**
> \atrium-php\atrium-php\User updateUser($user_guid, $body)

Update user

Use this endpoint to update the attributes of a specific user. Atrium will respond with the updated user object.<br> Disabling a user means that accounts and transactions associated with it will not be updated in the background by MX. It will also restrict access to that user's data until they are no longer disabled. Users who are disabled for the entirety of an Atrium billing period will not be factored into that month's bill.<br> To disable a user, update it and set the is_disabled parameter to true. Set it to false to re-enable the user.

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

$apiInstance = new atrium-php\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.
$body = new \atrium-php\atrium-php\UserUpdateRequestBody(); // \atrium-php\atrium-php\UserUpdateRequestBody | User object to be updated with optional parameters (identifier, is_disabled, metadata)

try {
    $result = $apiInstance->updateUser($user_guid, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->updateUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |
 **body** | [**\atrium-php\atrium-php\UserUpdateRequestBody**](../Model/UserUpdateRequestBody.md)| User object to be updated with optional parameters (identifier, is_disabled, metadata) | [optional]

### Return type

[**\atrium-php\atrium-php\User**](../Model/User.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)
