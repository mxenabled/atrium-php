<?php
/**
 * MerchantsApi
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
 * MerchantsApi Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class MerchantsApi
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
     * Operation listMerchantLocations
     *
     * List merchant locations
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MerchantLocationsResponseBody
     */
    public function listMerchantLocations($merchant_guid, $page = null, $records_per_page = null)
    {
        list($response) = $this->listMerchantLocationsWithHttpInfo($merchant_guid, $page, $records_per_page);
        return $response;
    }

    /**
     * Operation listMerchantLocationsWithHttpInfo
     *
     * List merchant locations
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MerchantLocationsResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function listMerchantLocationsWithHttpInfo($merchant_guid, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\MerchantLocationsResponseBody';
        $request = $this->listMerchantLocationsRequest($merchant_guid, $page, $records_per_page);

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
                        '\atrium\model\MerchantLocationsResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listMerchantLocationsAsync
     *
     * List merchant locations
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMerchantLocationsAsync($merchant_guid, $page = null, $records_per_page = null)
    {
        return $this->listMerchantLocationsAsyncWithHttpInfo($merchant_guid, $page, $records_per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listMerchantLocationsAsyncWithHttpInfo
     *
     * List merchant locations
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMerchantLocationsAsyncWithHttpInfo($merchant_guid, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\MerchantLocationsResponseBody';
        $request = $this->listMerchantLocationsRequest($merchant_guid, $page, $records_per_page);

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
     * Create request for operation 'listMerchantLocations'
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listMerchantLocationsRequest($merchant_guid, $page = null, $records_per_page = null)
    {
        // verify the required parameter 'merchant_guid' is set
        if ($merchant_guid === null || (is_array($merchant_guid) && count($merchant_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $merchant_guid when calling listMerchantLocations'
            );
        }

        $resourcePath = '/merchants/{merchant_guid}/merchant_locations';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($records_per_page !== null) {
            $queryParams['records_per_page'] = ObjectSerializer::toQueryValue($records_per_page);
        }

        // path params
        if ($merchant_guid !== null) {
            $resourcePath = str_replace(
                '{' . 'merchant_guid' . '}',
                ObjectSerializer::toPathValue($merchant_guid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/vnd.mx.atrium.v1+json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/vnd.mx.atrium.v1+json'],
                []
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
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listMerchants
     *
     * List merchants
     *
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MerchantsResponseBody
     */
    public function listMerchants($page = null, $records_per_page = null)
    {
        list($response) = $this->listMerchantsWithHttpInfo($page, $records_per_page);
        return $response;
    }

    /**
     * Operation listMerchantsWithHttpInfo
     *
     * List merchants
     *
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MerchantsResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function listMerchantsWithHttpInfo($page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\MerchantsResponseBody';
        $request = $this->listMerchantsRequest($page, $records_per_page);

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
                        '\atrium\model\MerchantsResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listMerchantsAsync
     *
     * List merchants
     *
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMerchantsAsync($page = null, $records_per_page = null)
    {
        return $this->listMerchantsAsyncWithHttpInfo($page, $records_per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listMerchantsAsyncWithHttpInfo
     *
     * List merchants
     *
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMerchantsAsyncWithHttpInfo($page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\MerchantsResponseBody';
        $request = $this->listMerchantsRequest($page, $records_per_page);

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
     * Create request for operation 'listMerchants'
     *
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listMerchantsRequest($page = null, $records_per_page = null)
    {

        $resourcePath = '/merchants';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($records_per_page !== null) {
            $queryParams['records_per_page'] = ObjectSerializer::toQueryValue($records_per_page);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/vnd.mx.atrium.v1+json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/vnd.mx.atrium.v1+json'],
                []
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
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation readMerchant
     *
     * Read merchant
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MerchantResponseBody
     */
    public function readMerchant($merchant_guid)
    {
        list($response) = $this->readMerchantWithHttpInfo($merchant_guid);
        return $response;
    }

    /**
     * Operation readMerchantWithHttpInfo
     *
     * Read merchant
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MerchantResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function readMerchantWithHttpInfo($merchant_guid)
    {
        $returnType = '\atrium\model\MerchantResponseBody';
        $request = $this->readMerchantRequest($merchant_guid);

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
                        '\atrium\model\MerchantResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation readMerchantAsync
     *
     * Read merchant
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readMerchantAsync($merchant_guid)
    {
        return $this->readMerchantAsyncWithHttpInfo($merchant_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation readMerchantAsyncWithHttpInfo
     *
     * Read merchant
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readMerchantAsyncWithHttpInfo($merchant_guid)
    {
        $returnType = '\atrium\model\MerchantResponseBody';
        $request = $this->readMerchantRequest($merchant_guid);

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
     * Create request for operation 'readMerchant'
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function readMerchantRequest($merchant_guid)
    {
        // verify the required parameter 'merchant_guid' is set
        if ($merchant_guid === null || (is_array($merchant_guid) && count($merchant_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $merchant_guid when calling readMerchant'
            );
        }

        $resourcePath = '/merchants/{merchant_guid}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($merchant_guid !== null) {
            $resourcePath = str_replace(
                '{' . 'merchant_guid' . '}',
                ObjectSerializer::toPathValue($merchant_guid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/vnd.mx.atrium.v1+json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/vnd.mx.atrium.v1+json'],
                []
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
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation readMerchantLocation
     *
     * Read merchant location
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     * @param  string $merchant_location_guid The unique identifier for a &#x60;merchant_location&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MerchantLocationResponseBody
     */
    public function readMerchantLocation($merchant_guid, $merchant_location_guid)
    {
        list($response) = $this->readMerchantLocationWithHttpInfo($merchant_guid, $merchant_location_guid);
        return $response;
    }

    /**
     * Operation readMerchantLocationWithHttpInfo
     *
     * Read merchant location
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     * @param  string $merchant_location_guid The unique identifier for a &#x60;merchant_location&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MerchantLocationResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function readMerchantLocationWithHttpInfo($merchant_guid, $merchant_location_guid)
    {
        $returnType = '\atrium\model\MerchantLocationResponseBody';
        $request = $this->readMerchantLocationRequest($merchant_guid, $merchant_location_guid);

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
                        '\atrium\model\MerchantLocationResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation readMerchantLocationAsync
     *
     * Read merchant location
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     * @param  string $merchant_location_guid The unique identifier for a &#x60;merchant_location&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readMerchantLocationAsync($merchant_guid, $merchant_location_guid)
    {
        return $this->readMerchantLocationAsyncWithHttpInfo($merchant_guid, $merchant_location_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation readMerchantLocationAsyncWithHttpInfo
     *
     * Read merchant location
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     * @param  string $merchant_location_guid The unique identifier for a &#x60;merchant_location&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readMerchantLocationAsyncWithHttpInfo($merchant_guid, $merchant_location_guid)
    {
        $returnType = '\atrium\model\MerchantLocationResponseBody';
        $request = $this->readMerchantLocationRequest($merchant_guid, $merchant_location_guid);

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
     * Create request for operation 'readMerchantLocation'
     *
     * @param  string $merchant_guid The unique identifier for a &#x60;merchant&#x60;. (required)
     * @param  string $merchant_location_guid The unique identifier for a &#x60;merchant_location&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function readMerchantLocationRequest($merchant_guid, $merchant_location_guid)
    {
        // verify the required parameter 'merchant_guid' is set
        if ($merchant_guid === null || (is_array($merchant_guid) && count($merchant_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $merchant_guid when calling readMerchantLocation'
            );
        }
        // verify the required parameter 'merchant_location_guid' is set
        if ($merchant_location_guid === null || (is_array($merchant_location_guid) && count($merchant_location_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $merchant_location_guid when calling readMerchantLocation'
            );
        }

        $resourcePath = '/merchants/{merchant_guid}/merchant_locations/{merchant_location_guid}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($merchant_guid !== null) {
            $resourcePath = str_replace(
                '{' . 'merchant_guid' . '}',
                ObjectSerializer::toPathValue($merchant_guid),
                $resourcePath
            );
        }
        // path params
        if ($merchant_location_guid !== null) {
            $resourcePath = str_replace(
                '{' . 'merchant_location_guid' . '}',
                ObjectSerializer::toPathValue($merchant_location_guid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/vnd.mx.atrium.v1+json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/vnd.mx.atrium.v1+json'],
                []
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
            'GET',
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
