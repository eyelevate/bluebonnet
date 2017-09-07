<?php

namespace App;

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
}
