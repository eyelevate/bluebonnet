<?php

namespace App;

use App\Job;
use App\User;
use App\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    /**
    * Payment Types
    * 1 = Credit Card
    * 2 = Check
    * 3 = Cash
    **/

    /**
    * statuses
    * 1 = Created
    * 2 = Pending
    * 3 = Paid
    * 4 = Sent Delivery
    * 5 = Complete
    **/

    /**
    * shipping
    * 1 = Ground
    * 2 = 2 day air
    * 3 = next day
    * 4 = in-store pickup
    **/


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'employee_id',
        'vendor_id',
        'fob',
        'po_number',
        'requisitioner',
        'quantity',
        'subtotal',
        'tax',
        'total',
        'tendered',
        'payment_type',
        'last_four',
        'transaction_id',
        'street',
        'suite',
        'city',
        'state',
        'country',
        'zipcode',
        'comment',
        'terms',
        'status',
        'first_name',
        'last_name',
        'shipping'

    ];

    // Relations
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id', 'id');
    }

    public function newInvoice($totals, $customer, $payment, $card)
    {
        $new_invoice = new Invoice();
        if (auth()->check()) {
            $user = User::find(auth()->user()->id)->update([
                'first_name'=>$customer['first_name'],
                'last_name'=>$customer['last_name'],
                'phone'=>$customer['phone'],
                'street'=>$customer['street'],
                'suite'=>$customer['suite'],
                'city'=>$customer['city'],
                'state'=>$customer['state'],
                'country'=>$customer['country'],
                'zipcode'=>$customer['zipcode']]);

            
            $new_invoice->user_id = auth()->user()->id;


        } else { // Guest user we will keep track of shipping info on invoice only
            $new_invoice->first_name = $customer['first_name'];
            $new_invoice->last_name = $customer['last_name'];
            $new_invoice->street = $customer['street'];
            $new_invoice->suite = $customer['suite'];
            $new_invoice->city = $customer['city'];
            $new_invoice->state = $customer['state'];
            $new_invoice->zipcode = $customer['zipcode'];
            $new_invoice->country = $customer['country'];
            $new_invoice->phone = $customer['phone'];
            $new_invoice->email = $customer['email'];
        }

        // unused columns = po_number, vendor_id, requisitioner, fob, terms 

        // save the rest of the invoice
        $new_invoice->quantity = $totals['quantity'];
        $new_invoice->subtotal = $totals['_subtotal'];
        $new_invoice->tax = $totals['_tax'];
        $new_invoice->total = $totals['_total'];
        $new_invoice->tendered = $totals['_total'];
        $new_invoice->shipping_total = $totals['_shipping'];
        $new_invoice->payment_type = 1; // Credit Card
        $new_invoice->last_four = substr($card['card_number'], -4);
        $new_invoice->transaction_id = $payment['transaction_id'];
        $new_invoice->comment = $customer['comment'];
        $new_invoice->shipping = $customer['shipping'];
        $new_invoice->status = 3; // Paid 

        if ($new_invoice->save()) {
            return $new_invoice;
        } 

        return false;

    }

    public function newInvoiceEmail($totals, $customer)
    {
        $new_invoice = new Invoice();
        if (auth()->check()) {
            $user = User::find(auth()->user()->id)->update([
                'first_name'=>$customer['first_name'],
                'last_name'=>$customer['last_name'],
                'phone'=>$customer['phone'],
                'street'=>$customer['street'],
                'suite'=>$customer['suite'],
                'city'=>$customer['city'],
                'state'=>$customer['state'],
                'country'=>$customer['country'],
                'zipcode'=>$customer['zipcode']]);

            
            $new_invoice->user_id = auth()->user()->id;


        } else { // Guest user we will keep track of shipping info on invoice only
            $new_invoice->first_name = $customer['first_name'];
            $new_invoice->last_name = $customer['last_name'];
            $new_invoice->street = $customer['street'];
            $new_invoice->suite = $customer['suite'];
            $new_invoice->city = $customer['city'];
            $new_invoice->state = $customer['state'];
            $new_invoice->zipcode = $customer['zipcode'];
            $new_invoice->country = $customer['country'];
            $new_invoice->phone = $customer['phone'];
            $new_invoice->email = $customer['email'];
        }

        // unused columns = po_number, vendor_id, requisitioner, fob, terms 

        // save the rest of the invoice
        $new_invoice->quantity = $totals['quantity'];
        // $new_invoice->subtotal = $totals['_subtotal'];
        // $new_invoice->tax = $totals['_tax'];
        // $new_invoice->total = $totals['_total'];
        // $new_invoice->tendered = $totals['_total'];
        // $new_invoice->shipping_total = $totals['_shipping'];
        // $new_invoice->payment_type = 1; // Credit Card
        // $new_invoice->last_four = substr($card['card_number'], -4);
        // $new_invoice->transaction_id = $payment['transaction_id'];
        $new_invoice->comment = $customer['comment'];
        $new_invoice->shipping = $customer['shipping'];
        $new_invoice->status = 2; // Pending 

        if ($new_invoice->save()) {
            return $new_invoice;
        } 

        return false;

    }

    public function summary()
    {


        $summary = $this->groupBy('status')
            ->having('status', '>', 0)
            ->select('*', \DB::raw('count(id) as total'))
            ->orderBy('total','desc')
            ->get();

        // dd($summary);

        return $summary;
    }
    public function details()
    {   
        $job = new Job();
        $details = $this->where('status','<',4)->orderBy('id','desc')->get();

        if (count($details) > 0) {
            foreach ($details as $key => $value) {
                // first name
                $details[$key]['first_name'] = (isset($value->users)) ? ucFirst($value->users->first_name) : ucFirst($value->first_name);

                // last Name
                $details[$key]['last_name'] = (isset($value->users)) ? ucFirst($value->users->last_name) : ucFirst($value->last_name);

                // full name
                $details[$key]['full_name'] = ucFirst($value->last_name).', '.ucFirst($value->first_name);
                if (isset($value->users)) {
                    $details[$key]['full_name'] = ucFirst($value->users->last_name).', '.ucFirst($value->users->first_name);
                }

                // Shipping Address
                $street = (isset($value->users)) ? $value->users->street : $value->street;
                $suite = (isset($value->users)) ? $value->users->suite : $value->suite;
                $full_street = (isset($suite)) ? $street.' '.$suite : $street;
                $city = (isset($value->users)) ? $value->users->city : $value->city;
                $state = (isset($value->users)) ? $value->users->state : $value->state;
                $country = (isset($value->users)) ? $value->users->country : $value->country;
                $zipcode = (isset($value->users)) ? $value->users->zipcode : $value->zipcode;

                $shipping_address = $full_street." <br/> ".ucFirst($city).", ".ucFirst($state)." ".$zipcode;

                $details[$key]['shipping_address'] = $shipping_address;


                // Phone
                $phone = (isset($value->users)) ? $value->users->phone : $value->phone;
                $details[$key]['phone'] = $job->formatPhone($phone);


                // Email
                $email = (isset($value->users)) ? $value->users->email : $value->email;
                $details[$key]['email'] = $email;

                // Shipping Type
                $details[$key]['shipping_type'] = $this->getShippingType($value->shipping);

                // Payment Type
                $details[$key]['payment_type'] = $this->getPaymentType($value->payment_type);

                // status_html
                if (isset($value->status)) {
                    switch ($value->status) {
                        case 1:
                            $details[$key]['status_html'] = '<span class="badge">Created By Admin</span>';
                            break;
                        case 2:
                            $details[$key]['status_html'] = '<span class="badge badge-warning">Pending</span>';
                            break;
                        case 3:
                            $details[$key]['status_html'] = '<span class="badge badge-success">Paid</span>';
                            break;
                    }
                }

                if (count($value->invoiceItems) > 0) {
                    foreach ($value->invoiceItems as $item) {
                        // dd($item);
                    }
                }
            }
        }

        return $details;
    }

    public function getShippingType($shipping)
    {
        // Shipping Type
        switch ($shipping) {
            case 1: // Ground
                $shipping_type = 'Ground Shipping';
                break;
            case 2: // 2 Day Air
                $shipping_type = '2 Day Air';
                break;
            case 3: // Next Day Air
                $shipping_type = 'Next Day Air';
                break;
            default: // In Store Pickup
                $shipping_type = 'In-store Pickup';
                break;
        }

        return $shipping_type;
    }

    public function getPaymentType($type)
    {
        switch ($type) {
            case 1:
                $payment_type = 'Credit Card';
                break;

            case 1:
                $payment_type = 'Check';
                break;
            
            default:
                $payment_type = 'Cash';
                break;
        }

        return $payment_type;
    }
}
