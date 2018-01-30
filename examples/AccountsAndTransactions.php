<?php
include_once('../atrium/AtriumClient.php');

$atriumClient = new AtriumClient('https://vestibule.mx.com', 'YOUR_MX_API_KEY', 'YOUR_MX_CLIENT_ID');

echo "\n* Creating test user and member *";
$user = $atriumClient->createUser(['metadata' => '{\'first_name\': \'Steven\'}']);
$userGUID = $user->getGuid();
echo "\nCreated user: " . $userGUID;

$credentialArray = array(
  array(
      'guid' => 'CRD-9f61fb4c-912c-bd1e-b175-ccc7f0275cc1',
      'value' => 'test_atrium'
  ),
  array(
      'guid' => 'CRD-e3d7ea81-aac7-05e9-fbdd-4b493c6e474d',
      'value' => 'password'
  )
);

$params = ['credentials' => $credentialArray, 'institution_code' => 'mxbank'];

$member = $atriumClient->createMember($userGUID, $params);
$memberGUID = $member->getGuid();
echo "\nCreated member: " . $memberGUID . "\n";

sleep(1);

echo "\n* Aggregating member *";
$member = $atriumClient->aggregateMember($userGUID, $memberGUID);

sleep(5);
echo "\nMember aggregation status: " . $member->getStatus() . "\n";

echo "\n* Listing all member accounts and transactions *";
$accounts = $atriumClient->listMemberAccounts($userGUID, $memberGUID);
foreach ($accounts as $account) {
  echo "Type: " . $account->getType . "\tName: " . $account->getName() . "\tAvailable Balance: " . $account->getAvailableBalance() . "\tAvailable Credit: " . $account->getAvailableCredit() . "\n";
  echo "Transactions\n";
  $transactions = $atriumClient->listAccountTransactions($userGUID, $account->getGuid());
  foreach ($transactions as $transaction) {
    echo "\tDate: " . $transaction->getDate() . "\tDescription: " . $transaction->getDescription() . "\tAmount: " . $transaction->getAmount() . "\n";
  }
  echo "\n";
}

echo "\n* Deleting test user *";
$atriumClient->deleteUser($userGUID);
echo "\nDeleted user: " . $userGUID . "\n";

?>
