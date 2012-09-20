<?php
require_once('constants.php');
require_once('classes.php');
$client=new PoliRestClient(MERCHANT_CODE,AUTHENTICATION_CODE,1);

$errorout=null;
if(!$_REQUEST['Token']){
	exit;
}
$token=$_REQUEST['Token'];
$transaction=$client->getTransaction($token, $errorout, $code);

if(isset($errorout)&&count($errorout)){
	
	foreach ($errorout as $error) {
		
		print_r((string)$error->Message);
		
	}
	exit;
}

if($code=='Completed'){
mysql_connect(DBHOST,DBUSER,DBPASS);
mysql_select_db(DBNAME);
         mysql_query("update transactions set status=1 where refno='".mysql_escape_string((string)$transaction->TransactionRefNo)."' and status=0") or die(mysql_error());//update transaction table to be used for generating receipt.

if(!mysql_affected_rows()){
	echo "not found/already updated";
	exit;
}



mysql_query("insert into receipts set AmountPaid= '".mysql_escape_string((string)$transaction->AmountPaid)."'  
,BankReceipt= '".mysql_escape_string((string)$transaction->BankReceipt)."'  
,BankReceiptDateTime= '".mysql_escape_string((string)$transaction->BankReceiptDateTime)."'  
,CountryCode= '".mysql_escape_string((string)$transaction->CountryCode)."'  
,CountryName= '".mysql_escape_string((string)$transaction->CountryName)."'  
,CurrencyCode= '".mysql_escape_string((string)$transaction->CurrencyCode)."'  
,CurrencyName= '".mysql_escape_string((string)$transaction->CurrencyName)."'  
,EndDateTime= '".mysql_escape_string((string)$transaction->EndDateTime)."'  
,ErrorCode= '".mysql_escape_string((string)$transaction->ErrorCode)."'  
,ErrorMessage= '".mysql_escape_string((string)$transaction->ErrorMessage)."'  
,EstablishedDateTime= '".mysql_escape_string((string)$transaction->EstablishedDateTime)."'  
,FinancialInstitutionCode= '".mysql_escape_string((string)$transaction->FinancialInstitutionCode)."'  
,FinancialInstitutionCountryCode= '".mysql_escape_string((string)$transaction->FinancialInstitutionCountryCode)."'  
,FinancialInstitutionName= '".mysql_escape_string((string)$transaction->FinancialInstitutionName)."'  
,MerchantAcctName= '".mysql_escape_string((string)$transaction->MerchantAcctName)."'  
,MerchantAcctNumber= '".mysql_escape_string((string)$transaction->MerchantAcctNumber)."'  
,MerchantAcctSortCode= '".mysql_escape_string((string)$transaction->MerchantAcctSortCode)."'  
,MerchantAcctSuffix= '".mysql_escape_string((string)$transaction->MerchantAcctSuffix)."'  
,MerchantDefinedData= '".mysql_escape_string((string)$transaction->MerchantDefinedData)."'  
,MerchantEstablishedDateTime= '".mysql_escape_string((string)$transaction->MerchantEstablishedDateTime)."'  
,MerchantReference= '".mysql_escape_string((string)$transaction->MerchantReference)."'  
,PaymentAmount= '".mysql_escape_string((string)$transaction->PaymentAmount)."'  
,StartDateTime= '".mysql_escape_string((string)$transaction->StartDateTime)."'  
,TransactionID= '".mysql_escape_string((string)$transaction->TransactionID)."'  
,TransactionRefNo= '".mysql_escape_string((string)$transaction->TransactionRefNo)."'");  
echo "done";
}
