<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $school, $course;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$school,$course)
    {
        $this->name = $name;
        $this->school = $school;
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.registered');
    }
}
