<?php
$str = '';
require_once ('constants.php');
require_once ('client.php');

if (!isset($_REQUEST['Token']))
	exit ;

$client = new PoliSoapClient();
$GetTransaction = new GetTransaction();
$request = new GetTransactionRequest();

$request -> TransactionToken = $_REQUEST['Token'];
$request -> MerchantCode = MERCHANT_CODE;
$request -> AuthenticationCode = AUTHENTICATION_CODE;

$GetTransaction -> request = $request;

$response = $client -> GetTransaction($GetTransaction);
/* @var $transaction Transaction */
$result = $response -> GetTransactionResult;
if (isset($result -> Errors -> Error) && is_array($result -> Errors -> Error)) {
	//error in request. log error and exit
	exit ;
}

$transaction = $result -> Transaction;

/*
 * You may also verify the existence of the record with  MerchantRef(orderno) with $transaction->MerchantReference along with other records in transaction table as
 * Amount matches $transaction->PaymentAmount
 * Currency is $transaction->CurrencyCode
 *
 */

if ($result -> TransactionStatusCode == 'Completed') {
	mysql_connect(DBHOST, DBUSER, DBPASS);
	mysql_select_db(DBNAME);

	mysql_query("update transactions set status=1 where refno='" . mysql_escape_string((string)$transaction -> TransactionRefNo) . "' and status=0") or die(mysql_error());
	//update transaction table to be used for generating receipt.

	if (!mysql_affected_rows()) {
		echo "not found/already updated";
		exit ;
	}

	mysql_query("insert into receipts set AmountPaid= '" . mysql_escape_string((string)$transaction -> AmountPaid) . "'  
,BankReceipt= '" . mysql_escape_string((string)$transaction -> BankReceipt) . "'  
,BankReceiptDateTime= '" . mysql_escape_string((string)$transaction -> BankReceiptDateTime) . "'  
,CountryCode= '" . mysql_escape_string((string)$transaction -> CountryCode) . "'  
,CountryName= '" . mysql_escape_string((string)$transaction -> CountryName) . "'  
,CurrencyCode= '" . mysql_escape_string((string)$transaction -> CurrencyCode) . "'  
,CurrencyName= '" . mysql_escape_string((string)$transaction -> CurrencyName) . "'  
,EndDateTime= '" . mysql_escape_string((string)$transaction -> EndDateTime) . "'  
,ErrorCode= '" . mysql_escape_string((string)$transaction -> ErrorCode) . "'  
,ErrorMessage= '" . mysql_escape_string((string)$transaction -> ErrorMessage) . "'  
,EstablishedDateTime= '" . mysql_escape_string((string)$transaction -> EstablishedDateTime) . "'  
,FinancialInstitutionCode= '" . mysql_escape_string((string)$transaction -> FinancialInstitutionCode) . "'  
,FinancialInstitutionCountryCode= '" . mysql_escape_string((string)$transaction -> FinancialInstitutionCountryCode) . "'  
,FinancialInstitutionName= '" . mysql_escape_string((string)$transaction -> FinancialInstitutionName) . "'  
,MerchantAcctName= '" . mysql_escape_string((string)$transaction -> MerchantAcctName) . "'  
,MerchantAcctNumber= '" . mysql_escape_string((string)$transaction -> MerchantAcctNumber) . "'  
,MerchantAcctSortCode= '" . mysql_escape_string((string)$transaction -> MerchantAcctSortCode) . "'  
,MerchantAcctSuffix= '" . mysql_escape_string((string)$transaction -> MerchantAcctSuffix) . "'  
,MerchantDefinedData= '" . mysql_escape_string((string)$transaction -> MerchantDefinedData) . "'  
,MerchantEstablishedDateTime= '" . mysql_escape_string((string)$transaction -> MerchantEstablishedDateTime) . "'  
,MerchantReference= '" . mysql_escape_string((string)$transaction -> MerchantReference) . "'  
,PaymentAmount= '" . mysql_escape_string((string)$transaction -> PaymentAmount) . "'  
,StartDateTime= '" . mysql_escape_string((string)$transaction -> StartDateTime) . "'  
,TransactionID= '" . mysql_escape_string((string)$transaction -> TransactionID) . "'  
,TransactionRefNo= '" . mysql_escape_string((string)$transaction -> TransactionRefNo) . "'");
	echo "done";
	exit ;
	//echo "insert into receipt (".implode(",\n",array_keys($keys)).") values($vals)";
	//mysql_query("insert into receipt (".implode(",",array_keys($keys)).") values($vals)") or die(mysql_error());

	/*
	 * log to database any other fields from $transaction object as you may need.
	 */
} else if ($result -> TransactionStatusCode == 'Cancelled' || $result -> TransactionStatusCode == 'TimedOut' || $result -> TransactionStatusCode == 'Failed') {
	echo "Payment failed " . $result -> TransactionStatusCode;
	//log payment failure.
} else {
	//log as needed
}
echo 'done';
