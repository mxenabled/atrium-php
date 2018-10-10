<?php
include_once('models/User.php');
include_once('models/Institution.php');
include_once('models/Credential.php');
include_once('models/Member.php');
include_once('models/Challenge.php');
include_once('models/Account.php');
include_once('models/AccountNumber.php');
include_once('models/AccountOwner.php');
include_once('models/Transaction.php');
include_once('models/Connect.php');

class AtriumClient {
  private $base_url;
  private $mx_api_key;
  private $mx_client_id;

  function __construct($url, $key, $id) {
    $this->base_url = $url;
    $this->mx_api_key = $key;
    $this->mx_client_id = $id;
  }


  // USER

  function createUser($params) {
    $user = array(
      'user' => $params
    );

    $json = json_encode($user);

    $response = $this->makeRequest('POST', '/users', $json);
    return new User($response['user']);
  }

  function readUser($userGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID");
    return new User($response['user']);
  }

  function updateUser($userGUID, $params) {
    $user = array(
      'user' => $params
    );

    $json = json_encode($user);

    $response = $this->makeRequest('PUT', "/users/$userGUID", $json);
    return new User($response['user']);
  }

  function listUsers() {
    $response = $this->makeRequest('GET', '/users');
    $users = $response['users'];

    $userArray = [];
    foreach ($users as $user) {
      $userArray[] = new User($user);
    }

    return $userArray;
  }

  function deleteUser($userGUID) {
    return $this->makeRequest('DELETE', "/users/$userGUID");
  }


  // INSTITUTION

  function listInstitutions($name = '') {
    $response = $this->makeRequest('GET', "/institutions?name=$name");
    $institutions = $response['institutions'];

    $institutionArray = [];
    foreach ($institutions as $institution) {
      $institutionArray[] = new Institution($institution);
    }

    return $institutionArray;
  }

  function readInstitution($institutionCode) {
    $response = $this->makeRequest('GET', "/institutions/$institutionCode");
    return new Institution($response['institution']);
  }

  function readInstitutionCredentials($institutionCode) {
    $response = $this->makeRequest('GET', "/institutions/$institutionCode/credentials");
    $credentials = $response['credentials'];

    $credentialArray = [];
    foreach ($credentials as $credential) {
      $credentialArray[] = new Credential($credential);
    }

    return $credentialArray;
  }


  // MEMBER

  function createMember($userGUID, $params) {
    $member = array(
      'member' => $params
    );

    $json = json_encode($member);

    $response = $this->makeRequest('POST', "/users/$userGUID/members", $json);

    return new Member($response['member']);
  }

  function readMember($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/members/$memberGUID");
    return new Member($response['member']);
  }

  function updateMember($userGUID, $memberGUID, $params) {
    $member = array(
      'member' => $params
    );

    $json = json_encode($member);

    $response = $this->makeRequest('PUT', "/users/$userGUID/members/$memberGUID", $json);

    return new Member($response['member']);
  }

  function deleteMember($userGUID, $memberGUID) {
    return $this->makeRequest('DELETE', "/users/$userGUID/members/$memberGUID");
  }

  function listMembers($userGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/members");
    $members = $response['members'];

    $memberArray = [];
    foreach ($members as $member) {
      $memberArray[] = new Member($member);
    }

    return $memberArray;
  }

  function aggregateMember($userGUID, $memberGUID) {
    $response = $this->makeRequest('POST', "/users/$userGUID/members/$memberGUID/aggregate");
    return new Member($response['member']);
  }

  function readMemberAggregationStatus($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/members/$memberGUID /status");
    return new Member($response['member']);
  }

  function listMemberMFAChallenges($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/members/$memberGUID/challenges");
    $challenges = $response['challenges'];

    $challengeArray = [];
    foreach ($challenges as $challenge) {
      $challengeArray[] = new Challenge($challenge);
    }

    return $challengeArray;
  }

  function resumeMemberAggregation($userGUID, $memberGUID, $challenges) {
    $member = array(
      'member' => $challenges
    );

    $json = json_encode($member);

    $response = $this->makeRequest('PUT', "/users/$userGUID/members/$memberGUID/resume", $json);

    return new Member($response['member']);
  }

  function listMemberCredentials($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/members/$memberGUID/credentials", $json);
    $credentials = $response['credentials'];

    $credentialArray = [];
    foreach ($credentials as $credential) {
      $credentialArray[] = new Credential($credential);
    }

    return $credentialArray;
  }

  function listMemberAccounts($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/members/$memberGUID/accounts");
    $accounts = $response['accounts'];

    $accountArray = [];
    foreach ($accounts as $account) {
      $accountArray[] = new Account($account);
    }

    return $accountArray;
  }

  function listMemberTransactions($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/members/$memberGUID/transactions");
    $transactions = $response['transactions'];

    $transactionArray = [];
    foreach ($transactions as $transaction) {
      $transactionArray[] = new Transaction($transaction);
    }

    return $transactionArray;
  }

  function verifyMember($userGUID, $memberGUID) {
    $response = $this->makeRequest('POST', "/users/$userGUID/members/$memberGUID/verify");
    return new Member($response['member']);
  }

  function identifyMember($userGUID, $memberGUID) {
    $response = $this->makeRequest('POST', "/users/$userGUID/members/$memberGUID/identify");
    return new Member($response['member']);
  }

  // ACCOUNT

  function readAccount($userGUID, $accountGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/accounts/$accountGUID");
    return new Account($response['account']);
  }

