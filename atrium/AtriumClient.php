<?php
include_once('models/User.php');
include_once('models/Institution.php');
include_once('models/Credential.php');
include_once('models/Member.php');
include_once('models/Challenge.php');
include_once('models/Account.php');
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
    return new User(json_decode($response, true)['user']);
  }

  function readUser($userGUID) {
    $response = $this->makeRequest('GET', '/users/' . $userGUID, '');
    return new User(json_decode($response, true)['user']);
  }

  function updateUser($userGUID, $params) {
    $user = array(
      'user' => $params
    );

    $json = json_encode($user);

    $response = $this->makeRequest('PUT', '/users/' . $userGUID, $json);
    return new User(json_decode($response, true)['user']);
  }

  function listUsers() {
    $response = $this->makeRequest('GET', '/users', '');
    $users = json_decode($response, true)['users'];

    $userArray = [];
    foreach ($users as $user) {
      $userArray[] = new User($user);
    }

    return $userArray;
  }

  function deleteUser($userGUID) {
    return $this->makeRequest('DELETE', '/users/' . $userGUID, '');
  }


  // INSTITUTION

  function listInstitutions($name = '') {
    $response = $this->makeRequest('GET', '/institutions?name=' . $name, '');
    $institutions = json_decode($response, true)['institutions'];

    $institutionArray = [];
    foreach ($institutions as $institution) {
      $institutionArray[] = new Institution($institution);
    }

    return $institutionArray;
  }

  function readInstitution($institutionCode) {
    $response = $this->makeRequest('GET', '/institutions/' . $institutionCode, '');
    return new Institution(json_decode($response, true)['institution']);
  }

  function readInstitutionCredentials($institutionCode) {
    $response = $this->makeRequest('GET', '/institutions/' . $institutionCode . '/credentials', '');
    $credentials = json_decode($response, true)['credentials'];

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

    $response = $this->makeRequest('POST', '/users/' . $userGUID . '/members', $json);

    return new Member(json_decode($response, true)['member']);
  }

  function readMember($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', '/users/' . $userGUID . '/members/' . $memberGUID, '');
    return new Member(json_decode($response, true)['member']);
  }

  function updateMember($userGUID, $memberGUID, $params) {
    $member = array(
      'member' => $params
    );

    $json = json_encode($member);

    $response = $this->makeRequest('PUT', '/users/' . $userGUID . '/members/' . $memberGUID, $json);

    return new Member(json_decode($response, true)['member']);
  }

  function deleteMember($userGUID, $memberGUID) {
    return $this->makeRequest('DELETE', '/users/' . $userGUID . '/members/' . $memberGUID, '');
  }

  function listMembers($userGUID) {
    $response = $this->makeRequest('GET', '/users/' . $userGUID . '/members', '');
    $members = json_decode($response, true)['members'];

    $memberArray = [];
    foreach ($members as $member) {
      $memberArray[] = new Member($member);
    }

    return $memberArray;
  }

  function aggregateMember($userGUID, $memberGUID) {
    $response = $this->makeRequest('POST', '/users/' . $userGUID . '/members/' . $memberGUID . '/aggregate', '');
    return new Member(json_decode($response, true)['member']);
  }

  function readMemberAggregationStatus($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', '/users/' . $userGUID . '/members/' . $memberGUID . '/status', '');
    return new Member(json_decode($response, true)['member']);
  }

  function listMemberMFAChallenges($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', '/users/' . $userGUID . '/members/' . $memberGUID . '/challenges', '');
    $challenges = json_decode($response, true)['challenges'];

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

    $response = $this->makeRequest('PUT', '/users/' . $userGUID . '/members/' . $memberGUID . '/resume', $json);

    return new Member(json_decode($response, true)['member']);
  }

  function listMemberCredentials($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', '/users/' . $userGUID . '/members/' . $memberGUID . '/credentials', $json);
    $credentials = json_decode($response, true)['credentials'];

    $credentialArray = [];
    foreach ($credentials as $credential) {
      $credentialArray[] = new Credential($credential);
    }

    return $credentialArray;
  }

  function listMemberAccounts($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', '/users/' . $userGUID . '/members/' . $memberGUID . '/accounts', '');
    $accounts = json_decode($response, true)['accounts'];

    $accountArray = [];
    foreach ($accounts as $account) {
      $accountArray[] = new Account($account);
    }

    return $accountArray;
  }

  function listMemberTransactions($userGUID, $memberGUID) {
    $response = $this->makeRequest('GET', '/users/' . $userGUID . '/members/' . $memberGUID . '/transactions', '');
    $transactions = json_decode($response, true)['transactions'];

    $transactionArray = [];
    foreach ($transactions as $transaction) {
      $transactionArray[] = new Transaction($transaction);
    }

    return $transactionArray;
  }


  // ACCOUNT

  function readAccount($userGUID, $accountGUID) {
    $response = $this->makeRequest('GET', '/users/' . $userGUID . '/accounts/' . $accountGUID, '');
    return new Account(json_decode($response, true)['account']);
  }

  function listAccounts($userGUID) {
    $response = $this->makeRequest('GET', '/users/' . $userGUID . '/accounts', '');
    $accounts = json_decode($response, true)['accounts'];

    $accountArray = [];
    foreach ($accounts as $account) {
      $accountArray[] = new Account($account);
    }

    return $accountArray;
  }

  function listAccountTransactions($userGUID, $accountGUID) {
    $response = $this->makeRequest('GET', '/users/' . $userGUID . '/accounts/' . $accountGUID . '/transactions', '');
    $transactions = json_decode($response, true)['transactions'];

    $transactionArray = [];
    foreach ($transactions as $transaction) {
      $transactionArray[] = new Transaction($transaction);
    }

    return $transactionArray;
  }


  // TRANSACTION

  function readTransaction($userGUID, $transactionGUID) {
    $response = $this->makeRequest('GET', '/users/' . $userGUID . '/transactions/' . $transactionGUID, '');
    return new Transaction(json_decode($response, true)['transaction']);
  }

  function listTransactions($userGUID) {
    $response = $this->makeRequest('GET', '/users/' . $userGUID . '/transactions', '');
    $transactions = json_decode($response, true)['transactions'];

    $transactionArray = [];
    foreach ($transactions as $transaction) {
      $transactionArray[] = new Transaction($transaction);
    }

    return $transactionArray;
  }


  // CONNECT WIDGET

  function createWidget($userGUID) {
    $response = $this->makeRequest('POST', '/users/' . $userGUID . '/connect_widget_url', '');
    return new Connect(json_decode($response, true)['user']);
  }





  private function makeRequest($method, $endpoint, $body) {
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

    //echo $response_info['http_code'];
    //echo $response_header;
    return $response_body;


    //return $response_body;
  }
}

?>
