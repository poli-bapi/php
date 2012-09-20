<?php

class Error extends SimpleXMLElement {
	var $Code;
	//string
	var $Field;
	//string
	var $Message;
	//string
}

class TransactionPlusByTransactionRefNo {
	var $AmountPaid;
	//decimal
	var $BankReceiptDateTime;
	//string
	var $BankReceiptNo;
	//string
	var $CountryCode2;
	//string
	var $CountryName;
	//string
	var $CurrencyCode;
	//string
	var $CurrencyName;
	//string
	var $EndDateTime;
	//dateTime
	var $ErrorCode;
	//string
	var $ErrorMessage;
	//string
	var $EstablishedDateTime;
	//dateTime
	var $FinancialInstitutionCode;
	//string
	var $FinancialInstitutionCountryCode;
	//string
	var $FinancialInstitutionName;
	//string
	var $IsExpired;
	//boolean
	var $IsValidIP;
	//boolean
	var $MerchantAcctName;
	//string
	var $MerchantAcctNumber;
	//string
	var $MerchantAcctSortCode;
	//string
	var $MerchantAcctSuffix;
	//string
	var $MerchantDefinedData;
	//string
	var $MerchantEntityID;
	//guid
	var $MerchantEstablishedDateTime;
	//dateTime
	var $MerchantReference;
	//string
	var $POLiVersionCode;
	//string
	var $POLiVersionID;
	//guid
	var $PayerAcctNumber;
	//string
	var $PayerAcctSortCode;
	//string
	var $PayerAcctSuffix;
	//string
	var $PaymentAmount;
	//decimal
	var $StartDateTime;
	//dateTime
	var $TransactionID;
	//guid
	var $TransactionRefNo;
	//string
	var $TransactionStatus;
	//string
	var $TransactionStatusCode;
	//string
	var $UserIPAddress;
	//string
}

class InitiateTransactionInput {
	var $CurrencyAmount;
	//decimal
	var $CurrencyCode;
	//string
	var $MerchantCheckoutURL;
	//string
	var $MerchantCode;
	//string
	var $MerchantData;
	//string
	var $MerchantDateTime;
	//dateTime
	var $MerchantHomePageURL;
	//string
	var $MerchantRef;
	//string
	var $NotificationURL;
	//string
	var $SelectedFICode;
	//string
	var $SuccessfulURL;
	//string
	var $Timeout;
	//int
	var $UnsuccessfulURL;
	//string
	var $UserIPAddress;
	//string
}

class InitiateTransactionOutput extends SimpleXMLElement {
	var $NavigateURL;
	//string
	var $TransactionRefNo;
	//string
	var $TransactionToken;
	//string
}

/*FinancialInstutions*/

class FinancialInstitution extends SimpleXMLElement {
	var $FinancialInstitutionCode;
	//string
	var $FinancialInstitutionName;
	//string
}

/*GetTransaction*/

class Transaction extends SimpleXMLElement {
	var $AmountPaid;
	//decimal
	var $BankReceipt;
	//string
	var $BankReceiptDateTime;
	//string
	var $CountryCode;
	//string
	var $CountryName;
	//string
	var $CurrencyCode;
	//string
	var $CurrencyName;
	//string
	var $EndDateTime;
	//dateTime
	var $ErrorCode;
	//string
	var $ErrorMessage;
	//string
	var $EstablishedDateTime;
	//dateTime
	var $FinancialInstitutionCode;
	//string
	var $FinancialInstitutionCountryCode;
	//string
	var $FinancialInstitutionName;
	//string
	var $MerchantAcctName;
	//string
	var $MerchantAcctNumber;
	//string
	var $MerchantAcctSortCode;
	//string
	var $MerchantAcctSuffix;
	//string
	var $MerchantDefinedData;
	//string
	var $MerchantEstablishedDateTime;
	//dateTime
	var $MerchantReference;
	//string
	var $PaymentAmount;
	//decimal
	var $StartDateTime;
	//dateTime
	var $TransactionID;
	//guid
	var $TransactionRefNo;
	//string
}

/*DailyTransactions */

class GetDailyTransactionsRequest {
	var $EstablishedDate;
	//dateTime
	var $TransactionStatusCode;
	//string
}

