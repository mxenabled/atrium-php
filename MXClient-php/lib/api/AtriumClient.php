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
use atrium\api\IdentityApi;
use atrium\api\InstitutionsApi;
use atrium\api\MembersApi;
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
  public $identity;
  public $institutions;
  public $members;
  public $transactions;
  public $users;
  public $verification;

  public function __construct(Configuration $config, ClientInterface $httpClient = null)
  { 
    $this->accounts = new AccountsApi($httpClient, $config);
    $this->connectWidget = new ConnectWidgetApi($httpClient, $config);
    $this->identity = new IdentityApi($httpClient, $config);
    $this->institutions = new InstitutionsApi($httpClient, $config);
    $this->members = new MembersApi($httpClient, $config);
    $this->transactions = new TransactionsApi($httpClient, $config);
    $this->users = new UsersApi($httpClient, $config);
    $this->verification = new VerificationApi($httpClient, $config);
  }
}
