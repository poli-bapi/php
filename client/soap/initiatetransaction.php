<?php
ob_start();
if (!session_start())
	session_start();
if (!isset($_SESSION['order'])) {
	echo "merchant reference not present";
	exit ;
}
if (!isset($_POST['PaymentAmount'])) {
	echo "Payment amount required.";
	exit ;
}
if (!isset($_POST['CurrencyCode'])) {
	echo "Currency Code required.";
	exit ;
}

$amt = $_POST['PaymentAmount'];
$currencycode = $_POST['CurrencyCode'];

require_once ('constants.php');
require_once ('client.php');
$client = new PoliSoapClient();

$InitiateTransaction = new InitiateTransaction();

$request = new InitiateTransactionRequest();
$tr = new InitiateTransactionInput();
$tr -> CurrencyAmount = number_format($amt, 2, '.', '');
$tr -> CurrencyCode = $currencycode;
$tr -> MerchantCode = MERCHANT_CODE;
$tr -> MerchantData = session_id();
$tr -> SelectedFICode = $_POST['FinancialInstitutionCode'];
$tr -> MerchantRef = $_SESSION['order'];
$tr -> NotificationURL = NOTIFYURL;
$tr -> SuccessfulURL = SUCCESSFULURL;
$tr -> UnsuccessfulURL = UNSUCCESSFULURL;
$tr -> MerchantCheckoutURL = CHECKOUTURL;
$tr -> MerchantHomePageURL = HOMEPAGE;
$tr -> Timeout = 1000;
$tr -> MerchantDateTime = date("Y-m-d\TH:i:s");
$request -> Transaction = $tr;
$request -> AuthenticationCode = AUTHENTICATION_CODE;
$InitiateTransaction -> request = $request;
$res = $client -> InitiateTransaction($InitiateTransaction);

if (!is_null($res -> InitiateTransactionResult -> Errors -> Error)) {
	foreach ($res->InitiateTransactionResult->Errors->Error as $error) {
		print_r($error);
	}
	exit ;
}

/* @var $transaction InitiateTransactionOutput */
$transaction = $res -> InitiateTransactionResult -> Transaction;
if ($res -> InitiateTransactionResult -> TransactionStatusCode == 'Initiated' || $res -> InitiateTransactionResult -> TransactionStatusCode == 'FinancialInstitutionSelected') {

	mysql_connect(DBHOST, DBUSER, DBPASS);
	mysql_select_db(DBNAME);

	mysql_query("insert into transactions (token,refNo,amount,currency,orderno,status) values('" . mysql_escape_string($transaction -> TransactionToken) . "','" . mysql_escape_string($transaction -> TransactionRefNo) . "'," . floatval($amt) . ",'" . mysql_escape_string($currencycode) . "','" . mysql_escape_string($_SESSION['order']) . "','initiated')") or die(mysql_error());
}
header("location: " . $transaction -> NavigateURL);
