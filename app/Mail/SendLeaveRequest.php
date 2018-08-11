<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLeaveRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $username,$email,$comments;
    public function __construct($username, $email, $comments)
    {
        $this->username = $username;
        $this->email = $email;
        $this->comments = $comments;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->username;
        $subject = 'Leave Application';
        return $this->view('Leave.LeaveMailTemplate')
        ->from($this->email)
        ->subject($subject)
        ->with([
                'username'=>$this->username,
                'email'=>$this->email,
                'comments' => $this->comments,
               ]);
    }
}
