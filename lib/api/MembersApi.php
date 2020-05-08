<?php
/**
 * MembersApi
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
 * MembersApi Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class MembersApi
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
     * Operation aggregateMember
     *
     * Aggregate member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MemberResponseBody
     */
    public function aggregateMember($member_guid, $user_guid)
    {
        list($response) = $this->aggregateMemberWithHttpInfo($member_guid, $user_guid);
        return $response;
    }

    /**
     * Operation aggregateMemberWithHttpInfo
     *
     * Aggregate member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MemberResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function aggregateMemberWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->aggregateMemberRequest($member_guid, $user_guid);

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
                case 202:
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
     * Operation aggregateMemberAsync
     *
     * Aggregate member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function aggregateMemberAsync($member_guid, $user_guid)
    {
        return $this->aggregateMemberAsyncWithHttpInfo($member_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation aggregateMemberAsyncWithHttpInfo
     *
     * Aggregate member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function aggregateMemberAsyncWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->aggregateMemberRequest($member_guid, $user_guid);

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
     * Create request for operation 'aggregateMember'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function aggregateMemberRequest($member_guid, $user_guid)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling aggregateMember'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling aggregateMember'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/aggregate';
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
     * Operation aggregateMemberBalances
     *
     * Aggregate member account balances
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MemberResponseBody
     */
    public function aggregateMemberBalances($member_guid, $user_guid)
    {
        list($response) = $this->aggregateMemberBalancesWithHttpInfo($member_guid, $user_guid);
        return $response;
    }

    /**
     * Operation aggregateMemberBalancesWithHttpInfo
     *
     * Aggregate member account balances
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MemberResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function aggregateMemberBalancesWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->aggregateMemberBalancesRequest($member_guid, $user_guid);

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
     * Operation aggregateMemberBalancesAsync
     *
     * Aggregate member account balances
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function aggregateMemberBalancesAsync($member_guid, $user_guid)
    {
        return $this->aggregateMemberBalancesAsyncWithHttpInfo($member_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation aggregateMemberBalancesAsyncWithHttpInfo
     *
     * Aggregate member account balances
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function aggregateMemberBalancesAsyncWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->aggregateMemberBalancesRequest($member_guid, $user_guid);

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
     * Create request for operation 'aggregateMemberBalances'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function aggregateMemberBalancesRequest($member_guid, $user_guid)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling aggregateMemberBalances'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling aggregateMemberBalances'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/balance';
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createMember
     *
     * Create member
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberCreateRequestBody $body Member object to be created with optional parameters (identifier and metadata) and required parameters (credentials and institution_code) (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MemberResponseBody
     */
    public function createMember($user_guid, $body)
    {
        list($response) = $this->createMemberWithHttpInfo($user_guid, $body);
        return $response;
    }

    /**
     * Operation createMemberWithHttpInfo
     *
     * Create member
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberCreateRequestBody $body Member object to be created with optional parameters (identifier and metadata) and required parameters (credentials and institution_code) (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MemberResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function createMemberWithHttpInfo($user_guid, $body)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->createMemberRequest($user_guid, $body);

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
                case 202:
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
     * Operation createMemberAsync
     *
     * Create member
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberCreateRequestBody $body Member object to be created with optional parameters (identifier and metadata) and required parameters (credentials and institution_code) (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createMemberAsync($user_guid, $body)
    {
        return $this->createMemberAsyncWithHttpInfo($user_guid, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createMemberAsyncWithHttpInfo
     *
     * Create member
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberCreateRequestBody $body Member object to be created with optional parameters (identifier and metadata) and required parameters (credentials and institution_code) (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createMemberAsyncWithHttpInfo($user_guid, $body)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->createMemberRequest($user_guid, $body);

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
     * Create request for operation 'createMember'
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberCreateRequestBody $body Member object to be created with optional parameters (identifier and metadata) and required parameters (credentials and institution_code) (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createMemberRequest($user_guid, $body)
    {
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling createMember'
            );
        }
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling createMember'
            );
        }

        $resourcePath = '/users/{user_guid}/members';
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
     * Operation deleteMember
     *
     * Delete member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteMember($member_guid, $user_guid)
    {
        $this->deleteMemberWithHttpInfo($member_guid, $user_guid);
    }

    /**
     * Operation deleteMemberWithHttpInfo
     *
     * Delete member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteMemberWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '';
        $request = $this->deleteMemberRequest($member_guid, $user_guid);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation deleteMemberAsync
     *
     * Delete member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteMemberAsync($member_guid, $user_guid)
    {
        return $this->deleteMemberAsyncWithHttpInfo($member_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteMemberAsyncWithHttpInfo
     *
     * Delete member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteMemberAsyncWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '';
        $request = $this->deleteMemberRequest($member_guid, $user_guid);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'deleteMember'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteMemberRequest($member_guid, $user_guid)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling deleteMember'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling deleteMember'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}';
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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation extendHistory
     *
     * Extend history
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MemberResponseBody
     */
    public function extendHistory($member_guid, $user_guid)
    {
        list($response) = $this->extendHistoryWithHttpInfo($member_guid, $user_guid);
        return $response;
    }

    /**
     * Operation extendHistoryWithHttpInfo
     *
     * Extend history
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MemberResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function extendHistoryWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->extendHistoryRequest($member_guid, $user_guid);

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
     * Operation extendHistoryAsync
     *
     * Extend history
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function extendHistoryAsync($member_guid, $user_guid)
    {
        return $this->extendHistoryAsyncWithHttpInfo($member_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation extendHistoryAsyncWithHttpInfo
     *
     * Extend history
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function extendHistoryAsyncWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->extendHistoryRequest($member_guid, $user_guid);

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
     * Create request for operation 'extendHistory'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function extendHistoryRequest($member_guid, $user_guid)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling extendHistory'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling extendHistory'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/extend_history';
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
     * Operation listMemberAccounts
     *
     * List member accounts
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\AccountsResponseBody
     */
    public function listMemberAccounts($member_guid, $user_guid, $page = null, $records_per_page = null)
    {
        list($response) = $this->listMemberAccountsWithHttpInfo($member_guid, $user_guid, $page, $records_per_page);
        return $response;
    }

    /**
     * Operation listMemberAccountsWithHttpInfo
     *
     * List member accounts
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\AccountsResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function listMemberAccountsWithHttpInfo($member_guid, $user_guid, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\AccountsResponseBody';
        $request = $this->listMemberAccountsRequest($member_guid, $user_guid, $page, $records_per_page);

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
                        '\atrium\model\AccountsResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listMemberAccountsAsync
     *
     * List member accounts
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMemberAccountsAsync($member_guid, $user_guid, $page = null, $records_per_page = null)
    {
        return $this->listMemberAccountsAsyncWithHttpInfo($member_guid, $user_guid, $page, $records_per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listMemberAccountsAsyncWithHttpInfo
     *
     * List member accounts
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMemberAccountsAsyncWithHttpInfo($member_guid, $user_guid, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\AccountsResponseBody';
        $request = $this->listMemberAccountsRequest($member_guid, $user_guid, $page, $records_per_page);

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
     * Create request for operation 'listMemberAccounts'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listMemberAccountsRequest($member_guid, $user_guid, $page = null, $records_per_page = null)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling listMemberAccounts'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling listMemberAccounts'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/accounts';
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
     * Operation listMemberCredentials
     *
     * List member credentials
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\CredentialsResponseBody
     */
    public function listMemberCredentials($member_guid, $user_guid)
    {
        list($response) = $this->listMemberCredentialsWithHttpInfo($member_guid, $user_guid);
        return $response;
    }

    /**
     * Operation listMemberCredentialsWithHttpInfo
     *
     * List member credentials
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\CredentialsResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function listMemberCredentialsWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\CredentialsResponseBody';
        $request = $this->listMemberCredentialsRequest($member_guid, $user_guid);

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
                        '\atrium\model\CredentialsResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listMemberCredentialsAsync
     *
     * List member credentials
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMemberCredentialsAsync($member_guid, $user_guid)
    {
        return $this->listMemberCredentialsAsyncWithHttpInfo($member_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listMemberCredentialsAsyncWithHttpInfo
     *
     * List member credentials
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMemberCredentialsAsyncWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\CredentialsResponseBody';
        $request = $this->listMemberCredentialsRequest($member_guid, $user_guid);

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
     * Create request for operation 'listMemberCredentials'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listMemberCredentialsRequest($member_guid, $user_guid)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling listMemberCredentials'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling listMemberCredentials'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/credentials';
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
     * Operation listMemberMFAChallenges
     *
     * List member MFA challenges
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\ChallengesResponseBody
     */
    public function listMemberMFAChallenges($member_guid, $user_guid)
    {
        list($response) = $this->listMemberMFAChallengesWithHttpInfo($member_guid, $user_guid);
        return $response;
    }

    /**
     * Operation listMemberMFAChallengesWithHttpInfo
     *
     * List member MFA challenges
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\ChallengesResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function listMemberMFAChallengesWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\ChallengesResponseBody';
        $request = $this->listMemberMFAChallengesRequest($member_guid, $user_guid);

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
                        '\atrium\model\ChallengesResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listMemberMFAChallengesAsync
     *
     * List member MFA challenges
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMemberMFAChallengesAsync($member_guid, $user_guid)
    {
        return $this->listMemberMFAChallengesAsyncWithHttpInfo($member_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listMemberMFAChallengesAsyncWithHttpInfo
     *
     * List member MFA challenges
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMemberMFAChallengesAsyncWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\ChallengesResponseBody';
        $request = $this->listMemberMFAChallengesRequest($member_guid, $user_guid);

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
     * Create request for operation 'listMemberMFAChallenges'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listMemberMFAChallengesRequest($member_guid, $user_guid)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling listMemberMFAChallenges'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling listMemberMFAChallenges'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/challenges';
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
     * Operation listMemberTransactions
     *
     * List member transactions
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  string $from_date Filter transactions from this date. (optional)
     * @param  string $to_date Filter transactions to this date. (optional)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\TransactionsResponseBody
     */
    public function listMemberTransactions($member_guid, $user_guid, $from_date = null, $to_date = null, $page = null, $records_per_page = null)
    {
        list($response) = $this->listMemberTransactionsWithHttpInfo($member_guid, $user_guid, $from_date, $to_date, $page, $records_per_page);
        return $response;
    }

    /**
     * Operation listMemberTransactionsWithHttpInfo
     *
     * List member transactions
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  string $from_date Filter transactions from this date. (optional)
     * @param  string $to_date Filter transactions to this date. (optional)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\TransactionsResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function listMemberTransactionsWithHttpInfo($member_guid, $user_guid, $from_date = null, $to_date = null, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\TransactionsResponseBody';
        $request = $this->listMemberTransactionsRequest($member_guid, $user_guid, $from_date, $to_date, $page, $records_per_page);

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
                        '\atrium\model\TransactionsResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listMemberTransactionsAsync
     *
     * List member transactions
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  string $from_date Filter transactions from this date. (optional)
     * @param  string $to_date Filter transactions to this date. (optional)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMemberTransactionsAsync($member_guid, $user_guid, $from_date = null, $to_date = null, $page = null, $records_per_page = null)
    {
        return $this->listMemberTransactionsAsyncWithHttpInfo($member_guid, $user_guid, $from_date, $to_date, $page, $records_per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listMemberTransactionsAsyncWithHttpInfo
     *
     * List member transactions
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  string $from_date Filter transactions from this date. (optional)
     * @param  string $to_date Filter transactions to this date. (optional)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMemberTransactionsAsyncWithHttpInfo($member_guid, $user_guid, $from_date = null, $to_date = null, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\TransactionsResponseBody';
        $request = $this->listMemberTransactionsRequest($member_guid, $user_guid, $from_date, $to_date, $page, $records_per_page);

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
     * Create request for operation 'listMemberTransactions'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  string $from_date Filter transactions from this date. (optional)
     * @param  string $to_date Filter transactions to this date. (optional)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listMemberTransactionsRequest($member_guid, $user_guid, $from_date = null, $to_date = null, $page = null, $records_per_page = null)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling listMemberTransactions'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling listMemberTransactions'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/transactions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($from_date !== null) {
            $queryParams['from_date'] = ObjectSerializer::toQueryValue($from_date);
        }
        // query params
        if ($to_date !== null) {
            $queryParams['to_date'] = ObjectSerializer::toQueryValue($to_date);
        }
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
     * Operation listMembers
     *
     * List members
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MembersResponseBody
     */
    public function listMembers($user_guid, $page = null, $records_per_page = null)
    {
        list($response) = $this->listMembersWithHttpInfo($user_guid, $page, $records_per_page);
        return $response;
    }

    /**
     * Operation listMembersWithHttpInfo
     *
     * List members
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MembersResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function listMembersWithHttpInfo($user_guid, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\MembersResponseBody';
        $request = $this->listMembersRequest($user_guid, $page, $records_per_page);

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
                        '\atrium\model\MembersResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listMembersAsync
     *
     * List members
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMembersAsync($user_guid, $page = null, $records_per_page = null)
    {
        return $this->listMembersAsyncWithHttpInfo($user_guid, $page, $records_per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listMembersAsyncWithHttpInfo
     *
     * List members
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listMembersAsyncWithHttpInfo($user_guid, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\MembersResponseBody';
        $request = $this->listMembersRequest($user_guid, $page, $records_per_page);

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
     * Create request for operation 'listMembers'
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listMembersRequest($user_guid, $page = null, $records_per_page = null)
    {
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling listMembers'
            );
        }

        $resourcePath = '/users/{user_guid}/members';
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
     * Operation readMember
     *
     * Read member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MemberResponseBody
     */
    public function readMember($member_guid, $user_guid)
    {
        list($response) = $this->readMemberWithHttpInfo($member_guid, $user_guid);
        return $response;
    }

    /**
     * Operation readMemberWithHttpInfo
     *
     * Read member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MemberResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function readMemberWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->readMemberRequest($member_guid, $user_guid);

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
     * Operation readMemberAsync
     *
     * Read member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readMemberAsync($member_guid, $user_guid)
    {
        return $this->readMemberAsyncWithHttpInfo($member_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation readMemberAsyncWithHttpInfo
     *
     * Read member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readMemberAsyncWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->readMemberRequest($member_guid, $user_guid);

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
     * Create request for operation 'readMember'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function readMemberRequest($member_guid, $user_guid)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling readMember'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling readMember'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}';
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
     * Operation readMemberStatus
     *
     * Read member connection status
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MemberConnectionStatusResponseBody
     */
    public function readMemberStatus($member_guid, $user_guid)
    {
        list($response) = $this->readMemberStatusWithHttpInfo($member_guid, $user_guid);
        return $response;
    }

    /**
     * Operation readMemberStatusWithHttpInfo
     *
     * Read member connection status
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MemberConnectionStatusResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function readMemberStatusWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\MemberConnectionStatusResponseBody';
        $request = $this->readMemberStatusRequest($member_guid, $user_guid);

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
                        '\atrium\model\MemberConnectionStatusResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation readMemberStatusAsync
     *
     * Read member connection status
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readMemberStatusAsync($member_guid, $user_guid)
    {
        return $this->readMemberStatusAsyncWithHttpInfo($member_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation readMemberStatusAsyncWithHttpInfo
     *
     * Read member connection status
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readMemberStatusAsyncWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\MemberConnectionStatusResponseBody';
        $request = $this->readMemberStatusRequest($member_guid, $user_guid);

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
     * Create request for operation 'readMemberStatus'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function readMemberStatusRequest($member_guid, $user_guid)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling readMemberStatus'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling readMemberStatus'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/status';
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
     * Operation readOAuthWindowURI
     *
     * Read OAuth Window URI
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  string $referral_source Should be either BROWSER or APP depending on the implementation. (optional)
     * @param  string $ui_message_webview_url_scheme A scheme for routing the user back to the application state they were previously in. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MemberResponseBody
     */
    public function readOAuthWindowURI($member_guid, $user_guid, $referral_source = null, $ui_message_webview_url_scheme = null)
    {
        list($response) = $this->readOAuthWindowURIWithHttpInfo($member_guid, $user_guid, $referral_source, $ui_message_webview_url_scheme);
        return $response;
    }

    /**
     * Operation readOAuthWindowURIWithHttpInfo
     *
     * Read OAuth Window URI
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  string $referral_source Should be either BROWSER or APP depending on the implementation. (optional)
     * @param  string $ui_message_webview_url_scheme A scheme for routing the user back to the application state they were previously in. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MemberResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function readOAuthWindowURIWithHttpInfo($member_guid, $user_guid, $referral_source = null, $ui_message_webview_url_scheme = null)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->readOAuthWindowURIRequest($member_guid, $user_guid, $referral_source, $ui_message_webview_url_scheme);

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
     * Operation readOAuthWindowURIAsync
     *
     * Read OAuth Window URI
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  string $referral_source Should be either BROWSER or APP depending on the implementation. (optional)
     * @param  string $ui_message_webview_url_scheme A scheme for routing the user back to the application state they were previously in. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readOAuthWindowURIAsync($member_guid, $user_guid, $referral_source = null, $ui_message_webview_url_scheme = null)
    {
        return $this->readOAuthWindowURIAsyncWithHttpInfo($member_guid, $user_guid, $referral_source, $ui_message_webview_url_scheme)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation readOAuthWindowURIAsyncWithHttpInfo
     *
     * Read OAuth Window URI
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  string $referral_source Should be either BROWSER or APP depending on the implementation. (optional)
     * @param  string $ui_message_webview_url_scheme A scheme for routing the user back to the application state they were previously in. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readOAuthWindowURIAsyncWithHttpInfo($member_guid, $user_guid, $referral_source = null, $ui_message_webview_url_scheme = null)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->readOAuthWindowURIRequest($member_guid, $user_guid, $referral_source, $ui_message_webview_url_scheme);

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
     * Create request for operation 'readOAuthWindowURI'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  string $referral_source Should be either BROWSER or APP depending on the implementation. (optional)
     * @param  string $ui_message_webview_url_scheme A scheme for routing the user back to the application state they were previously in. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function readOAuthWindowURIRequest($member_guid, $user_guid, $referral_source = null, $ui_message_webview_url_scheme = null)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling readOAuthWindowURI'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling readOAuthWindowURI'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/oauth_window_uri';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($referral_source !== null) {
            $queryParams['referral_source'] = ObjectSerializer::toQueryValue($referral_source);
        }
        // query params
        if ($ui_message_webview_url_scheme !== null) {
            $queryParams['ui_message_webview_url_scheme'] = ObjectSerializer::toQueryValue($ui_message_webview_url_scheme);
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
     * Operation resumeMember
     *
     * Resume aggregation from MFA
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberResumeRequestBody $body Member object with MFA challenge answers (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MemberResponseBody
     */
    public function resumeMember($member_guid, $user_guid, $body)
    {
        list($response) = $this->resumeMemberWithHttpInfo($member_guid, $user_guid, $body);
        return $response;
    }

    /**
     * Operation resumeMemberWithHttpInfo
     *
     * Resume aggregation from MFA
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberResumeRequestBody $body Member object with MFA challenge answers (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MemberResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function resumeMemberWithHttpInfo($member_guid, $user_guid, $body)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->resumeMemberRequest($member_guid, $user_guid, $body);

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
                case 202:
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
     * Operation resumeMemberAsync
     *
     * Resume aggregation from MFA
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberResumeRequestBody $body Member object with MFA challenge answers (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function resumeMemberAsync($member_guid, $user_guid, $body)
    {
        return $this->resumeMemberAsyncWithHttpInfo($member_guid, $user_guid, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation resumeMemberAsyncWithHttpInfo
     *
     * Resume aggregation from MFA
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberResumeRequestBody $body Member object with MFA challenge answers (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function resumeMemberAsyncWithHttpInfo($member_guid, $user_guid, $body)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->resumeMemberRequest($member_guid, $user_guid, $body);

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
     * Create request for operation 'resumeMember'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberResumeRequestBody $body Member object with MFA challenge answers (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function resumeMemberRequest($member_guid, $user_guid, $body)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling resumeMember'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling resumeMember'
            );
        }
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling resumeMember'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/resume';
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
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateMember
     *
     * Update member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberUpdateRequestBody $body Member object to be updated with optional parameters (credentials, identifier, metadata) (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\MemberResponseBody
     */
    public function updateMember($member_guid, $user_guid, $body = null)
    {
        list($response) = $this->updateMemberWithHttpInfo($member_guid, $user_guid, $body);
        return $response;
    }

    /**
     * Operation updateMemberWithHttpInfo
     *
     * Update member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberUpdateRequestBody $body Member object to be updated with optional parameters (credentials, identifier, metadata) (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\MemberResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateMemberWithHttpInfo($member_guid, $user_guid, $body = null)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->updateMemberRequest($member_guid, $user_guid, $body);

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
     * Operation updateMemberAsync
     *
     * Update member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberUpdateRequestBody $body Member object to be updated with optional parameters (credentials, identifier, metadata) (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateMemberAsync($member_guid, $user_guid, $body = null)
    {
        return $this->updateMemberAsyncWithHttpInfo($member_guid, $user_guid, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateMemberAsyncWithHttpInfo
     *
     * Update member
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberUpdateRequestBody $body Member object to be updated with optional parameters (credentials, identifier, metadata) (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateMemberAsyncWithHttpInfo($member_guid, $user_guid, $body = null)
    {
        $returnType = '\atrium\model\MemberResponseBody';
        $request = $this->updateMemberRequest($member_guid, $user_guid, $body);

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
     * Create request for operation 'updateMember'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  \atrium\model\MemberUpdateRequestBody $body Member object to be updated with optional parameters (credentials, identifier, metadata) (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateMemberRequest($member_guid, $user_guid, $body = null)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling updateMember'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling updateMember'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}';
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
            'PUT',
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