class DailyTransaction extends SimpleXMLElement {
	var $AmountPaid;
	//decimal
	var $BankReceiptNo;
	//string
	var $CurrencyCode;
	//string
	var $CurrencyName;
	//string
	var $EndDateTime;
	//dateTime
	var $EstablishedDateTime;
	//dateTime
	var $FinancialInstitutionCode;
	//string
	var $FinancialInstitutionName;
	//string
	var $MerchantCode;
	//string
	var $MerchantCommonName;
	//string
	var $MerchantDefinedData;
	//string
	var $MerchantReference;
	//string
	var $PayerAcctNumber;
	//string
	var $PayerAcctSortCode;
	//string
	var $PayerAcctSuffix;
	//string
	var $PaymentAmount;
	//decimal
	var $TransactionRefNo;
	//string
	var $TransactionStatus;
	//string
	var $TransactionStatusCode;
	//string
}

class GetDailyTransactionsResponse {
	/**
	 *
	 * @var GetDailyTransactionsResult
	 */
	var $GetDailyTransactionsResult;
}

/*GetdailyTransactionCsv*/

class GetDailyTransactionsCSVRequest {
	var $EstablishedDate;
	//date
	var $TransactionStatusCode;
}

/*Detailed Transaction */

class DetailedTransaction extends SimpleXMLElement {
	var $AmountPaid;
	//decimal
	var $BankReceiptNo;
	//string
	var $CurrencyCode;
	//string
	var $CurrencyName;
	//string
	var $EndDateTime;
	//dateTime
	var $EstablishedDateTime;
	//dateTime
	var $FailureReason;
	//string
	var $FinancialInstitutionCode;
	//string
	var $FinancialInstitutionName;
	//string
	var $MerchantCode;
	//string
	var $MerchantCommonName;
	//string
	var $MerchantDefinedData;
	//string
	var $MerchantReference;
	//string
	var $PayerAcctNumber;
	//string
	var $PayerAcctSortCode;
	//string
	var $PayerAcctSuffix;
	//string
	var $PaymentAmount;
	//decimal
	var $TransactionRefNo;
	//string
	var $TransactionStatus;
	//string
	var $TransactionStatusCode;
	//string
	var $UserIPAddress;
	//string
	var $UserPlatform;
	//string
}

class GetDetailedTransactionRequest {
	var $IncludeSteps;
	//boolean
	var $MerchantReference;
	//string
	var $TransactionRefNo;
	//string
}

class TransactionStepsList extends SimpleXMLElement {
	var $CreatedDateTime;
	//dateTime
	var $TransactionStepTypeName;
	//string
}

/**
 * class PoliRestClient
 *
 *
 */

final class PoliRestClient {

	var $MerchantCode;
	var $AuthenticationCode;
	var $test;

	/**
	 *
	 * @param string $merchantcode
	 * @param string $authcode
	 * @param boolean $test
	 */
	public function PoliRestClient($merchantcode, $authcode, $test = true) {
		$this -> MerchantCode = $merchantcode;
		$this -> AuthenticationCode = htmlentities($authcode);
		$this -> test = $test;
		libxml_use_internal_errors(true);
	}

	private function post($url, $data) {
		$ch = curl_init();

		$data = preg_replace("/[\r\n]/", '', $data);

		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Accept: text/xml'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_VERBOSE, "1");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: text/xml"));

		$response = curl_exec($ch);
		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		if ($response === false) {
			throw new Exception("A fatal unexpected error occurred when communicating with RT.");
		}

		if ($code != 200) {
			throw new Exception("An error occurred : [$code] :: $response");
		}

		return $response;
	}

	/**
	 *
	 * @param string $token
	 * @param $errorout
	 * @param string $code
	 * @return Transaction
	 */
	function getTransaction($token, &$errorout, &$code) {

		if ($this -> test) {
			$url = 'https://merchantapi.apac-test.paywithpoli.com/MerchantAPIService.svc/Xml/transaction/query';
		} else
			$url = 'https://merchantapi.apac.paywithpoli.com/MerchantAPIService.svc/Xml/transaction/query';

		$str = <<<HTML
<GetTransactionRequest xmlns="http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.Contracts" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
<AuthenticationCode>{$this->AuthenticationCode}</AuthenticationCode>
<MerchantCode>{$this->MerchantCode}</MerchantCode>
<TransactionToken>$token</TransactionToken>
</GetTransactionRequest>
HTML;
		$str = $this -> post($url, $str);
		$xml = simplexml_load_string($str, null, LIBXML_NOERROR);
		;//,'InitiateTransactionResult');
		//print_r($xml->Transaction);
		libxml_use_internal_errors(true);
		$xml -> registerXPathNamespace('m', 'http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.Contracts');

		$xml -> registerXPathNamespace('a', 'http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.DCO');

		$errors = $xml -> xpath("//m:Errors/a:Error");
		if (is_array($errors)) {
			$errorout = array();
			$l = count($errors);
			if ($l) {
				for ($i = 0; $i < $l; $i++) {
					$xml = simplexml_load_string($errors[$i] -> asXML(), 'Error', LIBXML_NOERROR, null);
					/* @var $xml Error */
					$errorout[] = $xml;
				}
				return null;
			}
		} else {
			return null;
		}
		$code = (string)$xml -> TransactionStatusCode;

		$el = array_shift($xml -> xpath("//m:Transaction"));

		/* @var $el SimpleXMLElement */
		$xml = simplexml_load_string($el -> asXML(), 'Transaction', null, 'a', true);

		return $xml;

	}