  function listAccounts($userGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/accounts");
    $accounts = $response['accounts'];

    $accountArray = [];
    foreach ($accounts as $account) {
      $accountArray[] = new Account($account);
    }

    return $accountArray;
  }

  function listAccountTransactions($userGUID, $accountGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/accounts/$accountGUID/transactions");
    $transactions = $response['transactions'];

    $transactionArray = [];
    foreach ($transactions as $transaction) {
      $transactionArray[] = new Transaction($transaction);
    }

    return $transactionArray;
  }

  // ACCOUNT NUMBER

  function listAccountAccountNumbers($userGUID, $accountGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/accounts/$accountGUID/account_numbers");
    $accountNumbers = $response['account_numbers'];

    $accountNumberArray = [];
    foreach ($accountNumbers as $accountNumber) {
      $accountNumberArray[] = new AccountNumber($accountNumber);
    }

    return $accountNumberArray;
  }

  function listMemberAccountNumbers($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/members/$memberGUID/account_numbers");
    $accountNumbers = $response['account_numbers'];

    $accountNumberArray = [];
    foreach ($accountNumbers as $accountNumber) {
      $accountNumberArray[] = new AccountNumber($accountNumber);
    }

    return $accountNumberArray;
  }

  // ACCOUNT OWNER

  function listMemberAccountOwners($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/members/$memberGUID/account_owners");
    $accountOwners = $response['account_owners'];

    $accountOwnerArray = [];
    foreach ($accountOwners as $accountOwner) {
      $accountOwnerArray[] = new AccountOwner($accountOwner);
    }

    return $accountOwnerArray;
  }

  // TRANSACTION

  function categorizeAndDescribeTransactions($transactions) {
    $transactionArray = array(
      'transactions' => $transactions
    );

    $json = json_encode($transactionArray);
    $response = $this->makeRequest('POST', "/categorize_and_describe", $json);

    $categorizedTransactions = $response['transactions'];

    $transactionsArray = [];
    foreach ($categorizedTransactions as $transaction) {
      $transactionsArray[] = new Transaction($transaction);
    }
    
    return $transactionsArray;
  }

  function readTransaction($userGUID, $transactionGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/transactions/$transactionGUID");
    return new Transaction($response['transaction']);
  }

  function listTransactions($userGUID) {
    $response = $this->makeRequest('GET', "/users/$userGUID/transactions");
    $transactions = $response['transactions'];

    $transactionArray = [];
    foreach ($transactions as $transaction) {
      $transactionArray[] = new Transaction($transaction);
    }

    return $transactionArray;
  }


  // CONNECT WIDGET

  function createWidget($userGUID) {
    $response = $this->makeRequest('POST', "/users/$userGUID/connect_widget_url");
    return new Connect($response['user']);
  }





  private function makeRequest($method, $endpoint, $body = "") {
    $request = curl_init();
    curl_setopt($request, CURLOPT_RETURNTRANSFER, TRUE);

    if ($method == 'GET') {

    }

    if ($method == 'POST') {

      curl_setopt($request, CURLOPT_POST, TRUE);
      curl_setopt($request, CURLOPT_POSTFIELDS, $body);
    }

    if ($method == 'PUT') {

      curl_setopt($request, CURLOPT_CUSTOMREQUEST, 'PUT');
      curl_setopt($request, CURLOPT_POSTFIELDS, $body);
    }

    if ($method == 'DELETE') {

      curl_setopt($request, CURLOPT_CUSTOMREQUEST, 'DELETE');
      curl_setopt($request, CURLOPT_POSTFIELDS, $body);
    }

    curl_setopt($request, CURLOPT_HTTPHEADER, array(
      'Accept: application/vnd.mx.atrium.v1+json',
      'Content-Type: application/json',
      "MX-API-Key: {$this->mx_api_key}",
      "MX-Client-ID: {$this->mx_client_id}"
    ));

    curl_setopt($request, CURLOPT_URL, $this->base_url . $endpoint);

    curl_setopt($request, CURLOPT_HEADER, TRUE);

    curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($request);

    $response_info = curl_getinfo($request);

    curl_close($request);

    $response_header = trim(substr($response, 0, $response_info['header_size']));
    $response_body = substr($response, $response_info['header_size']);

    $this->httpError($response_info['http_code']);

    return json_decode($response_body, true);
  }

  function httpError($code) {
    switch($code) {
      case 400:
        echo "$code error: Required parameter is missing.\n";
        break;
      case 401:
        echo "$code error: Invalid MX-API-Key, MX-Client-ID, or being used in wrong environment.\n";
        break;
      case 403:
        echo "$code error: Requests must be HTTPS.\n";
        break;
      case 404:
        echo "$code error: GUID / URL path not recognized.\n";
        break;
      case 405:
        echo "$code error: Endpoint constraint not met.\n";
        break;
      case 406:
        echo "$code error: Specifiy valid API version.\n";
        break;
      case 409:
        echo "$code error: Object already exists.\n";
        break;
      case 422:
        echo "$code error: Data provided cannot be processed.\n";
        break;
      case 500:
      case 502:
      case 504:
        echo "$code error: An unexpected error occurred on MX's systems.\n";
        break;
      case 503:
        echo "$code error: Please try again later. The MX Platform is currently being updated.\n";
        break;
    }

    // Quit on 4XX or 5XX errors
    if (intdiv($code, 100) == 4 || intdiv($code, 100) == 5) {
      exit(0);
    }
  }
}

?>
