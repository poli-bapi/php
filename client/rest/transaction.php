<?php
require_once('constants.php');
require_once('classes.php');
$client=new PoliRestClient(MERCHANT_CODE,AUTHENTICATION_CODE,1);

$errorout=null;

$request=new GetDetailedTransactionRequest();

if(isset($_GET['mref']))
$request->MerchantReference=$_GET['mref'];
if(isset($_GET['tref']))
$request->TransactionRefNo=$_GET['tref'];
$request->IncludeSteps=true;

$result= $client->getDetailedTransaction($request, $errorout);

$tls=$result['TransactionStepList'];
$transaction=$result['DetailedTransaction'];

if(isset($errorout)&&count($errorout)){
	
	foreach ($errorout as $error) {
		
		print_r((string)$error->Message);
		
	}
	exit;
}



?>

<table>
<tr><th>AmountPaid</th><td><?php echo $transaction->AmountPaid?></td></tr>
<tr><th>BankReceiptNo</th><td><?php echo $transaction->BankReceiptNo?></td></tr>
<tr><th>CurrencyCode</th><td><?php echo $transaction->CurrencyCode?></td></tr>
<tr><th>CurrencyName</th><td><?php echo $transaction->CurrencyName?></td></tr>
<tr><th>EndDateTime</th><td><?php echo $transaction->EndDateTime?></td></tr>
<tr><th>EstablishedDateTime</th><td><?php echo $transaction->EstablishedDateTime?></td></tr>
<tr><th>FailureReason</th><td><?php echo $transaction->FailureReason?></td></tr>
<tr><th>FinancialInstitutionCode</th><td><?php echo $transaction->FinancialInstitutionCode?></td></tr>
<tr><th>FinancialInstitutionName</th><td><?php echo $transaction->FinancialInstitutionName?></td></tr>
<tr><th>MerchantCode</th><td><?php echo $transaction->MerchantCode?></td></tr>
<tr><th>MerchantCommonName</th><td><?php echo $transaction->MerchantCommonName?></td></tr>
<tr><th>MerchantDefinedData</th><td><?php echo $transaction->MerchantDefinedData?></td></tr>
<tr><th>MerchantReference</th><td><?php echo $transaction->MerchantReference?></td></tr>
<tr><th>PayerAcctNumber</th><td><?php echo $transaction->PayerAcctNumber?></td></tr>
<tr><th>PayerAcctSortCode</th><td><?php echo $transaction->PayerAcctSortCode?></td></tr>
<tr><th>PayerAcctSuffix</th><td><?php echo $transaction->PayerAcctSuffix?></td></tr>
<tr><th>PaymentAmount</th><td><?php echo $transaction->PaymentAmount?></td></tr>
<tr><th>TransactionRefNo</th><td><?php echo $transaction->TransactionRefNo?></td></tr>
<tr><th>TransactionStatus</th><td><?php echo $transaction->TransactionStatus?></td></tr>
<tr><th>TransactionStatusCode</th><td><?php echo $transaction->TransactionStatusCode?></td></tr>
<tr><th>UserIPAddress</th><td><?php echo $transaction->UserIPAddress?></td></tr>
<tr><th>UserPlatform</th><td><?php echo $transaction->UserPlatform?></td></tr>
</table>
<table>
<caption>Transaction Step List</caption>
<thead>
<tr><th>Step Name</th><th>Created Date</th></tr>
</thead>
<tbody>
<?php /* @var $step TransactionStepsList */?>
<?php foreach($tls as $step):?>
 <tr><td><?php echo $step->TransactionStepTypeName?></td><td><?php echo $step->CreatedDateTime?></td></tr>
<?php endforeach;?>
</tbody>
</table>