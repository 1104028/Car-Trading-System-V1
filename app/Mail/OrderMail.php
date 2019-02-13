<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;

    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    public function build()
    {
        $order_details = $this->demo->orderdetails;

        return $this->from('support@cartradingsystem.com')
            ->subject('An Order has been Placed')
            ->markdown('emails.ordermail', compact('order_details'));
    }
}
