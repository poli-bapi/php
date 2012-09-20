<?php
class  PoliInput {
	var $AuthenticationCode;
	//string
	var $MerchantCode;
	//string

}

class ArrayOfError {
	var $Error;
	//Error
}

class Error {
	var $Code;
	//string
	var $Field;
	//string
	var $Message;
	//string
}

class MerchantApiFault {
	var $Description;
	//string
	var $ErrorCode;
	//int
	var $TransactionStatus;
	//string
}

class POLiBaseResponse {
	var $TransactionStatusCode;
	//string
}

class BaseResponse {
	var $Errors;
	//ArrayOfError
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

class GetTransactionPlusRequest {
	var $AuthenticationCode;
	//string
	var $MerchantCode;
	//string
	var $TransactionToken;
	//string
}

class GetTransactionPlusResult {
	/* @var $TransactionPlusByTransactionRefNo TransactionPlusByTransactionRefNo */
	var $TransactionPlusByTransactionRefNo;
	//TransactionPlusByTransactionRefNo
}

/*InitiateTransaction */

class InitiateTransaction {
	/**
	 * @var InitiateTransactionRequest
	 */

	var $request;
}

class InitiateTransactionRequest {
	var $AuthenticationCode;
	/**
	 * @var InitiateTransactionInput
	 */
	var $Transaction;
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

class InitiateTransactionResult {
	var $TransactionStatusCode;
	var $Errors;
	/**
	 * @var InitiateTransactionOutput
	 */
	var $Transaction;
	//InitiateTransactionOutput
}

class InitiateTransactionResponse {
	/**
	 *
	 * @var InitiateTransactionResult
	 */
	var $InitiateTransactionResult;
	//InitiateTransactionResponse
}

class InitiateTransactionOutput {
	var $NavigateURL;
	//string
	var $TransactionRefNo;
	//string
	var $TransactionToken;
	//string
}

/*FinancialInstutions*/
class GetFinancialInstitutions {
	/* @var GetFinancialInstitutionsRequest*/
	var $request;
}

class GetFinancialInstitutionsRequest {
	var $AuthenticationCode;
	//string
	var $MerchantCode;
	//string
}

class GetFinancialInstitutionsResult {
	var $TransactionStatusCode;
	var $Errors;
	var $FinancialInstitutionList;
}

class FinancialInstitutionList {
	var $FinancialInstitution;
	//array

}

class FinancialInstitution {
	var $FinancialInstitutionCode;
	//string
	var $FinancialInstitutionName;
	//string
}

class GetFinancialInstitutionsResponse {
	var $GetFinancialInstitutionsResult;
}

/*GetTransaction*/
class GetTransaction {
	/**
	 * @var GetTransactionRequest
	 *
	 */
	var $request;
}

class GetTransactionRequest {
	var $AuthenticationCode;
	//string
	var $MerchantCode;
	//string
	var $TransactionToken;
	//string
}

class GetTransactionResponse {
	/**
	 *
	 * @var GetTransactionPlusResult
	 */
	var $GetTransactionResult;
}

class GetTransactionResult {
	/**
	 *
	 * @var Transaction
	 */
	var $Transaction;
}

class Transaction {
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
class GetDailyTransactions {
	/**
	 *
	 * @var GetDailyTransactionsRequest
	 */
	var $request;
	//GetDailyTransactionsRequest
}

class GetDailyTransactionsRequest {
	var $AuthenticationCode;
	//string
	var $MerchantCode;
	//string
	var $EstablishedDate;
	//dateTime
	var $TransactionStatusCode;
	//string
}

class DailyTransaction {
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

class GetDailyTransactionsResult {
	var $DailyTransactionList;
}

class ArrayOfDailyTransaction {
	var $DailyTransaction;
	//DailyTransaction
}

class ReportBaseRequest {
	var $AuthenticationCode;
	//string
	var $MerchantCode;
	//string
}

class ReportBaseResponse {
}

/*GetdailyTransactionCsv*/

class GetDailyTransactionsCSV {
	/**
	 *
	 * @var GetDailyTransactionsCSVRequest
	 */
	var $request;
	//GetDailyTransactionsCSVRequest
}

class GetDailyTransactionsCSVRequest {
	var $AuthenticationCode;
	//string
	var $MerchantCode;
	//string
	var $EstablishedDate;
	//date
	var $TransactionStatusCode;
}

class GetDailyTransactionsCSVResponse {
	/**
	 *
	 * @var GetDailyTransactionsCSVResult
	 */
	var $GetDailyTransactionsCSVResult;
}

class GetDailyTransactionsCSVResult {
	var $CSVData;
	//string
}

/*Detailed Transaction */

class DetailedTransaction {
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

class GetDetailedTransaction {
	/**
	 *
	 * @var GetDetailedTransactionRequest
	 */
	var $request;
	//GetDetailedTransactionRequest
}

class GetDetailedTransactionRequest {
	var $AuthenticationCode;
	//string
	var $MerchantCode;
	//string
	var $IncludeSteps;
	//boolean
	var $MerchantReference;
	//string
	var $TransactionRefNo;
	//string
}

class GetDetailedTransactionResponse {
	/**
	 *
	 * @var GetDetailedTransactionResult
	 */
	var $GetDetailedTransactionResult;
}

class GetDetailedTransactionResult {

	/**
	 *
	 * @var DetailedTransaction
	 */
	var $DetailedTransaction;
	//DetailedTransaction
	/**
	 *
	 * @var TransactionStepsList
	 */
	var $TransactionStepList;
	//ArrayOfTransactionStepsList
}

class TransactionStepsList {
	var $CreatedDateTime;
	//dateTime
	var $TransactionStepTypeName;
	//string
}

class ArrayOfTransactionStepsList {
	var $TransactionStepsList;
	//TransactionStepsList
}

class Echos {
	var $message;
	//string
}

class EchoResponse {
	var $EchoResult;
	//string
}

class GetTransactionPlus {
	var $request;
	//GetTransactionPlusRequest
}

class GetDocumentation {
}

class GetDocumentationResponse {
	var $GetDocumentationResult;
	//StreamBody
}
