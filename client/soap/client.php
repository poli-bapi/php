<?php
require_once ('classmaps.php');
class PoliSoapClient {
	var $soapClient;
	var $Errors;
	private static $classmap = array('InitiateTransactionInput' => 'InitiateTransactionInput', 'ArrayOfError' => 'ArrayOfError', 'Error' => 'Error', 'TransactionPlusByTransactionRefNo' => 'TransactionPlusByTransactionRefNo'
	//, 'FinancialInstitutionList'=>'FinancialInstitutionList'

	,'MerchantApiFault' => 'MerchantApiFault', 'POLiBaseResponse' => 'POLiBaseResponse', 'BaseResponse' => 'BaseResponse', 'InitiateTransaction' => 'InitiateTransaction', 'InitiateTransactionRequest' => 'InitiateTransactionRequest', 'InitiateTransactionResult' => 'InitiateTransactionResult', 'InitiateTransactionOutput' => 'InitiateTransactionOutput', 'GetTransaction' => 'GetTransaction', 'GetTransactionRequest' => 'GetTransactionRequest', 'GetTransactionResult' => 'GetTransactionResult', 'Transaction' => 'Transaction', 'GetFinancialInstitutions' => 'GetFinancialInstitutions', 'GetFinancialInstitutionsRequest' => 'GetFinancialInstitutionsRequest'
	//, 'GetFinancialInstitutionsResponse'=>'GetFinancialInstitutionsResponse'
	,'GetFinancialInstitutionsResult' => 'GetFinancialInstitutionsResult', 'FinancialInstitution' => 'FinancialInstitution'
	//, 'FinancialInstitutionList'=>'FinancialInstitutionList'

	,'GetDetailedTransactionRequest' => 'GetDetailedTransactionRequest', 'GetDetailedTransactionResult' => 'GetDetailedTransactionResult', 'DetailedTransaction' => 'DetailedTransaction', 'TransactionStepsList' => 'TransactionStepsList'

	//, 'ArrayOfTransactionStepsList'=>'ArrayOfTransactionStepsList'

	,'GetTransactionPlusRequest' => 'GetTransactionPlusRequest', 'GetTransactionPlusResult' => 'GetTransactionPlusResult', 'GetDailyTransactionsCSVRequest' => 'GetDailyTransactionsCSVRequest', 'GetDailyTransactionsCSVResult' => 'GetDailyTransactionsCSVResult', 'GetDailyTransactionsCSV' => 'GetDailyTransactionsCSV', 'GetDailyTransactionsRequest' => 'GetDailyTransactionsRequest', 'GetDailyTransactionsResult' => 'GetDailyTransactionsResult', 'GetDailyTransactions' => 'GetDailyTransactions', 'ArrayOfDailyTransaction' => 'ArrayOfDailyTransaction', 'DailyTransaction' => 'DailyTransaction', 'ReportBaseRequest' => 'ReportBaseRequest', 'ReportBaseResponse' => 'ReportBaseResponse', 'Echo' => 'Echos', 'EchoResponse' => 'EchoResponse', 'GetTransactionPlus' => 'GetTransactionPlus', 'GetTransactionPlusResponse' => 'GetTransactionPlusResponse', 'GetDocumentation' => 'GetDocumentation', 'GetDocumentationResponse' => 'GetDocumentationResponse');

	function __construct($url = 'https://merchantapi.apac-test.paywithpoli.com/MerchantAPIService.svc?wsdl') {
		$this -> Errors = array();
		$this -> soapClient = new SoapClient($url, array("classmap" => self::$classmap, "trace" => true, "exceptions" => true, 'features' => SOAP_SINGLE_ELEMENT_ARRAYS));
	}

	function Echos($Echo) {

		$EchoResponse = $this -> soapClient -> Echo($Echo);
		return $EchoResponse;

	}

	/**
	 *@param  InitiateTransaction $InitiateTransaction
	 *@return InitiateTransactionResponse
	 */
	function InitiateTransaction($InitiateTransaction) {

		$InitiateTransactionResponse = $this -> soapClient -> InitiateTransaction($InitiateTransaction);

		return $InitiateTransactionResponse;
	}

	/**
	 *
	 * @param GetTransaction
	 * @return GetTransactionResponse
	 */

	function GetTransaction($GetTransaction) {

		$GetTransactionResponse = $this -> soapClient -> GetTransaction($GetTransaction);
		return $GetTransactionResponse;

	}

	function GetTransactionPlus($GetTransactionPlus) {

		$GetTransactionPlusResponse = $this -> soapClient -> GetTransactionPlus($GetTransactionPlus);
		return $GetTransactionPlusResponse;

	}

	/**
	 *
	 * @param GetFinancialInstitutions
	 * @return GetFinancialInstitutionsResponse
	 */
	function GetFinancialInstitutions($GetFinancialInstitutions) {

		$GetFinancialInstitutionsResponse = $this -> soapClient -> GetFinancialInstitutions($GetFinancialInstitutions);
		return $GetFinancialInstitutionsResponse;

	}

	function GetDocumentation($GetDocumentation) {

		$GetDocumentationResponse = $this -> soapClient -> GetDocumentation($GetDocumentation);
		return $GetDocumentationResponse;

	}

	/**
	 *
	 * @param GetDailyTransactions
	 * @return GetDailyTransactionsResponse
	 */
	function GetDailyTransactions($GetDailyTransactions) {

		$GetDailyTransactionsResponse = $this -> soapClient -> GetDailyTransactions($GetDailyTransactions);
		return $GetDailyTransactionsResponse;

	}

	/**
	 *
	 * @param  GetDailyTransactionsCSV
	 * @return GetDailyTransactionsCSVResponse
	 */
	function GetDailyTransactionsCSV($GetDailyTransactionsCSV) {

		$GetDailyTransactionsCSVResponse = $this -> soapClient -> GetDailyTransactionsCSV($GetDailyTransactionsCSV);
		return $GetDailyTransactionsCSVResponse;

	}

	/**
	 *
	 * @param GetDetailedTransaction
	 * @return GetDetailedTransactionResponse
	 */
	function GetDetailedTransaction($GetDetailedTransaction) {

		$GetDetailedTransactionResponse = $this -> soapClient -> GetDetailedTransaction($GetDetailedTransaction);
		return $GetDetailedTransactionResponse;

	}

}
