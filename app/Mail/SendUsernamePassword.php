<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
// use Crypt;
class SendUsernamePassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user,$email,$password;
    public function __construct($user,$email,$password)
    {
        $this->user = $user;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = 'Administrator';
        $subject = 'Registration Complete!!';
        return $this->view('User.registrationComplete')
        ->from(env('MAIL_FROM_ADDRESS'), $name)
        ->subject($subject)
        ->with([
                'name'         => $this->user,
                'username'     => $this->email,
                'password'     => $this->password,
               ]);
    }
}
