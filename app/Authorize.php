<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class Authorize extends Model
{
    
    public function chargeCreditCard($amount, $card, $customer)
    {
    	// establish variables here
    	$expiration = $card['exp_year'].'-'.$card['exp_month'];

		/* Create a merchantAuthenticationType object with authentication details
	       retrieved from the constants file */
	    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
	    $merchantAuthentication->setName(env('AUTHORIZE_API_ID'));
	    $merchantAuthentication->setTransactionKey(env('AUTHORIZE_API_TOKEN'));
	    
	    // Set the transaction's refId
	    $refId = 'ref' . time();

	    // Create the payment data for a credit card
	    $creditCard = new AnetAPI\CreditCardType();
	    $creditCard->setCardNumber($card['card_number']);
	    $creditCard->setExpirationDate($expiration);
	    $creditCard->setCardCode($card['cvv']);

	    // Add the payment data to a paymentType object
	    $paymentOne = new AnetAPI\PaymentType();
	    $paymentOne->setCreditCard($creditCard);

	    // // Create order information
	    // $order = new AnetAPI\OrderType();
	    // $order->setInvoiceNumber($invoice->id);
	    // $order->setDescription("Sales");

	    // Set the customer's Bill To address
	    $customerAddress = new AnetAPI\CustomerAddressType();
	    $customerAddress->setFirstName($customer['first_name']);
	    $customerAddress->setLastName($customer['last_name']);
	    // $customerAddress->setCompany("");
	    $customerAddress->setAddress($customer['billing_street']);
	    $customerAddress->setCity($customer['billing_city']);
	    $customerAddress->setState($customer['billing_state']);
	    $customerAddress->setZip($customer['billing_zipcode']);
	    $customerAddress->setCountry("USA");

	    // Set the customer's identifying information
	    $customerData = new AnetAPI\CustomerDataType();
	    $customerData->setType("individual");
	    if(isset($customer['id'])) {
	    	$customerData->setId($customer['id']);
	    }
	    
	    $customerData->setEmail($customer['email']);

	    // Add values for transaction settings
	    $duplicateWindowSetting = new AnetAPI\SettingType();
	    $duplicateWindowSetting->setSettingName("duplicateWindow");
	    $duplicateWindowSetting->setSettingValue("60");

	    // Add some merchant defined fields. These fields won't be stored with the transaction,
	    // but will be echoed back in the response.
	    // $merchantDefinedField1 = new AnetAPI\UserFieldType();
	    // $merchantDefinedField1->setName("customerLoyaltyNum");
	    // $merchantDefinedField1->setValue("1128836273");

	    // $merchantDefinedField2 = new AnetAPI\UserFieldType();
	    // $merchantDefinedField2->setName("favoriteColor");
	    // $merchantDefinedField2->setValue("blue");

	    // Create a TransactionRequestType object and add the previous objects to it
	    $transactionRequestType = new AnetAPI\TransactionRequestType();
	    $transactionRequestType->setTransactionType("authCaptureTransaction");
	    $transactionRequestType->setAmount($amount);
	    // $transactionRequestType->setOrder($order);
	    $transactionRequestType->setPayment($paymentOne);
	    $transactionRequestType->setBillTo($customerAddress);
	    $transactionRequestType->setCustomer($customerData);
	    $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
	    // $transactionRequestType->addToUserFields($merchantDefinedField1);
	    // $transactionRequestType->addToUserFields($merchantDefinedField2);

	    // Assemble the complete transaction request
	    $request = new AnetAPI\CreateTransactionRequest();
	    $request->setMerchantAuthentication($merchantAuthentication);
	    $request->setRefId($refId);
	    $request->setTransactionRequest($transactionRequestType);

	    // Create the controller and get the response
	    $controller = new AnetController\CreateTransactionController($request);
	    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
	    
	    $results = ['status'=>false];
	    $check = false;
	    if ($response != null) {
	        // Check to see if the API request was successfully received and acted upon
	        if ($response->getMessages()->getResultCode() == "Ok") {
	            // Since the API request was successful, look for a transaction response
	            // and parse it to display the results of authorizing the card
	            $tresponse = $response->getTransactionResponse();
	        
	            if ($tresponse != null && $tresponse->getMessages() != null) {
	            	$transaction_id = $tresponse->getTransId();
	            	$transaction_response_code = $tresponse->getResponseCode();
	            	$transaction_auth_code = $tresponse->getAuthCode();
	            	$transaction_description = $tresponse->getMessages()[0]->getDescription();
	            	$results = [
	            		'status'=>true,
	            		'transaction_id'=>$transaction_id,
	            		'auth_code'=>$transaction_auth_code,
	            		'description'=>$transaction_description
	            	];
	            	$check = true;
	            } else { // Transaction Failed

	            	$error_code = $tresponse->getErrors()[0]->getErrorCode();
	            	$error_message = $tresponse->getErrors()[0]->getErrorText();
	            }
	            
	        } else { // Or, print errors if the API request wasn't successful 
	            $tresponse = $response->getTransactionResponse();
	        
	            if ($tresponse != null && $tresponse->getErrors() != null) {
	            	$error_code = $tresponse->getErrors()[0]->getErrorCode();
	            	$error_message = $tresponse->getErrors()[0]->getErrorText();
	            } else {
	                $error_code = $response->getMessages()->getMessage()[0]->getCode();
	                $error_message = $response->getMessages()->getMessage()[0]->getText();
	            }
	        }
	    } else {
	    	$error_code = 1;
	        $error_message = "No response returned";
	    }

	    if (!$check) {
	    	$results = [
        		'status'=>false,
        		'error_code'=>$error_code,
        		'error_message'=>$error_message
        	];
	    }


	    return $results;    	
    }
}
