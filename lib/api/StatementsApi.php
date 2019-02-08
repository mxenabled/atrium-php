<?php
/**
 * StatementsApi
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
 * StatementsApi Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class StatementsApi
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
     * Operation fetchStatements
     *
     * Fetch statements
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MemberResponseBody
     */
    public function fetchStatements($member_guid, $user_guid)
    {
        list($response) = $this->fetchStatementsWithHttpInfo($member_guid, $user_guid);
        return $response;
    }

    /**
     * Operation fetchStatementsWithHttpInfo
     *
     * Fetch statements
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MemberResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function fetchStatementsWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->fetchStatementsRequest($member_guid, $user_guid);

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
                        '\atrium\model\MemberResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation fetchStatementsAsync
     *
     * Fetch statements
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function fetchStatementsAsync($member_guid, $user_guid)
    {
        return $this->fetchStatementsAsyncWithHttpInfo($member_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation fetchStatementsAsyncWithHttpInfo
     *
     * Fetch statements
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function fetchStatementsAsyncWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->fetchStatementsRequest($member_guid, $user_guid);

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
     * Create request for operation 'fetchStatements'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function fetchStatementsRequest($member_guid, $user_guid)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling fetchStatements'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling fetchStatements'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/fetch_statements';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($member_guid !== null) {
            $resourcePath = str_replace(
                '{' . 'member_guid' . '}',
                ObjectSerializer::toPathValue($member_guid),
                $resourcePath
            );
        }
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
     * Operation listMemberStatements
     *
     * List member statements
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\StatementsResponseBody
     */
    public function listMemberStatements($member_guid, $user_guid, $page = null, $records_per_page = null)
    {
        list($response) = $this->listMemberStatementsWithHttpInfo($member_guid, $user_guid, $page, $records_per_page);
        return $response;
    }

    /**
     * Operation listMemberStatementsWithHttpInfo
     *
     * List member statements
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\StatementsResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function listMemberStatementsWithHttpInfo($member_guid, $user_guid, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\StatementsResponseBody';
        $request = $this->listMemberStatementsRequest($member_guid, $user_guid, $page, $records_per_page);

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
                        '\atrium\model\StatementsResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listMemberStatementsAsync
     *
     * List member statements
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMemberStatementsAsync($member_guid, $user_guid, $page = null, $records_per_page = null)
    {
        return $this->listMemberStatementsAsyncWithHttpInfo($member_guid, $user_guid, $page, $records_per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listMemberStatementsAsyncWithHttpInfo
     *
     * List member statements
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMemberStatementsAsyncWithHttpInfo($member_guid, $user_guid, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\StatementsResponseBody';
        $request = $this->listMemberStatementsRequest($member_guid, $user_guid, $page, $records_per_page);

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
     * Create request for operation 'listMemberStatements'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listMemberStatementsRequest($member_guid, $user_guid, $page = null, $records_per_page = null)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling listMemberStatements'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling listMemberStatements'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/statements';
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
        if ($member_guid !== null) {
            $resourcePath = str_replace(
                '{' . 'member_guid' . '}',
                ObjectSerializer::toPathValue($member_guid),
                $resourcePath
            );
        }
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