	/**
	 * @param GetDailyTransactionsRequest $request
	 * @param $errorout
	 * @return array
	 * array of DailyTransaction object.
	 */
	function getDailyTransactions($request, &$errorout) {
		if ($this -> test) {
			$url = 'https://merchantapi.apac-test.paywithpoli.com/merchantapiservice.svc/Xml/transaction/daily';
		} else
			$url = 'https://merchantapi.apac.paywithpoli.com/merchantapiservice.svc/Xml/transaction/daily';

		$str = <<<HTML
<GetDailyTransactionsRequest xmlns="http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.Contracts" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
<AuthenticationCode>{$this->AuthenticationCode}</AuthenticationCode>
<MerchantCode>{$this->MerchantCode}</MerchantCode>
<EstablishedDate>$request->EstablishedDate</EstablishedDate>
<TransactionStatusCode>$request->TransactionStatusCode</TransactionStatusCode>
</GetDailyTransactionsRequest>
HTML;
		$str = $this -> post($url, $str);
		$xml = simplexml_load_string($str, null);
		;//,'InitiateTransactionResult');
		//print_r($xml->Transaction);
		libxml_use_internal_errors(true);
		$xml -> registerXPathNamespace('m', 'http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.Contracts');
		$xml -> registerXPathNamespace('a', 'http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.DCO');

		$errors = $xml -> xpath("//m:Errors/a:Error");
		if (is_array($errors)) {
			$l = count($errors);
			if ($l) {
				$errorout = array();
				for ($i = 0; $i < $l; $i++) {
					$xml = simplexml_load_string($errors[$i] -> asXML(), 'Error', LIBXML_NOERROR, null);
					/* @var $xml Error */
					$errorout[] = $xml;
				}
				return null;
			}
		} else {
			return null;
		}

		$tss = array();

		foreach ($xml->xpath("//m:DailyTransactionList/a:DailyTransaction") as $el) {

			$xml1 = simplexml_load_string($el -> asXML(), 'DailyTransaction');
			$tss[] = $xml1;
		}
		return $tss;
	}

	/**
	 * @param GetDailyTransactionsCSVRequest $request
	 * @param mixed $errorout
	 * @return string
	 * returns string containing csv data
	 */
	function getDailyTransactionsCSV($request, &$errorout) {
		if ($this -> test) {
			$url = 'https://merchantapi.apac-test.paywithpoli.com/merchantapiservice.svc/Xml/transaction/daily/csv';
		} else
			$url = 'https://merchantapi.apac.paywithpoli.com/merchantapiservice.svc/Xml/transaction/daily/csv';

		$str = <<<HTML
<GetDailyTransactionsCSVRequest xmlns="http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.Contracts" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
<AuthenticationCode>{$this->AuthenticationCode}</AuthenticationCode>
<MerchantCode>{$this->MerchantCode}</MerchantCode>
<EstablishedDate>$request->EstablishedDate</EstablishedDate>
<TransactionStatusCode>$request->TransactionStatusCode</TransactionStatusCode>
</GetDailyTransactionsCSVRequest>
HTML;
		libxml_use_internal_errors(false);
		$xml = simplexml_load_string($str);
		print_r($xml);
		$str = $this -> post($url, $str);
		$xml = simplexml_load_string($str, null);
		;//,'InitiateTransactionResult');
		//print_r($xml->Transaction);
		libxml_use_internal_errors(true);
		$xml -> registerXPathNamespace('m', 'http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.Contracts');

		$xml -> registerXPathNamespace('a', 'http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.DCO');

		$errors = $xml -> xpath("//m:Errors/a:Error");
		if (is_array($errors)) {
			$l = count($errors);
			if ($l) {
				$errorout = array();
				for ($i = 0; $i < $l; $i++) {
					$xml = simplexml_load_string($errors[$i] -> asXML(), 'Error', LIBXML_NOERROR, null);
					/* @var $xml Error */
					$errorout[] = $xml;
				}
				return null;
			}
		} else {
			return null;
		}
		return $xml -> CSVData;

	}

