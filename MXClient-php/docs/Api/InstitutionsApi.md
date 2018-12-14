# atrium\InstitutionsApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**listInstitutions**](InstitutionsApi.md#listInstitutions) | **GET** /institutions | List institutions
[**readInstitution**](InstitutionsApi.md#readInstitution) | **GET** /institutions/{institution_code} | Read institution
[**readInstitutionCredentials**](InstitutionsApi.md#readInstitutionCredentials) | **GET** /institutions/{institution_code}/credentials | Read institution credentials


# **listInstitutions**
> \atrium\model\InstitutionsResponseBody listInstitutions($name, $page, $records_per_page)

List institutions

This endpoint allows you to see what institutions are available for connection. Information returned will include the institution_code assigned to a particular institution, URLs for the financial institution's logo, and the URL for its website.<br> This endpoint takes an optional query string, name={string}. This will list only institutions in which the appended string appears.

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
$name = "name_example"; // string | This will list only institutions in which the appended string appears.
$page = 12; // int | Specify current page.
$records_per_page = 12; // int | Specify records per page.

try {
    $result = $client->institutions->listInstitutions($name, $page, $records_per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstitutionsApi->listInstitutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| This will list only institutions in which the appended string appears. | [optional]
 **page** | **int**| Specify current page. | [optional]
 **records_per_page** | **int**| Specify records per page. | [optional]

### Return type

[**\atrium\model\InstitutionsResponseBody**](../Model/InstitutionsResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **readInstitution**
> \atrium\model\InstitutionResponseBody readInstitution($institution_code)

Read institution

This endpoint allows you to see information for a specific institution.

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
$institution_code = "institution_code_example"; // string | The institution_code of the institution.

try {
    $result = $client->institutions->readInstitution($institution_code);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstitutionsApi->readInstitution: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **institution_code** | **string**| The institution_code of the institution. |

### Return type

[**\atrium\model\InstitutionResponseBody**](../Model/InstitutionResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **readInstitutionCredentials**
> \atrium\model\CredentialsResponseBody readInstitutionCredentials($institution_code)

Read institution credentials

Use this endpoint to see which credentials will be needed to create a member for a specific institution.

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
$institution_code = "institution_code_example"; // string | The institution_code of the institution.

try {
    $result = $client->institutions->readInstitutionCredentials($institution_code);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstitutionsApi->readInstitutionCredentials: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **institution_code** | **string**| The institution_code of the institution. |

### Return type

[**\atrium\model\CredentialsResponseBody**](../Model/CredentialsResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

