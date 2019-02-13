<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;
    
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    public function build()
    {
        $quotation = $this->demo->quotation;
        $allorders = $this->demo->allorders;
        $totalprice = $this->demo->totalprice;
        $amountinword = $this->demo->amountinword;

        return $this->from('support@cartradingsystem.com')
            ->subject('Invoice for for Requested Quotation')
            ->view('invoice',compact('quotation','allorders','totalprice','amountinword'));
            // ->markdown('emails.invoicemail'));
    }
}