	/**
	 * @param GetDetailedTransactionRequest $request
	 * @param $errorout
	 * @return array('DetailedTransaction'=>DetailedTransaction,'TransactionStepList'=>TransactionStepsList)
	 * returns null on error.
	 */

	function getDetailedTransaction($request, &$errorout) {
		if ($this -> test) {
			$url = 'https://merchantapi.apac-test.paywithpoli.com/merchantapiservice.svc/Xml/transaction/detail';
		} else
			$url = 'https://merchantapi.apac.paywithpoli.com/merchantapiservice.svc/Xml/transaction/detail';

		$str = <<<HTML
<GetDetailedTransactionRequest xmlns="http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.Contracts" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
<AuthenticationCode>{$this->AuthenticationCode}</AuthenticationCode>
<MerchantCode>{$this->MerchantCode}</MerchantCode>
<IncludeSteps>$request->IncludeSteps</IncludeSteps>
<MerchantReference>$request->MerchantReference</MerchantReference>
<TransactionRefNo>$request->TransactionRefNo</TransactionRefNo>
</GetDetailedTransactionRequest>
HTML;
		$str = $this -> post($url, $str);

		$xml = simplexml_load_string($str, null);
		;//,'InitiateTransactionResult');
		//print_r($xml->Transaction);
		libxml_use_internal_errors(true);
		$xml -> registerXPathNamespace('m', 'http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.Contracts');

		$xml -> registerXPathNamespace('a', 'http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.DCO');

		$errors = $xml -> xpath("//m:Errors/a:Error");
		if (is_array($errors)) {

			$l = count($errors);
			if ($l) {
				$errorout = array();
				for ($i = 0; $i < $l; $i++) {
					$xml = simplexml_load_string($errors[$i] -> asXML(), 'Error', LIBXML_NOERROR, null);
					/* @var $xml Error */
					$errorout[] = $xml;
				}
				return null;
			}
		} else {
			return null;
		}

		$el = array_shift($xml -> xpath("//m:DetailedTransaction"));

		/* @var $el SimpleXMLElement */
		$xml1 = simplexml_load_string($el -> asXML(), 'DetailedTransaction', null, 'a', true);

		$el = array_shift($xml -> xpath("//m:TransactionStepList"));

		$xml2 = simplexml_load_string($el -> asXML(), 'TransactionStepsList', null, 'a', true);
		$tss = array();
		foreach ($xml2->TransactionStepsList as $ts) {
			$tss[] = $ts;
		}

		return array('DetailedTransaction' => $xml1, 'TransactionStepList' => $tss);

	}

	/**
	 * @param $errorout
	 * @return array
	 * array of financial institution object.
	 */

	function getfinancialinstitutions(&$errorout) {
		if ($this -> test) {
			$url = 'https://merchantapi.apac-test.paywithpoli.com/MerchantAPIService.svc/Xml/banks';
		} else
			$url = 'https://merchantapi.apac.paywithpoli.com/MerchantAPIService.svc/Xml/banks';

		$str = <<<HTML
<?xml version="1.0" encoding="utf-8"?>
<GetFinancialInstitutionsRequest xmlns="http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.Contracts" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
<AuthenticationCode>{$this->AuthenticationCode}</AuthenticationCode>
<MerchantCode>{$this->MerchantCode}</MerchantCode>
</GetFinancialInstitutionsRequest>
HTML;
		$str = $this -> post($url, $str);
		$xml = simplexml_load_string($str, null, LIBXML_NSCLEAN);
		;//,'InitiateTransactionResult');
		//print_r($xml->Transaction);
		$xml -> registerXPathNamespace('m', 'http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.Contracts');

		$xml -> registerXPathNamespace('a', 'http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.DCO');

		$errors = $xml -> xpath("//m:Errors/a:Error");
		if (is_array($errors)) {
			$l = count($errors);
			if ($l) {
				for ($i = 0; $i < $l; $i++) {
					$xml = simplexml_load_string($errors[$i] -> asXML(), 'Error', LIBXML_NOERROR | LIBXML_NSCLEAN, null);
					/* @var $xml ErrorXML */
					$errorout = $xml;
					return null;
				}
			}
		} else {
			return null;
		}

		//		$el=array_shift($xml->xpath("//m:FinancialInstitutionList/FinancialInstution"));
		$fins = array();

		foreach ($xml->xpath("//m:FinancialInstitutionList/a:FinancialInstitution") as $el) {
			$xml1 = simplexml_load_string($el -> asXML(), 'FinancialInstitution');
			/* @var $fin FinancialInstitution */
			$fins[] = $xml1;
		}
		return $fins;

	}

