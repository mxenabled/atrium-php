<?php
include_once('../atrium/AtriumClient.php');

$atriumClient = new AtriumClient('https://vestibule.mx.com', 'YOUR_MX_API_KEY', 'YOUR_MX_CLIENT_ID');

echo "\n* Creating test user and member with \"CHALLENGED\" aggregation status *";
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
      'value' => 'challenge'
  )
);

$params = ['credentials' => $credentialArray, 'institution_code' => 'mxbank'];

$member = $atriumClient->createMember($userGUID, $params);
$memberGUID = $member->getGuid();
echo "\nCreated member: " . $memberGUID . "\n";

sleep(1);

echo "\n* Retrieving member aggregation status *";
$member = $atriumClient->readMemberAggregationStatus($userGUID, $memberGUID);
echo "\nMember aggregation status: " . $member->getStatus() . "\n";

echo "\n* MFA challenge *\n";
$challenges = $atriumClient->listMemberMFAChallenges($userGUID, $memberGUID);
foreach ($challenges as $challenge) {
  echo $challenge->getLabel() . "\n";
}

$challengeArray = array(
  'challenges' => array(
    array(
      'guid' => $challenges[0]->getGuid(),
      'value' => 'correct'
    )
  )
);

echo "\n* MFA answered correctly, resuming aggregation *\n";
$member = $atriumClient->resumeMemberAggregation($userGUID, $memberGUID, $challengeArray);

sleep(1);

echo "\n* Retrieving member aggregation status *";
$member = $atriumClient->readMemberAggregationStatus($userGUID, $memberGUID);
echo "\nMember aggregation status: " . $member->getStatus() . "\n";


echo "\n* Deleting test user *";
$atriumClient->deleteUser($userGUID);
echo "\nDeleted user: " . $userGUID . "\n";

?>
