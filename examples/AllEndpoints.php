<?php

use AtriumMX\AtriumClient;
use AtriumMX\models\Account;
use AtriumMX\models\Challenge;
use AtriumMX\models\Transaction;

$atriumClient = new AtriumClient(
    'https://vestibule.mx.com', 'YOUR_MX_API_KEY', 'YOUR_MX_CLIENT_ID'
);

echo "\n************************** Create User **************************\n";
$user = $atriumClient->createUser(
    ['metadata' => '{\'first_name\': \'Steven\'}']
);
print_r($user);
$userGUID = $user->getGuid();

echo "\n************************** Read User **************************\n";
$user = $atriumClient->readUser($userGUID);
print_r($user);

echo "\n************************** Update User **************************\n";
$user = $atriumClient->updateUser(
    $userGUID,
    ['metadata' => '{\'first_name\': \'Steven\', \'last_name\': \'Universe\'}']
);
print_r($user);

echo "\n************************** List Users **************************\n";
$users = $atriumClient->listUsers();
foreach ($users as $user) {
    print_r($user);
}

echo "\n************************** List Institutions **************************\n";
$institutions = $atriumClient->listInstitutions('bank');
foreach ($institutions as $institution) {
    print_r($institution);
}

echo "\n************************** Read Institution **************************\n";
$institution = $atriumClient->readInstitution('mxbank');
print_r($institution);

echo "\n************************** Read Institution Credentials **************************\n";
$credentials = $atriumClient->readInstitutionCredentials('mxbank');
foreach ($credentials as $credential) {
    print_r($credential);
}

echo "\n************************** Create Member **************************\n";
$credentialArray = [
    [
        'guid'  => 'CRD-9f61fb4c-912c-bd1e-b175-ccc7f0275cc1',
        'value' => 'test_atrium1'
    ],
    [
        'guid'  => 'CRD-e3d7ea81-aac7-05e9-fbdd-4b493c6e474d',
        'value' => 'challenge1'
    ]
];

$params = ['credentials' => $credentialArray, 'institution_code' => 'mxbank'];

$member = $atriumClient->createMember($userGUID, $params);
print_r($member);
$memberGUID = $member->getGuid();

echo "\n************************** Read Member **************************\n";
$member = $atriumClient->readMember($userGUID, $memberGUID);
print_r($member);

echo "\n************************** Update Member **************************\n";
$credentialArray = [
    [
        'guid'  => 'CRD-9f61fb4c-912c-bd1e-b175-ccc7f0275cc1',
        'value' => 'test_atrium'
    ],
    [
        'guid'  => 'CRD-e3d7ea81-aac7-05e9-fbdd-4b493c6e474d',
        'value' => 'challenge'
    ]
];

$params = ['credentials' => $credentialArray,
           'metadata'    => '{\'credentials_last_refreshed_at\': \'2015-10-16\'}'];

$member = $atriumClient->updateMember($userGUID, $memberGUID, $params);
print_r($member);

echo "\n************************** List Members **************************\n";
$members = $atriumClient->listMembers($userGUID);
foreach ($members as $member) {
    print_r($member);
}

echo "\n************************** Aggregate Member **************************\n";
$member = $atriumClient->aggregateMember($userGUID, $memberGUID);
print_r($member);

echo "\n************************** Read Member Status **************************\n";
$member = $atriumClient->readMemberAggregationStatus($userGUID, $memberGUID);
print_r($member);

echo "\n************************** List Member MFA Challenges **************************\n";
sleep(3);
$challenges = $atriumClient->listMemberMFAChallenges($userGUID, $memberGUID);
$challengeGUID = '';
/** @var Challenge[] $challenges */
foreach ($challenges as $challenge) {
    print_r($challenge);
    $challengeGUID = $challenge->getGuid();
}

echo "\n************************** Resume Aggregation **************************\n";
$challengeArray = [
    'challenges' => [
        [
            'guid'  => $challengeGUID,
            'value' => 'correct'
        ]
    ]
];

$member = $atriumClient->resumeMemberAggregation(
    $userGUID, $memberGUID, $challengeArray
);
print_r($member);

echo "\n************************** List Member Credentials **************************\n";
$credentials = $atriumClient->listMemberCredentials($userGUID, $memberGUID);
foreach ($credentials as $credential) {
    print_r($credential);
}

echo "\n************************** List Member Accounts **************************\n";
sleep(5);
$accounts = $atriumClient->listMemberAccounts($userGUID, $memberGUID);
$accountGUID = '';
/** @var Account $account */
foreach ($accounts as $account) {
    print_r($account);
    $accountGUID = $account->getGuid();
}

echo "\n************************** List Member Transactions **************************\n";
$transactions = $atriumClient->listMemberTransactions($userGUID, $memberGUID);
foreach ($transactions as $transaction) {
    print_r($transaction);
}

echo "\n************************** Read Account **************************\n";
$account = $atriumClient->readAccount($userGUID, $accountGUID);
print_r($account);

echo "\n************************** List Accounts for User **************************\n";
$accounts = $atriumClient->listAccounts($userGUID);
foreach ($accounts as $account) {
    print_r($account);
}

echo "\n************************** List Account Transactions **************************\n";
$transactions = $atriumClient->listAccountTransactions($userGUID, $accountGUID);
$transactionGUID = '';
/** @var Transaction $transaction */
foreach ($transactions as $transaction) {
    print_r($transaction);
    $transactionGUID = $transaction->getGuid();
}

echo "\n************************** Read a Transaction **************************\n";
$transaction = $atriumClient->readTransaction($userGUID, $transactionGUID);
print_r($transaction);

echo "\n************************** List Transactions **************************\n";
$transaction = $atriumClient->listTransactions($userGUID);
foreach ($transactions as $transaction) {
    print_r($transaction);
}

echo "\n************************** Connect Widget **************************\n";
$connect = $atriumClient->createWidget($userGUID);
print_r($connect);

echo "\n************************** Delete Member **************************\n";
$response = $atriumClient->deleteMember($userGUID, $memberGUID);
echo $response;

echo "\n************************** Delete User **************************\n";
$response = $atriumClient->deleteUser($userGUID);
echo $response;
