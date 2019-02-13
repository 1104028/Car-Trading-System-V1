<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QueryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $demo; 
    
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    public function build()
    {
        $querydetails = $this->demo->querydetails;

        return $this->from('support@cartradingsystem.com')
            ->subject('Query From Customers')
            ->markdown('emails.query',compact('querydetails'));
    }
}