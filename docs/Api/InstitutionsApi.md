# atrium\InstitutionsApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**listInstitutions**](InstitutionsApi.md#listInstitutions) | **GET** /institutions | List institutions
[**readInstitution**](InstitutionsApi.md#readInstitution) | **GET** /institutions/{institution_code} | Read institution
[**readInstitutionCredentials**](InstitutionsApi.md#readInstitutionCredentials) | **GET** /institutions/{institution_code}/credentials | Read institution credentials


# **listInstitutions**
> \atrium\model\InstitutionsResponseBody listInstitutions($name, $page, $records_per_page, $supports_account_identification, $supports_account_statement, $supports_account_verification, $supports_transaction_history)

List institutions

This endpoint allows you to see what institutions are available for connection. Information returned will include the institution_code assigned to a particular institution, URLs for the financial institution's logo, and the URL for its website.<br> This endpoint takes an optional query string, name={string}. This will list only institutions in which the appended string appears.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$client = new atrium\Api\AtriumClient(
    "YOUR_API_KEY",
    "YOUR_CLIENT_ID",
    new GuzzleHttp\Client()
);

$name = name_example; // string | This will list only institutions in which the appended string appears.
$page = 1; // int | Specify current page.
$records_per_page = 12; // int | Specify records per page.
$supports_account_identification = true; // bool | Filter only institutions which support account identification.
$supports_account_statement = true; // bool | Filter only institutions which support account statements.
$supports_account_verification = true; // bool | Filter only institutions which support account verification.
$supports_transaction_history = true; // bool | Filter only institutions which support extended transaction history.

try {
    $result = $client->institutions->listInstitutions($name, $page, $records_per_page, $supports_account_identification, $supports_account_statement, $supports_account_verification, $supports_transaction_history);
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
 **supports_account_identification** | **bool**| Filter only institutions which support account identification. | [optional]
 **supports_account_statement** | **bool**| Filter only institutions which support account statements. | [optional]
 **supports_account_verification** | **bool**| Filter only institutions which support account verification. | [optional]
 **supports_transaction_history** | **bool**| Filter only institutions which support extended transaction history. | [optional]

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

$client = new atrium\Api\AtriumClient(
    "YOUR_API_KEY",
    "YOUR_CLIENT_ID",
    new GuzzleHttp\Client()
);

$institution_code = "example_institution_code"; // string | The institution_code of the institution.

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

$client = new atrium\Api\AtriumClient(
    "YOUR_API_KEY",
    "YOUR_CLIENT_ID",
    new GuzzleHttp\Client()
);

$institution_code = "example_institution_code"; // string | The institution_code of the institution.

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

