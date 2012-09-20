<?php
if(!session_start())
	session_start();
if(!isset($_SESSION['order'])){
	$order=$_SESSION['order']=time();

}else
	$order=$_SESSION['order'];
require_once('constants.php');
require_once('client.php');
$client=new PoliSoapClient();

$GetFinancialInstitutions=new GetFinancialInstitutions();
$request=new GetFinancialInstitutionsRequest();

$request->MerchantCode=MERCHANT_CODE;
$request->AuthenticationCode=AUTHENTICATION_CODE;
$GetFinancialInstitutions->request=$request;
try{
$GetFinancialInstitutionsResponse=$client->GetFinancialInstitutions($GetFinancialInstitutions);
$response=$GetFinancialInstitutionsResponse->GetFinancialInstitutionsResult;
if(isset($response->Errors->Error)&&!is_null($response->Errors->Error)){
	echo json_encode(array('error'=>$response->Errors->Error[0]->Message));
	exit;
}
echo json_encode(array('options'=>$response->FinancialInstitutionList->FinancialInstitution,'order'=>$order));



}catch(SoapFault $e){

}