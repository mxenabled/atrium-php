<?php
/**
 * IdentityApi
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
 * IdentityApi Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class IdentityApi
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
     * Operation identifyMember
     *
     * Identify
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\Member
     */
    public function identifyMember($member_guid, $user_guid)
    {
        list($response) = $this->identifyMemberWithHttpInfo($member_guid, $user_guid);
        return $response;
    }

    /**
     * Operation identifyMemberWithHttpInfo
     *
     * Identify
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\Member, HTTP status code, HTTP response headers (array of strings)
     */
    public function identifyMemberWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\Member';
        $request = $this->identifyMemberRequest($member_guid, $user_guid);

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
                        '\atrium\model\Member',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation identifyMemberAsync
     *
     * Identify
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function identifyMemberAsync($member_guid, $user_guid)
    {
        return $this->identifyMemberAsyncWithHttpInfo($member_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation identifyMemberAsyncWithHttpInfo
     *
     * Identify
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function identifyMemberAsyncWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\Member';
        $request = $this->identifyMemberRequest($member_guid, $user_guid);

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
     * Create request for operation 'identifyMember'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function identifyMemberRequest($member_guid, $user_guid)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling identifyMember'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling identifyMember'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/identify';
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
     * Operation listAccountOwners
     *
     * List member account owners
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\AccountOwners
     */
    public function listAccountOwners($member_guid, $user_guid)
    {
        list($response) = $this->listAccountOwnersWithHttpInfo($member_guid, $user_guid);
        return $response;
    }

    /**
     * Operation listAccountOwnersWithHttpInfo
     *
     * List member account owners
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\AccountOwners, HTTP status code, HTTP response headers (array of strings)
     */
    public function listAccountOwnersWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\AccountOwners';
        $request = $this->listAccountOwnersRequest($member_guid, $user_guid);

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
                        '\atrium\model\AccountOwners',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listAccountOwnersAsync
     *
     * List member account owners
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAccountOwnersAsync($member_guid, $user_guid)
    {
        return $this->listAccountOwnersAsyncWithHttpInfo($member_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listAccountOwnersAsyncWithHttpInfo
     *
     * List member account owners
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAccountOwnersAsyncWithHttpInfo($member_guid, $user_guid)
    {
        $returnType = '\atrium\model\AccountOwners';
        $request = $this->listAccountOwnersRequest($member_guid, $user_guid);

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
     * Create request for operation 'listAccountOwners'
     *
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listAccountOwnersRequest($member_guid, $user_guid)
    {
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling listAccountOwners'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling listAccountOwners'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/account_owners';
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
