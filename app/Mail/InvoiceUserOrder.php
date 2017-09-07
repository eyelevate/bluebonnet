<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceUserOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice, $company)
    {
        $this->invoice = $invoice;
        $this->company = $company;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.invoiceuserorder')
            ->with('invoice',$this->invoice)
            ->with('company',$this->company);
    }
}
