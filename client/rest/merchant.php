<?php
$transactions=array();
if(isset($_POST['csv'])){
require_once('constants.php');
require_once('classes.php');
$client=new PoliRestClient(MERCHANT_CODE,AUTHENTICATION_CODE,1);

$request=new GetDailyTransactionsRequest();
$date=date("Y-m-d\TH:i:s",strtotime($_REQUEST['day']));

$request->EstablishedDate=$date;

if(isset($_POST['status'])){
	$sts=array();
	foreach($_POST['status'] as $st){
		if($st)
			$sts[]=$st;
	}
	if(count($sts))
		$request->TransactionStatusCode=implode(',',$sts);
}



$result=$client->getDailyTransactionsCSV($request, $errorout);
if(isset($errorout)&&count($errorout)){
	
	foreach ($errorout as $error) {
		
		print_r((string)$error->Message);
		
	}
	exit;
}



echo $result;



exit;
}

 if(isset($_POST['submit'])&&$_POST['submit']){


require_once('constants.php');
require_once('classes.php');
$client=new PoliRestClient(MERCHANT_CODE,AUTHENTICATION_CODE,1);

$request=new GetDailyTransactionsRequest();



$date=date("Y-m-d\TH:i:s",strtotime($_REQUEST['day']));
$request->EstablishedDate=$date;

if(isset($_POST['status'])){
	$sts=array();
	foreach($_POST['status'] as $st){
		if($st)
			$sts[]=$st;
	}
	if(count($sts))
		$request->TransactionStatusCode=implode(',',$sts);
}

$transactions=$client->getDailyTransactions($request, $errorout);
if(isset($errorout)&&count($errorout)){
	
	foreach ($errorout as $error) {
		
		print_r((string)$error->Message);
		
	}
	exit;
}


}?>
<?php
$codes=array('','Initiated',
'FinancialInstitutionSelected',
'EULAAccepted',
'InProcess',
'Completed',
'Unknown',
'Failed',
'ReceiptUnverified',
'Cancelled',
'TimedOut');
?>

<html>
<head>
</head>

<body>
<h4>Daily Transaction Report</h4>
<form method="POST" >Date:<input type="text" name="day" value="<?php echo date('Y-m-d H:i:s')?>"/>
<select name='status[]' multiple="multiple">
<?php foreach($codes as $c){
echo "<option value='$c'>$c</option>";
 }?>
</select>
<input type="submit" name="submit" value="submit"/><input type="submit" name="csv" value="CSV Report"/>
</form>
<table>
<tr>
<th>TransactionReference</th><th>MerchantRef</th<th>AmountPaid</th><th>BankReceiptNo</th><th>CurrencyCode</th><th>CurrencyName</th><th>EndDateTime</th><th>EstablishedDateTime</th><th>FinancialInstitutionCode</th><th>FinancialInstitutionName</th><th>MerchantCode</th><th>MerchantCommonName</th><th>MerchantDefinedData</th><th>PayerAcctNumber</th><th>PayerAcctSortCode</th><th>PayerAcctSuffix</th><th>PaymentAmount</th><th>TransactionStatus</th><th>TransactionStatusCode</th></tr>
<?php
/* @var $transaction DailyTransaction */
foreach((array)$transactions as $transaction):

?>
<tr><td><a href="transaction.php?tref=<?php echo $transaction->TransactionRefNo  ?>"><?php echo $transaction->TransactionRefNo?></a></td><td><a href="transaction.php?mref=<?php echo $transaction->MerchantReference?>"></td>

<td><?php echo $transaction->AmountPaid?></td><td><?php echo $transaction->BankReceiptNo?></td><td><?php echo $transaction->CurrencyCode?></td><td><?php echo $transaction->CurrencyName?></td><td><?php echo $transaction->EndDateTime?></td><td><?php echo $transaction->EstablishedDateTime?></td><td><?php echo $transaction->FinancialInstitutionCode?></td><td><?php echo $transaction->FinancialInstitutionName?></td><td><?php echo $transaction->MerchantCode?></td><td><?php echo $transaction->MerchantCommonName?></td><td><?php echo $transaction->MerchantDefinedData?></td><td><?php echo $transaction->PayerAcctNumber?></td><td><?php echo $transaction->PayerAcctSortCode?></td><td><?php echo $transaction->PayerAcctSuffix?></td><td><?php echo $transaction->PaymentAmount?></td><td><?php echo $transaction->TransactionStatus?></td><td><?php echo $transaction->TransactionStatusCode?></td></tr>





<?php endforeach;?>
<?php if(isset($empty)) echo "<tr><td>No transaction found</td></tr>"?>
</table>
</body>
</html>