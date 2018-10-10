<?php
include_once('../atrium/AtriumClient.php');

$atriumClient = new AtriumClient('http://vestibule.mx.com', 'YOUR_MX_API_KEY', 'YOUR_MX_CLIENT_ID');

echo "\n************************** Categorize Transactions **************************\n";
$raw_transactions = array(
  array(
    "amount" => 11.22,
    "description" => "BEER BAR 65000000764SALT LAKE C",
    "id" => "12",
    "type" => "DEBIT"
  ),
  array(
    "amount" => 21.33,
    "description" => "IN-N-OUT BURGER #239AMERICAN FO",
    "id" => "13",
    "type" => "DEBIT"
  ),
  array(
    "amount" => 1595.33,
    "description" => "ONLINE PAYMENT - THANK YOU",
    "id" => "14",
    "type" => "CREDIT"
  )
);
$transactions = $atriumClient->categorizeAndDescribeTransactions($raw_transactions);
print_r($transactions);
?>
