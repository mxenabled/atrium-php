<?php
/**
 * ConnectWidgetApi
 * PHP version 5
 *
 * @category Class
 * @package  atrium
 */

/**
 * MX API
 *
 * The MX Atrium API supports over 48,000 data connections to thousands of financial institutions. It provides secure access to your users' accounts and transactions with industry-leading cleansing, categorization, and classification.  Atrium is designed according to resource-oriented REST architecture and responds with JSON bodies and HTTP response codes.  Use Atrium's development environment, vestibule.mx.com, to quickly get up and running. The development environment limits are 100 users, 25 members per user, and access to the top 15 institutions. Contact MX to purchase production access.
 *
 */


namespace atrium\api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use atrium\ApiException;
use atrium\Configuration;
use atrium\HeaderSelector;
use atrium\ObjectSerializer;

/**
 * ConnectWidgetApi Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class ConnectWidgetApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getConnectWidget
     *
     * Embedding in a website
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\ConnectWidgetRequestBody $body Optional config options for WebView (is_mobile_webview, current_institution_code, current_member_guid, update_credentials) (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\ConnectWidget
     */
    public function getConnectWidget($user_guid, $body)
    {
        list($response) = $this->getConnectWidgetWithHttpInfo($user_guid, $body);
        return $response;
    }

    /**
     * Operation getConnectWidgetWithHttpInfo
     *
     * Embedding in a website
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\ConnectWidgetRequestBody $body Optional config options for WebView (is_mobile_webview, current_institution_code, current_member_guid, update_credentials) (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\ConnectWidget, HTTP status code, HTTP response headers (array of strings)
     */
    public function getConnectWidgetWithHttpInfo($user_guid, $body)
    {
        $returnType = '\atrium\model\ConnectWidget';
        $request = $this->getConnectWidgetRequest($user_guid, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\atrium\model\ConnectWidget',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getConnectWidgetAsync
     *
     * Embedding in a website
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\ConnectWidgetRequestBody $body Optional config options for WebView (is_mobile_webview, current_institution_code, current_member_guid, update_credentials) (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getConnectWidgetAsync($user_guid, $body)
    {
        return $this->getConnectWidgetAsyncWithHttpInfo($user_guid, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getConnectWidgetAsyncWithHttpInfo
     *
     * Embedding in a website
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\ConnectWidgetRequestBody $body Optional config options for WebView (is_mobile_webview, current_institution_code, current_member_guid, update_credentials) (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getConnectWidgetAsyncWithHttpInfo($user_guid, $body)
    {
        $returnType = '\atrium\model\ConnectWidget';
        $request = $this->getConnectWidgetRequest($user_guid, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getConnectWidget'
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\ConnectWidgetRequestBody $body Optional config options for WebView (is_mobile_webview, current_institution_code, current_member_guid, update_credentials) (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getConnectWidgetRequest($user_guid, $body)
    {
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling getConnectWidget'
            );
        }
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling getConnectWidget'
            );
        }

        $resourcePath = '/users/{user_guid}/connect_widget_url';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($user_guid !== null) {
            $resourcePath = str_replace(
                '{' . 'user_guid' . '}',
                ObjectSerializer::toPathValue($user_guid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/vnd.mx.atrium.v1+json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/vnd.mx.atrium.v1+json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('MX-API-Key');
        if ($apiKey !== null) {
            $headers['MX-API-Key'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('MX-Client-ID');
        if ($apiKey !== null) {
            $headers['MX-Client-ID'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
