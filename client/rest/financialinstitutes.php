<?php
ob_start();
require_once('constants.php');
require_once('classes.php');
$client=new PoliRestClient(MERCHANT_CODE,AUTHENTICATION_CODE,1);

$errorout=null;

$fins=$client->getfinancialinstitutions($errorout);

if($errorout){
	echo json_encode(array('error'=>(string)$errorout->Message));
	exit;
}
//print_r($fins);
ob_end_clean();
echo json_encode(array('options'=>(array)$fins));



