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
    public function __construct($invoice, $company, $email)
    {
        $this->invoice = $invoice;
        $this->company = $company;
        $this->email = $email;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.invoiceuserorder')
            ->subject('Invoice Statement')
            ->with('invoice',$this->invoice)
            ->with('company',$this->company)
            ->with('email',$this->email);
    }
}
