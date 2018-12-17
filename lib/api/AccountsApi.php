<?php
/**
 * AccountsApi
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
 * AccountsApi Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class AccountsApi
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
     * Operation listAccountTransactions
     *
     * List account transactions
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
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
    public function listAccountTransactions($account_guid, $user_guid, $from_date = null, $to_date = null, $page = null, $records_per_page = null)
    {
        list($response) = $this->listAccountTransactionsWithHttpInfo($account_guid, $user_guid, $from_date, $to_date, $page, $records_per_page);
        return $response;
    }

    /**
     * Operation listAccountTransactionsWithHttpInfo
     *
     * List account transactions
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
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
    public function listAccountTransactionsWithHttpInfo($account_guid, $user_guid, $from_date = null, $to_date = null, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\TransactionsResponseBody';
        $request = $this->listAccountTransactionsRequest($account_guid, $user_guid, $from_date, $to_date, $page, $records_per_page);

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
     * Operation listAccountTransactionsAsync
     *
     * List account transactions
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  string $from_date Filter transactions from this date. (optional)
     * @param  string $to_date Filter transactions to this date. (optional)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAccountTransactionsAsync($account_guid, $user_guid, $from_date = null, $to_date = null, $page = null, $records_per_page = null)
    {
        return $this->listAccountTransactionsAsyncWithHttpInfo($account_guid, $user_guid, $from_date, $to_date, $page, $records_per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listAccountTransactionsAsyncWithHttpInfo
     *
     * List account transactions
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  string $from_date Filter transactions from this date. (optional)
     * @param  string $to_date Filter transactions to this date. (optional)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAccountTransactionsAsyncWithHttpInfo($account_guid, $user_guid, $from_date = null, $to_date = null, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\TransactionsResponseBody';
        $request = $this->listAccountTransactionsRequest($account_guid, $user_guid, $from_date, $to_date, $page, $records_per_page);

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
     * Create request for operation 'listAccountTransactions'
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  string $from_date Filter transactions from this date. (optional)
     * @param  string $to_date Filter transactions to this date. (optional)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listAccountTransactionsRequest($account_guid, $user_guid, $from_date = null, $to_date = null, $page = null, $records_per_page = null)
    {
        // verify the required parameter 'account_guid' is set
        if ($account_guid === null || (is_array($account_guid) && count($account_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $account_guid when calling listAccountTransactions'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling listAccountTransactions'
            );
        }

        $resourcePath = '/users/{user_guid}/accounts/{account_guid}/transactions';
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
        if ($account_guid !== null) {
            $resourcePath = str_replace(
                '{' . 'account_guid' . '}',
                ObjectSerializer::toPathValue($account_guid),
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
     * Operation listUserAccounts
     *
     * List accounts for a user
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\AccountsResponseBody
     */
    public function listUserAccounts($user_guid, $page = null, $records_per_page = null)
    {
        list($response) = $this->listUserAccountsWithHttpInfo($user_guid, $page, $records_per_page);
        return $response;
    }

    /**
     * Operation listUserAccountsWithHttpInfo
     *
     * List accounts for a user
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\AccountsResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function listUserAccountsWithHttpInfo($user_guid, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\AccountsResponseBody';
        $request = $this->listUserAccountsRequest($user_guid, $page, $records_per_page);

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
     * Operation listUserAccountsAsync
     *
     * List accounts for a user
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listUserAccountsAsync($user_guid, $page = null, $records_per_page = null)
    {
        return $this->listUserAccountsAsyncWithHttpInfo($user_guid, $page, $records_per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listUserAccountsAsyncWithHttpInfo
     *
     * List accounts for a user
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listUserAccountsAsyncWithHttpInfo($user_guid, $page = null, $records_per_page = null)
    {
        $returnType = '\atrium\model\AccountsResponseBody';
        $request = $this->listUserAccountsRequest($user_guid, $page, $records_per_page);

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
     * Create request for operation 'listUserAccounts'
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listUserAccountsRequest($user_guid, $page = null, $records_per_page = null)
    {
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling listUserAccounts'
            );
        }

        $resourcePath = '/users/{user_guid}/accounts';
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
     * Operation readAccount
     *
     * Read an account
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\AccountResponseBody
     */
    public function readAccount($account_guid, $user_guid)
    {
        list($response) = $this->readAccountWithHttpInfo($account_guid, $user_guid);
        return $response;
    }

    /**
     * Operation readAccountWithHttpInfo
     *
     * Read an account
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\AccountResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function readAccountWithHttpInfo($account_guid, $user_guid)
    {
        $returnType = '\atrium\model\AccountResponseBody';
        $request = $this->readAccountRequest($account_guid, $user_guid);

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
                        '\atrium\model\AccountResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation readAccountAsync
     *
     * Read an account
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readAccountAsync($account_guid, $user_guid)
    {
        return $this->readAccountAsyncWithHttpInfo($account_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation readAccountAsyncWithHttpInfo
     *
     * Read an account
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readAccountAsyncWithHttpInfo($account_guid, $user_guid)
    {
        $returnType = '\atrium\model\AccountResponseBody';
        $request = $this->readAccountRequest($account_guid, $user_guid);

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
     * Create request for operation 'readAccount'
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function readAccountRequest($account_guid, $user_guid)
    {
        // verify the required parameter 'account_guid' is set
        if ($account_guid === null || (is_array($account_guid) && count($account_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $account_guid when calling readAccount'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling readAccount'
            );
        }

        $resourcePath = '/users/{user_guid}/accounts/{account_guid}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($account_guid !== null) {
            $resourcePath = str_replace(
                '{' . 'account_guid' . '}',
                ObjectSerializer::toPathValue($account_guid),
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
     * Operation readAccountByMemberGUID
     *
     * Read an account
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\AccountResponseBody
     */
    public function readAccountByMemberGUID($account_guid, $member_guid, $user_guid)
    {
        list($response) = $this->readAccountByMemberGUIDWithHttpInfo($account_guid, $member_guid, $user_guid);
        return $response;
    }

    /**
     * Operation readAccountByMemberGUIDWithHttpInfo
     *
     * Read an account
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\AccountResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function readAccountByMemberGUIDWithHttpInfo($account_guid, $member_guid, $user_guid)
    {
        $returnType = '\atrium\model\AccountResponseBody';
        $request = $this->readAccountByMemberGUIDRequest($account_guid, $member_guid, $user_guid);

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
                        '\atrium\model\AccountResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation readAccountByMemberGUIDAsync
     *
     * Read an account
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readAccountByMemberGUIDAsync($account_guid, $member_guid, $user_guid)
    {
        return $this->readAccountByMemberGUIDAsyncWithHttpInfo($account_guid, $member_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation readAccountByMemberGUIDAsyncWithHttpInfo
     *
     * Read an account
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readAccountByMemberGUIDAsyncWithHttpInfo($account_guid, $member_guid, $user_guid)
    {
        $returnType = '\atrium\model\AccountResponseBody';
        $request = $this->readAccountByMemberGUIDRequest($account_guid, $member_guid, $user_guid);

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
     * Create request for operation 'readAccountByMemberGUID'
     *
     * @param  string $account_guid The unique identifier for an &#x60;account&#x60;. (required)
     * @param  string $member_guid The unique identifier for a &#x60;member&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function readAccountByMemberGUIDRequest($account_guid, $member_guid, $user_guid)
    {
        // verify the required parameter 'account_guid' is set
        if ($account_guid === null || (is_array($account_guid) && count($account_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $account_guid when calling readAccountByMemberGUID'
            );
        }
        // verify the required parameter 'member_guid' is set
        if ($member_guid === null || (is_array($member_guid) && count($member_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $member_guid when calling readAccountByMemberGUID'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling readAccountByMemberGUID'
            );
        }

        $resourcePath = '/users/{user_guid}/members/{member_guid}/accounts/{account_guid}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($account_guid !== null) {
            $resourcePath = str_replace(
                '{' . 'account_guid' . '}',
                ObjectSerializer::toPathValue($account_guid),
                $resourcePath
            );
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
