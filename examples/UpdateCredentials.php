<?php
include_once('../atrium/AtriumClient.php');

$atriumClient = new AtriumClient('https://vestibule.mx.com', 'YOUR_MX_API_KEY', 'YOUR_MX_CLIENT_ID');

echo "\n* Creating test user and member with \"DENIED\" aggregation status *";
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
      'value' => 'INVALID'
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


$member = $atriumClient->readMember($userGUID, $memberGUID);
$institutionCode = $member->getInstitutionCode();

echo "\n* Updating credentials *\n";
$credentials = $atriumClient->readInstitutionCredentials($institutionCode);

$credentialArray = array(
  array(
      'guid' => $credentials[0]->getGuid(),
      'value' => 'test_atrium'
  ),
  array(
      'guid' => 'CRD-e3d7ea81-aac7-05e9-fbdd-4b493c6e474d',
      'value' => 'password'
  )
);

$params = ['credentials' => $credentialArray, 'metadata' => '{\'credentials_last_refreshed_at\': \'2015-10-16\'}'];

$member = $atriumClient->updateMember($userGUID, $memberGUID, $params);


sleep(1);

echo "\n* Retrieving member aggregation status *";
$member = $atriumClient->readMemberAggregationStatus($userGUID, $memberGUID);
echo "\nMember aggregation status: " . $member->getStatus() . "\n";


echo "\n* Deleting test user *";
$atriumClient->deleteUser($userGUID);
echo "\nDeleted user: " . $userGUID . "\n";

?>