	/**
	 *
	 * @param InitiateTransactionInput  $input
	 *
	 * @param $error
	 * @param string $code
	 * transaction status code
	 *
	 * @return InitiateTransactionOutput
	 * only $input to be passed as non null, rest passed as  null and used for output.
	 */
	function initiatetransaction($input, &$errorout, &$code) {

		if ($this -> test) {
			$url = "https://merchantapi.apac-test.paywithpoli.com/MerchantAPIService.svc/Xml/transaction/initiate";
		} else {
			$url = "https://merchantapi.apac.paywithpoli.com/MerchantAPIService.svc/Xml/transaction/initiate";
		}

		$str = <<<HTML
<InitiateTransactionRequest xmlns="http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.Contracts" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
<AuthenticationCode>{$this->AuthenticationCode}</AuthenticationCode>
<Transaction xmlns:dco="http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.DCO">
<dco:CurrencyAmount>$input->CurrencyAmount</dco:CurrencyAmount>
<dco:CurrencyCode>$input->CurrencyCode</dco:CurrencyCode>
<dco:MerchantCheckoutURL>$input->MerchantCheckoutURL</dco:MerchantCheckoutURL>
<dco:MerchantCode>{$this->MerchantCode}</dco:MerchantCode>
<dco:MerchantData>$input->MerchantData</dco:MerchantData>
<dco:MerchantDateTime>$input->MerchantDateTime</dco:MerchantDateTime>
<dco:MerchantHomePageURL>$input->MerchantHomePageURL</dco:MerchantHomePageURL>
<dco:MerchantRef>$input->MerchantRef</dco:MerchantRef>
<dco:NotificationURL>$input->NotificationURL</dco:NotificationURL>
HTML;

		if ($input -> SelectedFICode) {
			$str .= '<dco:SelectedFICode>' . $input -> SelectedFICode . '</dco:SelectedFICode>';

		} else {
			$str .= '<dco:SelectedFICode i:nil="true"/>';
		}
		$str .= <<<HTML
<dco:SuccessfulURL>$input->SuccessfulURL</dco:SuccessfulURL>
<dco:Timeout>$input->Timeout</dco:Timeout>
<dco:UnsuccessfulURL>$input->UnsuccessfulURL</dco:UnsuccessfulURL>
<dco:UserIPAddress>$input->UserIPAddress</dco:UserIPAddress>
</Transaction>
</InitiateTransactionRequest>
HTML;
		$str = $this -> post($url, $str);

		$xml = simplexml_load_string($str, null);
		;//,'InitiateTransactionResult');
		//print_r($xml->Transaction);
		$xml -> registerXPathNamespace('m', 'http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.Contracts');

		$xml -> registerXPathNamespace('a', 'http://schemas.datacontract.org/2004/07/Centricom.POLi.Services.MerchantAPI.DCO');

		$errors = $xml -> xpath("//m:Errors/a:Error");

		if (is_array($errors)) {
			$l = count($errors);
			if ($l) {
				$errorout = array();
				for ($i = 0; $i < $l; $i++) {
					$xml = simplexml_load_string($errors[$i] -> asXML(), 'Error', LIBXML_NOERROR | LIBXML_NSCLEAN);
					/* @var $xml Error */
					$errorout[] = $xml;
				}
				return null;
			}
		} else {
			return null;
		}

		$el = array_shift($xml -> xpath("//m:TransactionStatusCode"));

		$el = array_shift($xml -> xpath("//m:Transaction"));

		/* @var $el SimpleXMLElement */
		$txml = simplexml_load_string($el -> asXML(), 'InitiateTransactionOutput', null, 'a', true);
		/* @var $txml InitiateTransactionOutput */
		$code = (string)$xml -> TransactionStatusCode;
		return $txml;

	}

}
