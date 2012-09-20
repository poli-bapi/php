<?php  ob_start(); if(!session_start()) session_start();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
	Merchant ABCD - Receipt Page
</title>
<?php

require_once('constants.php');
mysql_connect(DBHOST,DBUSER,DBPASS);
mysql_select_db(DBNAME);

/* @var $transaction Transaction */
if(!isset($_SESSION['order'])){
echo "Invalid entry";
exit;
}
$order=$_SESSION['order'];
$wait=false;
$result=mysql_query("select * from receipts where MerchantReference='".mysql_escape_string($order)."' and MerchantDefinedData='".mysql_escape_string(session_id())."'") or die(mysql_error());
if(!mysql_num_rows($result)){
	$wait=true;
}else{
$transaction=mysql_fetch_object($result);unset($_SESSION['order'],$_SESSION['tref']);

}
?>


</head>
<?php
if($wait){ "<body>nudge not received. please reload the page after some time.</body></html>";
exit;}
?>
<body>

    <div class="receipt">
		<h1>Merchant ABCD - Receipt Page</h1>
        <h2>Transaction Receipt</h2>

		<p style="color:#ff0000;">Developer Note: Data will need to be populated from recipt data on this page</p>

        <fieldset class="fields">
            <legend>Transaction Details</legend>
            <ul>
                <li>
                    <span id="lblRefNum" class="label">Reference Number:</span>
                    <span id="lblRefNumValue" class="value"><?php echo $transaction->TransactionRefNo?></span>
                </li>
                <li>
                    <span id="lblPaymentAmount" class="label">Amount Due:</span>
                    <span id="lblPaymentAmountValue" class="value"><?php echo $transaction->CurrencyCode." ".$transaction->PaymentAmount ?></span>
                </li>
                <li>
                    <span id="lblMerchantCreateTime" class="label">Initiated at:</span>
                    <span id="lblMerchantCreateTimeValue" class="value"><?php echo $transaction->EstablishedDateTime?></span>
                </li>
            </ul>
        </fieldset>
        <br/>
        <fieldset class="fields">
            <legend>Payment Details</legend>
            <ul>
                <li>
                    <span id="lblPaidFrom" class="label">Merchant Reference</span>
                    <span id="lblPaidFromValue" class="value"><?php echo $transaction->CurrencyCode." ".$transaction->MerchantReference ?></span>
                </li>

            <li>
                    <span id="lblAmountPaid" class="label">Amount Paid:</span>
                    <span id="lblAmountPaidValue" class="value"><?php echo $transaction->AmountPaid?></span>
                </li>
                <!--
                <li>
                    <span id="lblPaidFrom" class="label">Paid From:</span>
                    <span id="lblPaidFromValue" class="value"><?php ?></span>
                </li>
                -->
                <li>
                    <span id="lblPaidToAcct" class="label">Paid To Account Name:</span>
                    <span id="lblPaidToAcctValue" class="value"><?php echo $transaction->MerchantAcctName?></span>
                </li>
                <li>
                    <span id="lblPaidToSortCode" class="label">Paid To Sort Code:</span>
                    <span id="lblPaidToSortCodeValue" class="value"><?php echo $transaction->MerchantAcctSortCode?></span>
                </li>
                <li>
                    <span id="lblPaidToAcctNo" class="label">Paid To Account Number:</span>
                    <span id="lblPaidToAcctNoValue" class="value"><?php echo $transaction->MerchantAcctNumber?></span>
                </li>
                <li id="liBankReceipt">
                    <span id="lblBankReceipt" class="label">Bank Receipt:</span>
                    <span id="lblBankReceiptValue" class="value"><?php echo $transaction->BankReceipt?></span>
                </li>
                <li id="liBankReceiptTime">
                    <span id="lblBankReceiptedAt" class="label">Bank Receipt Time:</span>
                    <span id="lblBankReceiptedAtValue" class="value"><?php echo $transaction->BankReceiptDateTime?></span>
                </li>
                <!--
                <li id="liObtainedFrom">
                    <span id="lblObtainedFrom" class="label">Obtained from:</span>
                    <span id="lblObtainedFromValue" class="value"></span>
                </li>-->
            </ul>
        </fieldset>

        <div class="print">
			<br/>
            <a href="javascript:window.print();">Print</a> this page for your records.
        </div>
    </div>
    </form>
</body>
</html>
