<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contactus extends Mailable
{
    use Queueable, SerializesModels;
    
    public $emaill;
    public $messagee;
    public $namee;
    public $subjectt;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messagee,$emaill,$namee,$subjectt)
    {
        $this->emaill = $emaill;
        $this->messagee = $messagee;
        $this->namee = $namee;
        $this->subjectt = $subjectt;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->emaill)
        ->with([
            'name' => $this->namee,
            'email' => $this->emaill,
            'subject' => $this->subjectt,
            'messagg' => $this->messagee,
        ])
        ->subject($this->subjectt)
        ->view('site.mail');
        // ->with([
        //     'message' => $this->message,
        // ])
        // ->subject($this->subjectt);
    }
}
