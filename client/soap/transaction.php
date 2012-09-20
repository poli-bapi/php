<?php
require_once ('constants.php');
require_once ('client.php');

$client = new PoliSoapClient();

$GetDetailedTransaction = new GetDetailedTransaction();
$GetDetailedTransaction -> request = new GetDetailedTransactionRequest();
$GetDetailedTransaction -> request -> MerchantCode = MERCHANT_CODE;
$GetDetailedTransaction -> request -> AuthenticationCode = AUTHENTICATION_CODE;
$GetDetailedTransaction -> request -> IncludeSteps = true;
if (isset($_GET['mref']))
	$GetDetailedTransaction->request-> MerchantReference = $_GET['mref'];
if (isset($_GET['tref']))
	$GetDetailedTransaction->request-> TransactionRefNo = $_GET['tref'];

$response = $client -> GetDetailedTransaction($GetDetailedTransaction);
$result = $response -> GetDetailedTransactionResult;
if (isset($result -> Errors -> Error)) {
	foreach ($result->Errors->Error as $error) {
		print_r($error);
	}
	exit ;
}
$transaction = $result -> DetailedTransaction;
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
<?php /* @var $step TransactionStepsList */ ?>
<?php foreach($result->TransactionStepList->TransactionStepsList as $step):?>
 <tr><td><?php echo $step->TransactionStepTypeName?></td><td><?php echo $step->CreatedDateTime?></td></tr>
<?php endforeach; ?>
</tbody>
</table>