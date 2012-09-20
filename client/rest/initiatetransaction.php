<?php
ob_start();
if(!session_start())
	session_start();
if(!isset($_SESSION['order'])){
echo "merchant reference not present";
exit;
}

require_once('constants.php');
require_once('classes.php');
$client=new PoliRestClient(MERCHANT_CODE,AUTHENTICATION_CODE,1);

$errorout=null;

if(!isset($_POST['PaymentAmount']))
{
	echo "Payment amount required.";
	exit;
}
if(!isset($_POST['CurrencyCode'])){
	echo "Currency Code required.";
	exit;
}

$amt=$_POST['PaymentAmount'];
$currencycode=$_POST['CurrencyCode'];




$tr=new InitiateTransactionInput();
$tr->CurrencyAmount=number_format($amt,2,'.','');
$tr->CurrencyCode=$currencycode;
$tr->MerchantCode=MERCHANT_CODE;
$tr->MerchantData=session_id();
if($_POST['FinancialInstitutionCode'])
$tr->SelectedFICode=$_POST['FinancialInstitutionCode'];
else {
	$tr->SelectedFICode='';
}
$tr->MerchantRef= $_SESSION['order'];

$tr->NotificationURL= htmlentities(NOTIFYURL);
$tr->SuccessfulURL=htmlentities(SUCCESSFULURL);
$tr->UnsuccessfulURL=htmlentities(UNSUCCESSFULURL);
$tr->MerchantCheckoutURL=htmlentities(CHECKOUTURL);
$tr->MerchantHomePageURL=htmlentities(HOMEPAGE);
$tr->UserIPAddress=$_SERVER['REMOTE_ADDR'];
$tr->Timeout=1000;
$tr->MerchantDateTime= date("Y-m-d\TH:i:s");


$transaction=$client->initiatetransaction($tr, $errorout, $code);


if(isset($errorout)&&count($errorout)){
	
	foreach ($errorout as $error) {
		
		print_r((string)$error->Message);
		
	}
	exit;
}

if($code!='Initiated'&&$code!='FinancialInstitutionSelected'){
	
	echo "Invalid transaction";
exit;
}
mysql_connect(DBHOST,DBUSER,DBPASS);
mysql_select_db(DBNAME);


mysql_query("insert into transactions (token,refNo,amount,currency,orderno,status) values('".mysql_escape_string((string)$transaction->TransactionToken)."','".mysql_escape_string((string)$transaction->TransactionRefNo)."',".floatval($amt).",'".mysql_escape_string($currencycode)."','".mysql_escape_string($_SESSION['order'])."','initiated')") or die(mysql_error());
header("location: ".(string)$transaction->NavigateURL);


?>