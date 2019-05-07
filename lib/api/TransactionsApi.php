<?php
/**
 * TransactionsApi
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
 * TransactionsApi Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class TransactionsApi
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
     * Operation cleanseAndCategorizeTransactions
     *
     * Categorize transactions
     *
     * @param  \atrium\model\TransactionsCleanseAndCategorizeRequestBody $body User object to be created with optional parameters (amount, type) amd required parameters (description, identifier) (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\TransactionsCleanseAndCategorizeResponseBody
     */
    public function cleanseAndCategorizeTransactions($body)
    {
        list($response) = $this->cleanseAndCategorizeTransactionsWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation cleanseAndCategorizeTransactionsWithHttpInfo
     *
     * Categorize transactions
     *
     * @param  \atrium\model\TransactionsCleanseAndCategorizeRequestBody $body User object to be created with optional parameters (amount, type) amd required parameters (description, identifier) (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\TransactionsCleanseAndCategorizeResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function cleanseAndCategorizeTransactionsWithHttpInfo($body)
    {
        $returnType = '\atrium\model\TransactionsCleanseAndCategorizeResponseBody';
        $request = $this->cleanseAndCategorizeTransactionsRequest($body);

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
                        '\atrium\model\TransactionsCleanseAndCategorizeResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation cleanseAndCategorizeTransactionsAsync
     *
     * Categorize transactions
     *
     * @param  \atrium\model\TransactionsCleanseAndCategorizeRequestBody $body User object to be created with optional parameters (amount, type) amd required parameters (description, identifier) (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cleanseAndCategorizeTransactionsAsync($body)
    {
        return $this->cleanseAndCategorizeTransactionsAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation cleanseAndCategorizeTransactionsAsyncWithHttpInfo
     *
     * Categorize transactions
     *
     * @param  \atrium\model\TransactionsCleanseAndCategorizeRequestBody $body User object to be created with optional parameters (amount, type) amd required parameters (description, identifier) (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cleanseAndCategorizeTransactionsAsyncWithHttpInfo($body)
    {
        $returnType = '\atrium\model\TransactionsCleanseAndCategorizeResponseBody';
        $request = $this->cleanseAndCategorizeTransactionsRequest($body);

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
     * Create request for operation 'cleanseAndCategorizeTransactions'
     *
     * @param  \atrium\model\TransactionsCleanseAndCategorizeRequestBody $body User object to be created with optional parameters (amount, type) amd required parameters (description, identifier) (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function cleanseAndCategorizeTransactionsRequest($body)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling cleanseAndCategorizeTransactions'
            );
        }

        $resourcePath = '/transactions/cleanse_and_categorize';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
     * Operation listUserTransactions
     *
     * List transactions for a user
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  string $from_date Filter transactions from this date. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     * @param  string $to_date Filter transactions to this date. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\TransactionsResponseBody
     */
    public function listUserTransactions($user_guid, $page = null, $from_date = null, $records_per_page = null, $to_date = null)
    {
        list($response) = $this->listUserTransactionsWithHttpInfo($user_guid, $page, $from_date, $records_per_page, $to_date);
        return $response;
    }

    /**
     * Operation listUserTransactionsWithHttpInfo
     *
     * List transactions for a user
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  string $from_date Filter transactions from this date. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     * @param  string $to_date Filter transactions to this date. (optional)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\TransactionsResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function listUserTransactionsWithHttpInfo($user_guid, $page = null, $from_date = null, $records_per_page = null, $to_date = null)
    {
        $returnType = '\atrium\model\TransactionsResponseBody';
        $request = $this->listUserTransactionsRequest($user_guid, $page, $from_date, $records_per_page, $to_date);

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
     * Operation listUserTransactionsAsync
     *
     * List transactions for a user
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  string $from_date Filter transactions from this date. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     * @param  string $to_date Filter transactions to this date. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listUserTransactionsAsync($user_guid, $page = null, $from_date = null, $records_per_page = null, $to_date = null)
    {
        return $this->listUserTransactionsAsyncWithHttpInfo($user_guid, $page, $from_date, $records_per_page, $to_date)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listUserTransactionsAsyncWithHttpInfo
     *
     * List transactions for a user
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  string $from_date Filter transactions from this date. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     * @param  string $to_date Filter transactions to this date. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listUserTransactionsAsyncWithHttpInfo($user_guid, $page = null, $from_date = null, $records_per_page = null, $to_date = null)
    {
        $returnType = '\atrium\model\TransactionsResponseBody';
        $request = $this->listUserTransactionsRequest($user_guid, $page, $from_date, $records_per_page, $to_date);

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
     * Create request for operation 'listUserTransactions'
     *
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     * @param  int $page Specify current page. (optional)
     * @param  string $from_date Filter transactions from this date. (optional)
     * @param  int $records_per_page Specify records per page. (optional)
     * @param  string $to_date Filter transactions to this date. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listUserTransactionsRequest($user_guid, $page = null, $from_date = null, $records_per_page = null, $to_date = null)
    {
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling listUserTransactions'
            );
        }

        $resourcePath = '/users/{user_guid}/transactions';
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
        if ($from_date !== null) {
            $queryParams['from_date'] = ObjectSerializer::toQueryValue($from_date);
        }
        // query params
        if ($records_per_page !== null) {
            $queryParams['records_per_page'] = ObjectSerializer::toQueryValue($records_per_page);
        }
        // query params
        if ($to_date !== null) {
            $queryParams['to_date'] = ObjectSerializer::toQueryValue($to_date);
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
     * Operation readTransaction
     *
     * Read a transaction
     *
     * @param  string $transaction_guid The unique identifier for a &#x60;transaction&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \atrium\model\TransactionResponseBody
     */
    public function readTransaction($transaction_guid, $user_guid)
    {
        list($response) = $this->readTransactionWithHttpInfo($transaction_guid, $user_guid);
        return $response;
    }

    /**
     * Operation readTransactionWithHttpInfo
     *
     * Read a transaction
     *
     * @param  string $transaction_guid The unique identifier for a &#x60;transaction&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \atrium\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \atrium\model\TransactionResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function readTransactionWithHttpInfo($transaction_guid, $user_guid)
    {
        $returnType = '\atrium\model\TransactionResponseBody';
        $request = $this->readTransactionRequest($transaction_guid, $user_guid);

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
                        '\atrium\model\TransactionResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation readTransactionAsync
     *
     * Read a transaction
     *
     * @param  string $transaction_guid The unique identifier for a &#x60;transaction&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readTransactionAsync($transaction_guid, $user_guid)
    {
        return $this->readTransactionAsyncWithHttpInfo($transaction_guid, $user_guid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation readTransactionAsyncWithHttpInfo
     *
     * Read a transaction
     *
     * @param  string $transaction_guid The unique identifier for a &#x60;transaction&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readTransactionAsyncWithHttpInfo($transaction_guid, $user_guid)
    {
        $returnType = '\atrium\model\TransactionResponseBody';
        $request = $this->readTransactionRequest($transaction_guid, $user_guid);

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
     * Create request for operation 'readTransaction'
     *
     * @param  string $transaction_guid The unique identifier for a &#x60;transaction&#x60;. (required)
     * @param  string $user_guid The unique identifier for a &#x60;user&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function readTransactionRequest($transaction_guid, $user_guid)
    {
        // verify the required parameter 'transaction_guid' is set
        if ($transaction_guid === null || (is_array($transaction_guid) && count($transaction_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $transaction_guid when calling readTransaction'
            );
        }
        // verify the required parameter 'user_guid' is set
        if ($user_guid === null || (is_array($user_guid) && count($user_guid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_guid when calling readTransaction'
            );
        }

        $resourcePath = '/users/{user_guid}/transactions/{transaction_guid}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($transaction_guid !== null) {
            $resourcePath = str_replace(
                '{' . 'transaction_guid' . '}',
                ObjectSerializer::toPathValue($transaction_guid),
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
