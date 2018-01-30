<?php
include_once('../atrium/AtriumClient.php');

$atriumClient = new AtriumClient('https://vestibule.mx.com', 'YOUR_MX_API_KEY', 'YOUR_MX_CLIENT_ID');

echo "\n* Creating user *";
$user = $atriumClient->createUser(['metadata' => '{\'first_name\': \'Steven\'}']);
$userGUID = $user->getGuid();
echo "\nCreated user: " . $userGUID . "\n";



echo "\n* Listing institutions with query string \"bank\" *\n";
$institutions = $atriumClient->listInstitutions('bank');
foreach ($institutions as $institution) {
  echo $institution->getName() . " : institution code = " . $institution->getCode() . "\n";
}


echo "\n* Reading institution \"mxbank\" *\n";
$institution = $atriumClient->readInstitution('mxbank');
echo $institution->getName() . "\n";

echo "\n* Reading institution credentials \"mxbank\" *\n";
$credentials = $atriumClient->readInstitutionCredentials('mxbank');
foreach ($credentials as $credential) {
  echo $credential->getGuid() . "\n";
}

echo "\n* Creating member *";

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
echo "\nCreated member: " . $member->getGuid() . "\n";


echo "\n* Deleting test user *";
$atriumClient->deleteUser($userGUID);
echo "\nDeleted user: " . $userGUID . "\n";

?>
