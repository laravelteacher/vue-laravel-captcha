<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $token;   // this token that Controller make it to send Email
    public $email;
    
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }
   
    
    public function build()
    {
        return $this->markdown('Email.passwordReset')->with([ 
            'token' => $this->token,
            'email' => $this->email
        ]);
    }
}

