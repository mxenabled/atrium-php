# atrium\ConnectWidgetApi

Method | HTTP request | Description
------------- | ------------- | -------------
[**getConnectWidget**](ConnectWidgetApi.md#getConnectWidget) | **POST** /users/{user_guid}/connect_widget_url | Embedding in a website


# **getConnectWidget**
> \atrium\model\ConnectWidgetResponseBody getConnectWidget($user_guid, $body)

Embedding in a website

This endpoint will return a URL for an embeddable version of MX Connect.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$client = new atrium\Api\AtriumClient(
    "YOUR_API_KEY",
    "YOUR_CLIENT_ID",
    new GuzzleHttp\Client()
);
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.
$body = new \atrium\model\ConnectWidgetRequestBody(); // \atrium\model\ConnectWidgetRequestBody | Optional config options for WebView (is_mobile_webview, current_institution_code, current_member_guid, update_credentials)

try {
    $result = $client->connectWidget->getConnectWidget($user_guid, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConnectWidgetApi->getConnectWidget: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_guid** | **string**| The unique identifier for a &#x60;user&#x60;. |
 **body** | [**\atrium\model\ConnectWidgetRequestBody**](../Model/ConnectWidgetRequestBody.md)| Optional config options for WebView (is_mobile_webview, current_institution_code, current_member_guid, update_credentials) |

### Return type

[**\atrium\model\ConnectWidgetResponseBody**](../Model/ConnectWidgetResponseBody.md)

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

