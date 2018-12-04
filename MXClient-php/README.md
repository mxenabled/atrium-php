# MXClient-php
The MX Atrium API supports over 48,000 data connections to thousands of financial institutions. It provides secure access to your users' accounts and transactions with industry-leading cleansing, categorization, and classification.  Atrium is designed according to resource-oriented REST architecture and responds with JSON bodies and HTTP response codes.  Use Atrium's development environment, vestibule.mx.com, to quickly get up and running. The development environment limits are 100 users, 25 members per user, and access to the top 15 institutions. Contact MX to purchase production access.

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/mxenabled/atrium-php.git"
    }
  ],
  "require": {
    "mxenabled/atrium-php": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
require_once('/path/to/MXClient-php/vendor/autoload.php');
```

## Example Usage

Please see `docs` directory for additional endpoint examples

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API Key authorization
$config = atrium\Configuration::getDefaultConfiguration()->setApiKey('MX-API-Key', 'YOUR_API_KEY');

// Configure Client ID authorization
$config = atrium\Configuration::getDefaultConfiguration()->setApiKey('MX-Client-ID', 'YOUR_CLIENT_ID');

$apiInstance = new atrium\Api\AccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_guid = "account_guid_example"; // string | The unique identifier for an `account`.
$user_guid = "user_guid_example"; // string | The unique identifier for a `user`.
$from_date = "from_date_example"; // string | Filter transactions from this date.
$to_date = "to_date_example"; // string | Filter transactions to this date.
$page = 12; // int | Specify current page.
$records_per_page = 12; // int | Specify records per page.

try {
    $result = $apiInstance->listAccountTransactions($account_guid, $user_guid, $from_date, $to_date, $page, $records_per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountsApi->listAccountTransactions: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AccountsApi* | [**listAccountTransactions**](docs/Api/AccountsApi.md#listaccounttransactions) | **GET** /users/{user_guid}/accounts/{account_guid}/transactions | List account transactions
*AccountsApi* | [**listUserAccounts**](docs/Api/AccountsApi.md#listuseraccounts) | **GET** /users/{user_guid}/accounts | List accounts for a user
*AccountsApi* | [**readAccount**](docs/Api/AccountsApi.md#readaccount) | **GET** /users/{user_guid}/accounts/{account_guid} | Read an account
*AccountsApi* | [**readAccountByMemberGUID**](docs/Api/AccountsApi.md#readaccountbymemberguid) | **GET** /users/{user_guid}/members/{member_guid}/accounts/{account_guid} | Read an account
*ConnectWidgetApi* | [**getConnectWidget**](docs/Api/ConnectWidgetApi.md#getconnectwidget) | **POST** /users/{user_guid}/connect_widget_url | Embedding in a website
*IdentityApi* | [**identifyMember**](docs/Api/IdentityApi.md#identifymember) | **POST** /users/{user_guid}/members/{member_guid}/identify | Identify
*IdentityApi* | [**listAccountOwners**](docs/Api/IdentityApi.md#listaccountowners) | **GET** /users/{user_guid}/members/{member_guid}/account_owners | List member account owners
*InstitutionsApi* | [**listInstitutions**](docs/Api/InstitutionsApi.md#listinstitutions) | **GET** /institutions | List institutions
*InstitutionsApi* | [**readInstitution**](docs/Api/InstitutionsApi.md#readinstitution) | **GET** /institutions/{institution_code} | Read institution
*InstitutionsApi* | [**readInstitutionCredentials**](docs/Api/InstitutionsApi.md#readinstitutioncredentials) | **GET** /institutions/{institution_code}/credentials | Read institution credentials
*MembersApi* | [**aggregateMember**](docs/Api/MembersApi.md#aggregatemember) | **POST** /users/{user_guid}/members/{member_guid}/aggregate | Aggregate member
*MembersApi* | [**createMember**](docs/Api/MembersApi.md#createmember) | **POST** /users/{user_guid}/members | Create member
*MembersApi* | [**deleteMember**](docs/Api/MembersApi.md#deletemember) | **DELETE** /users/{user_guid}/members/{member_guid} | Delete member
*MembersApi* | [**listMemberAccounts**](docs/Api/MembersApi.md#listmemberaccounts) | **GET** /users/{user_guid}/members/{member_guid}/accounts | List member accounts
*MembersApi* | [**listMemberCredentials**](docs/Api/MembersApi.md#listmembercredentials) | **GET** /users/{user_guid}/members/{member_guid}/credentials | List member credentials
*MembersApi* | [**listMemberMFAChallenges**](docs/Api/MembersApi.md#listmembermfachallenges) | **GET** /users/{user_guid}/members/{member_guid}/challenges | List member MFA challenges
*MembersApi* | [**listMemberTransactions**](docs/Api/MembersApi.md#listmembertransactions) | **GET** /users/{user_guid}/members/{member_guid}/transactions | List member transactions
*MembersApi* | [**listMembers**](docs/Api/MembersApi.md#listmembers) | **GET** /users/{user_guid}/members | List members
*MembersApi* | [**readMember**](docs/Api/MembersApi.md#readmember) | **GET** /users/{user_guid}/members/{member_guid} | Read member
*MembersApi* | [**readMemberStatus**](docs/Api/MembersApi.md#readmemberstatus) | **GET** /users/{user_guid}/members/{member_guid}/status | Read member connection status
*MembersApi* | [**resumeMember**](docs/Api/MembersApi.md#resumemember) | **PUT** /users/{user_guid}/members/{member_guid}/resume | Resume aggregation from MFA
*MembersApi* | [**updateMember**](docs/Api/MembersApi.md#updatemember) | **PUT** /users/{user_guid}/members/{member_guid} | Update member
*TransactionsApi* | [**cleanseAndCategorizeTransactions**](docs/Api/TransactionsApi.md#cleanseandcategorizetransactions) | **POST** /cleanse_and_categorize | Categorize transactions
*TransactionsApi* | [**listUserTransactions**](docs/Api/TransactionsApi.md#listusertransactions) | **GET** /users/{user_guid}/transactions | List transactions for a user
*TransactionsApi* | [**readTransaction**](docs/Api/TransactionsApi.md#readtransaction) | **GET** /users/{user_guid}/transactions/{transaction_guid} | Read a transaction
*UsersApi* | [**createUser**](docs/Api/UsersApi.md#createuser) | **POST** /users | Create user
*UsersApi* | [**deleteUser**](docs/Api/UsersApi.md#deleteuser) | **DELETE** /users/{user_guid} | Delete user
*UsersApi* | [**listUsers**](docs/Api/UsersApi.md#listusers) | **GET** /users | List users
*UsersApi* | [**readUser**](docs/Api/UsersApi.md#readuser) | **GET** /users/{user_guid} | Read user
*UsersApi* | [**updateUser**](docs/Api/UsersApi.md#updateuser) | **PUT** /users/{user_guid} | Update user
*VerificationApi* | [**listAccountNumbers**](docs/Api/VerificationApi.md#listaccountnumbers) | **GET** /users/{user_guid}/members/{member_guid}/account_numbers | Read account numbers
*VerificationApi* | [**listAccountNumbersByAccount**](docs/Api/VerificationApi.md#listaccountnumbersbyaccount) | **GET** /users/{user_guid}/accounts/{account_guid}/account_numbers | Read account numbers by account GUID
*VerificationApi* | [**verifyMember**](docs/Api/VerificationApi.md#verifymember) | **POST** /users/{user_guid}/members/{member_guid}/verify | Verify


## Documentation For Models

 - [Account](docs/Model/Account.md)
 - [AccountAttributes](docs/Model/AccountAttributes.md)
 - [AccountNumberAttributes](docs/Model/AccountNumberAttributes.md)
 - [AccountNumbers](docs/Model/AccountNumbers.md)
 - [AccountOwnerAttributes](docs/Model/AccountOwnerAttributes.md)
 - [AccountOwners](docs/Model/AccountOwners.md)
 - [Accounts](docs/Model/Accounts.md)
 - [ChallengeAttributes](docs/Model/ChallengeAttributes.md)
 - [ChallengeOptionAttributes](docs/Model/ChallengeOptionAttributes.md)
 - [Challenges](docs/Model/Challenges.md)
 - [ConnectWidget](docs/Model/ConnectWidget.md)
 - [ConnectWidgetAttributes](docs/Model/ConnectWidgetAttributes.md)
 - [ConnectWidgetRequestBody](docs/Model/ConnectWidgetRequestBody.md)
 - [CredentialAttributes](docs/Model/CredentialAttributes.md)
 - [CredentialOptionAttributes](docs/Model/CredentialOptionAttributes.md)
 - [CredentialResponseAttributes](docs/Model/CredentialResponseAttributes.md)
 - [Credentials](docs/Model/Credentials.md)
 - [Institution](docs/Model/Institution.md)
 - [InstitutionAttributes](docs/Model/InstitutionAttributes.md)
 - [Institutions](docs/Model/Institutions.md)
 - [Member](docs/Model/Member.md)
 - [MemberAttributes](docs/Model/MemberAttributes.md)
 - [MemberConnectionStatus](docs/Model/MemberConnectionStatus.md)
 - [MemberConnectionStatusAttributes](docs/Model/MemberConnectionStatusAttributes.md)
 - [MemberCreateRequestBody](docs/Model/MemberCreateRequestBody.md)
 - [MemberCreateRequestBodyAttributes](docs/Model/MemberCreateRequestBodyAttributes.md)
 - [MemberResumeRequestBody](docs/Model/MemberResumeRequestBody.md)
 - [MemberResumeRequestBodyAttributes](docs/Model/MemberResumeRequestBodyAttributes.md)
 - [MemberUpdateRequestBody](docs/Model/MemberUpdateRequestBody.md)
 - [MemberUpdateRequestBodyAttributes](docs/Model/MemberUpdateRequestBodyAttributes.md)
 - [Members](docs/Model/Members.md)
 - [Pagination](docs/Model/Pagination.md)
 - [Transaction](docs/Model/Transaction.md)
 - [TransactionAttributes](docs/Model/TransactionAttributes.md)
 - [Transactions](docs/Model/Transactions.md)
 - [TransactionsCleanseAndCategorize](docs/Model/TransactionsCleanseAndCategorize.md)
 - [TransactionsCleanseAndCategorizeAttributes](docs/Model/TransactionsCleanseAndCategorizeAttributes.md)
 - [TransactionsCleanseAndCategorizeRequestBody](docs/Model/TransactionsCleanseAndCategorizeRequestBody.md)
 - [TransactionsCleanseAndCategorizeRequestBodyAttributes](docs/Model/TransactionsCleanseAndCategorizeRequestBodyAttributes.md)
 - [User](docs/Model/User.md)
 - [UserAttributes](docs/Model/UserAttributes.md)
 - [UserCreateRequestBody](docs/Model/UserCreateRequestBody.md)
 - [UserUpdateRequestBody](docs/Model/UserUpdateRequestBody.md)
 - [Users](docs/Model/Users.md)

