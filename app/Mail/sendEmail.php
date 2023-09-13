<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $title;
    public $view;
    public $data;
    public function __construct($title, $view, $data)
    {
        $this->view     =   $view;
        $this->data     =   $data;
        $this->title    =   $title;
    }
    public function build()
    {
        return $this->subject($this->title)
                    ->view($this->view, ['data' =>  $this->data]);
    }

}
