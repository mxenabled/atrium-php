<?php
/**
 * AtriumClient
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
use atrium\api\AccountsApi;
use atrium\api\ConnectWidgetApi;
use atrium\api\HoldingsApi;
use atrium\api\IdentityApi;
use atrium\api\InstitutionsApi;
use atrium\api\MembersApi;
use atrium\api\MerchantsApi;
use atrium\api\StatementsApi;
use atrium\api\TransactionsApi;
use atrium\api\UsersApi;
use atrium\api\VerificationApi;

/**
 * AtriumClient Class Doc Comment
 *
 * @category Class
 * @package  atrium
 */
class AtriumClient
{
  
  public $accounts;
  public $connectWidget;
  public $holdings;
  public $identity;
  public $institutions;
  public $members;
  public $merchants;
  public $statements;
  public $transactions;
  public $users;
  public $verification;

  public function __construct($apiKey, $clientID, ClientInterface $httpClient = null)
  {
    $config = Configuration::getDefaultConfiguration()->setHeader('MX-API-Key', $apiKey);
    $config = Configuration::getDefaultConfiguration()->setHeader('MX-Client-ID', $clientID);
    
    $this->accounts = new AccountsApi($httpClient, $config);
    $this->connectWidget = new ConnectWidgetApi($httpClient, $config);
    $this->holdings = new HoldingsApi($httpClient, $config);
    $this->identity = new IdentityApi($httpClient, $config);
    $this->institutions = new InstitutionsApi($httpClient, $config);
    $this->members = new MembersApi($httpClient, $config);
    $this->merchants = new MerchantsApi($httpClient, $config);
    $this->statements = new StatementsApi($httpClient, $config);
    $this->transactions = new TransactionsApi($httpClient, $config);
    $this->users = new UsersApi($httpClient, $config);
    $this->verification = new VerificationApi($httpClient, $config);
  }
}
