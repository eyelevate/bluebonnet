<?php

namespace App\Http\Controllers;

use App\Authorize;
use App\Company;
use App\Job;
use App\InventoryItem;
use App\ItemStone;
use App\Invoice;
use App\InvoiceItem;
use App\User;
use Illuminate\Http\Request;
use Mail;
use App\Mail\InvoicePending;
use App\Mail\InvoiceUserOrder;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Invoice $invoice)
    {
        $columns = $invoice->prepareTableColumns();
        $rows = $invoice->prepareTableRows();
        $invoiceDetails = $invoice->details(true);
        return view('invoices.index', compact(['columns','rows','invoiceDetails']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(InventoryItem $ii, Job $job)
    {
        $states = $job->prepareStates();
        $countries = $job->prepareCountries();
        $inventoryItems = $ii->prepareForShowInventory($ii->orderBy('name','asc')->get());
        return view('invoices.create',compact(['inventoryItems','states','countries']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice, Authorize $authorize)
    {
        
        $transaction_id = $invoice->transaction_id;
        flash('successfully cancelled invoice')->success();
        if (isset($transaction_id)) {
            $get_transaction_details = $authorize->getTransactionDetails($transaction_id);
            if (($get_transaction_details != null) && ($get_transaction_details->getMessages()->getResultCode() == "Ok")) {
                // start the void process
                switch ($get_transaction_details->getTransaction()->getTransactionStatus()) {
                    case 'settledSuccessfully': // Must refund
                        $refund = $authorize->refundTranscaction($invoice->total,$invoice->last_four,$invoice->exp_month,$invoice->exp_year);

                        if ($refund['status']) {
                            flash('Successfully refunded transaction.')->success();
                        } else {
                            flash($refund['reason'])->error();
                            return redirect()->back();
                        }
                        
                        break;
                    
                    default: // Must void
                        $void = $authorize->voidTransaction($transaction_id);
                        if ($void['status']) {
                            flash('Successfully voided transaction.')->success();
                        } else {
                            flash($void['reason'])->error();
                            return redirect()->back();
                        }
                        # code...
                        break;
                }
            } else {
                flash('There was an error get details of the transaction. Please speak to your administrator.')->error();
                // dd('error');
                return redirect()->back();
            }
            
        }

        if ($invoice->delete()) {
            return redirect()->back();
        }
    }

    public function refund(Request $request, Invoice $invoice, Authorize $authorize)
    {
        $transaction_id = $invoice->transaction_id;
        if (isset($transaction_id)) {
            $get_transaction_details = $authorize->getTransactionDetails($transaction_id);
            if (($get_transaction_details != null) && ($get_transaction_details->getMessages()->getResultCode() == "Ok")) {
                // start the void process
                switch ($get_transaction_details->getTransaction()->getTransactionStatus()) {
                    case 'settledSuccessfully': // Must refund
                        $refund = $authorize->refundTranscaction($invoice->total,$invoice->last_four,$invoice->exp_month,$invoice->exp_year);

                        if ($refund['status']) {
                            flash('Successfully refunded transaction.')->success();
                        } else {
                            flash($refund['reason'])->error();

                        }
                        
                        break;
                    
                    default: // Must void
                        $void = $authorize->voidTransaction($transaction_id);
                        if ($void['status']) {
                            flash('Successfully voided transaction.')->success();
                        } else {
                            flash($void['reason'])->error();

                        }
                        # code...
                        break;
                }
            } else {
                flash('There was an error get details of the transaction. Please speak to your administrator.')->error();
                // dd('error');
                
            }
            
        }
        return redirect()->back();
    }

    public function complete(Request $request, Invoice $invoice)
    {
        $update = $invoice->update(['status'=>5]);

        if ($update) {
            flash('Successfully completed invoice!')->success();
            return redirect()->back();
        }
    }

    public function sendEmail(Request $request, Invoice $invoice, Company $company)
    {
        // generate the email

        $company_info = $company->find(1);
        // generate the token page
        $token = bin2hex(random_bytes(20));
        $invoice->email_token = $token;

        if ($invoice->save()) {
            $invoice_single = $invoice->singleDetail($invoice);
            // dd('here');
            try{
                Mail::to($invoice_single->email)->send(new InvoicePending($invoice_single, $company_info));
                // All Done
                flash('Successfully send invoice email to customer!')->success();   
            } catch(\Exception $e) {
                flash($e->getMessage())->warning();
            }
        }
        return redirect()->back();
    }

    public function finish(Request $request, $token = null,Invoice $invoice, Job $job, InventoryItem $inventoryItem, ItemStone $itemStone)
    {
        $invs = $invoice->where('email_token',$token)->first();
        if (isset($invs) && isset($invs['email_token'])) {

            $invoice = $invoice->singleDetail($invs);
            $states = $job->prepareStates();
            $countries = $job->prepareCountries();
            $cart = $inventoryItem->prepareCartAdmin($invs);

            $totals = $inventoryItem->prepareTotalsAdmin($invs);
            $email = $itemStone->checkEmailAll($cart);
            session()->put('cart',$cart);
            return view('invoices.finish', compact(['totals','states','countries','cart','email','invoice']));
        } else {
            flash('This token has expired or does not belong to you. Please contact administrator to send a new email. Thank you.')->error();
            return redirect()->route('home');
        }
        
    }

    public function done(Request $request,Invoice $invoice, Authorize $authorize, Job $job, InventoryItem $inventoryItem, User $user, Company $company, InvoiceItem $invoiceItem, ItemStone $itemStone)
    {
        // Prepare all the variables required for saving
        $cart = session()->get('cart');
        $email = false;
        $this->validate(request(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            "street"=>'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required',
            'zipcode' => 'required|string|max:10',
            'billing_street' => 'required|string|max:255',
            'billing_city' => 'required|string|max:255',
            'billing_state' => 'required|string|max:255',
            'billing_zipcode' => 'required|string|max:255',
            'card_number' => 'required|numeric',
            'exp_month' => 'required|numeric|max:12',
            'exp_year' => 'required|numeric|max:9999',
            'cvv' => 'required|numeric|max:9999'
        ]);

        $company_info = $company->find(1);
        $totals = $inventoryItem->prepareTotalsFinish($cart);
        $due = $totals['_total'];
        $shipping = $request->shipping;
        $customer = [
            'id'=>(auth()->check()) ? auth()->user()->id : NULL,
            'first_name'=>trim($request->first_name),
            'last_name'=>trim($request->last_name),
            'email'=>trim($request->email),
            'phone'=>trim($request->phone),
            'street'=>trim($request->street),
            'suite'=>trim($request->suite),
            'city'=>trim($request->city),
            'state'=>trim($request->state),
            'zipcode'=>trim($request->zipcode),
            'country'=>trim($request->country),
            'billing_street'=>$request->billing_street,
            'billing_suite'=>$request->billing_suite,
            'billing_city'=>$request->billing_city,
            'billing_state'=>$request->billing_state,
            'billing_zipcode'=>$request->billing_zipcode,
            'comment'=>NULL,
            'shipping'=>$shipping
        ]; 



        // Run this if we are running payments, basically if the email variable is false

        $card = [
            'card_number'=>$job->stripAllButNumbers($request->card_number),
            'exp_month'=>$job->stripAllButNumbers($request->exp_month),
            'exp_year'=>$job->stripAllButNumbers($request->exp_year),
            'cvv'=>$job->stripAllButNumbers($request->cvv)
        ];


        // Attempt to make the payment for the item
        $result = $authorize->chargeCreditCard($due, $card, $customer);
        
        if  ($result['status']) { // Payment has been processed, proceed to save invoice

            // save the invoice
            $update_invoice = $invoice->updateInvoice($invoice->id,$totals, $customer, $result, $card);
            
            if ($update_invoice) {
   
                try{
                    Mail::to($customer['email'])->send(new InvoiceUserOrder($update_invoice, $company_info, $email));
                    // All Done
                    flash('Thank you for your business! We have sent an email of your invoice to you. Please check your email for further instructions!')->success();   
                } catch(\Exception $e) {
                    flash("The invoice has been paid and properly saved. However, there was an error saving items from your cart. Please call us at {$job->formatPhone($company_info->phone)} to remedy this error. We are sorry for the inconvenience.")->warning();
                }
                    
                // last but not least send user to thank you page
                return redirect()->route('home.thank_you');
            }
        } else { // Payment was not processed due to error
            flash($result['error_message'])->error()->important();
            return redirect()->back();
        }
    
    }

    public function reset(Request $request) {
        session()->forget('cart');
        return response()->json([
            'status' => true
        ]);
    }
}
