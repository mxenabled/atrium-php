<?php
include_once('../atrium/AtriumClient.php');

function checkJobStatus($atriumClient, $counter, $userGUID, $memberGUID) {
  echo "\n2 second delay...";
  sleep(2);

  $member = $atriumClient->readMemberAggregationStatus($userGUID, $memberGUID);
  $status = $member->getStatus();

  echo "\nJOB STATUS: " . $status . "\n";

  switch($status) {
    case "COMPLETED":
      readAggregationData($atriumClient, $userGUID, $memberGUID);
      break;
    case "HALTED":
    case "FAILED":
      $currentTime = date("c");

      $member = $atriumClient->readMemberAggregationStatus($userGUID, $memberGUID);
      $lastSuccessTime = $member->getSuccessfullyAggregatedAt();

      // Check if last successful aggregation over 3 days ago
      if (!is_null($lastSuccessTime) && (abs(substr($currentTime, 8, 10) - substr($lastSuccessTime, 8, 10)) > 3) || (abs(substr($currentTime, 5, 7) - substr($lastSuccessTime, 5, 7)) > 0) || (abs(substr($currentTime, 0, 4) - substr($lastSuccessTime, 0, 4)) > 0)) {
        echo "\nClient should contact MX Support to resolve issue.";
      }
      else {
        echo "\nAn update is currently unavailable. Please try again tomorrow";
      }
      break;
    case "CREATED":
    case "UPDATED":
    case "RESUMED":
    case "CONNECTED":
    case "DEGRADED":
    case "DELAYED":
    case "INITIATED":
    case "REQUESTED":
    case "AUTHENTICATED":
    case "RECEIVED":
    case "TRANSFERRED":
      checkJobStatus($atriumClient, $counter, $userGUID, $memberGUID);
      break;
    case "PREVENTED":
    case "DENIED":
    case "IMPAIRED":
      $member = $atriumClient->readMember($userGUID, $memberGUID);
      $institutionCode = $member->getInstitutionCode();

      echo "\nPlease update credentials";

      $credentials = $atriumClient->readInstitutionCredentials($institutionCode);
      $updatedCredentialArray = array();
      foreach ($credentials as $credential) {
        echo "\nPlease enter in " . $credential->getLabel() . ": ";
        $cred = rtrim(fgets(STDIN));
        array_push($updatedCredentialArray, array(
          'guid' => $credential->getGuid(),
          'value' => $cred
        ));
      }

      $params = ['credentials' => $updatedCredentialArray];

      $member = $atriumClient->updateMember($userGUID, $memberGUID, $params);

      checkJobStatus($atriumClient, $counter, $userGUID, $memberGUID);
      break;
    case "CHALLENGED":
      echo "\nPlease answer the following challenges:\n";
      $challenges = $atriumClient->listMemberMFAChallenges($userGUID, $memberGUID);
      $answers = array();
      foreach ($challenges as $challenge) {
        echo $challenge->getLabel() . ": ";
        $ans = rtrim(fgets(STDIN));
        array_push($answers, array(
          'guid' => $challenge->getGuid(),
          'value' => $ans
        ));
      }

      $updatedChallengeArray = array(
        'challenges' => $answers
      );

      $atriumClient->resumeMemberAggregation($userGUID, $memberGUID, $updatedChallengeArray);

      checkJobStatus($atriumClient, $counter, $userGUID, $memberGUID);
      break;
    case "REJECTED":
      $atriumClient->aggregateMember($userGUID, $memberGUID);

      checkJobStatus($atriumClient, $counter, $userGUID, $memberGUID);
      break;
    case "EXPIRED":
      echo "\nUser did not answer MFA in time. Please try again tomorrow.";
      break;
    case "LOCKED":
      echo "\nUser's account is locked at FI";
      break;
    case "IMPEDED":
      echo "\nUser's attention is required at FI website in order for aggregation to complete";
      break;
    case "DISCONTINUED":
      echo "\nConnection to institution is no longer available.";
      break;
    case "CLOSED":
    case "DISABLED":
      echo "\nAggregation is purposely turned off for this user.";
      break;
    case "TERMINATED":
    case "ABORTED":
    case "STOPPED":
    case "THROTTLED":
    case "SUSPENDED":
    case "ERRORED":
      // Check JobStatus() an additional 2 times to see if status changed
      if ($counter < 3) {
        $counter = $counter + 1;
        checkJobStatus($atriumClient, $counter, $userGUID, $memberGUID);
      }
      else {
        echo "\nAn update is currently unavailable. Please try again tomorrow and contact support if unsuccessful after 3 days.";
      }
      break;
    default:
      echo $status;
      break;
  }
}

function readAggregationData($atriumClient, $userGUID, $memberGUID) {
  $atriumClient->readMember($userGUID, $memberGUID);

  echo "\n* Listing all member accounts and transactions *\n";
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
}


$atriumClient = new AtriumClient('https://vestibule.mx.com', 'YOUR_MX_API_KEY', 'YOUR_MX_CLIENT_ID');

$counter = 0;

echo "\nPlease enter in user GUID. If not yet created just press enter key: ";
$userGUID = rtrim(fgets(STDIN));

echo "\nPlease enter in member GUID. If not yet created just press enter key: ";
$memberGUID = rtrim(fgets(STDIN));

echo "\nPlease enter in if end user is present (true or false): ";
$endUserPresent = rtrim(fgets(STDIN));


if ($userGUID == "" && $memberGUID != "") {
  echo "\nMust include user GUID when member GUID is entered.\n";
  exit(0);
}

if ($userGUID == "" && $endUserPresent != "") {
  echo "\n\n* Creating user *";

  echo "\nPlease enter in an unique id for new user: ";
  $identifier = rtrim(fgets(STDIN));

  $user = $atriumClient->createUser(['identifier' => $identifier]);
  $userGUID = $user->getGuid();

  echo "\nCreated user: " . $userGUID . "\n";
}

if ($memberGUID != "" && $endUserPresent == "true") {
  $atriumClient->aggregateMember($userGUID, $memberGUID);
  checkJobStatus($atriumClient, $counter, $userGUID, $memberGUID);
}
elseif ($memberGUID != "") {
  readAggregationData($atriumClient, $userGUID, $memberGUID);
}
elseif ($endUserPresent == "true") {
  echo "\n* Creating member *\n";

  echo "\n* Listing top 15 institutions *\n";
  $institutions = $atriumClient->listInstitutions();
  foreach ($institutions as $institution) {
    echo $institution->getName() . " : institution code = " . $institution->getCode() . "\n";
  }

  echo "\nPlease enter in desired institution code: ";
  $institutionCode = rtrim(fgets(STDIN));

  $credentials = $atriumClient->readInstitutionCredentials($institutionCode);
  $credentialArray = array();
  foreach ($credentials as $credential) {
    echo "\nPlease enter in " . $credential->getLabel() . ": ";
    $cred = rtrim(fgets(STDIN));
    array_push($credentialArray, array(
      'guid' => $credential->getGuid(),
      'value' => $cred
    ));
  }

  $params = ['credentials' => $credentialArray, 'institution_code' => $institutionCode];

  $member = $atriumClient->createMember($userGUID, $params);
  $memberGUID = $member->getGuid();

  echo "\nCreated member: " . $memberGUID . "\n";

  checkJobStatus($atriumClient, $counter, $userGUID, $memberGUID);
}
else {
  echo "\nEnd user must be present to create a new member\n";
  exit(0);
}

?>
