<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;
    
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    public function build()
    {
        $verification_code = $this->demo->verification_code;

        return $this->from('support@cartradingsystem.com')
            ->subject('Car trading system-Email verification')
            ->markdown('emails.verificationcode',compact('verification_code'));
    }
}
