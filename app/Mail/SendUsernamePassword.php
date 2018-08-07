<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Crypt;
class SendUsernamePassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user;
    public function __construct($user)
    {
        $this->user = $user;
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
                'username'     => $this->user->email, //this works without queue
                'password'     => Crypt::decrypt($this->user->password), //this works without queue
               ]);
    }
}
