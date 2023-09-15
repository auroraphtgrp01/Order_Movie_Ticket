<?php

namespace App\Jobs;

use App\Mail\sendEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
class sendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $data;
    public $subject;
    public $mailto;
    public $view;

    public function __construct($mailto, $subject, $view, $data)
    {
        $this->data = $data;
        $this->subject = $subject;
        $this->mailto = $mailto;
        $this->view = $view;
    }

    public function handle(): void
    {
        Mail::to($this->mailto)->send(new sendEmail($this->subject, $this->view, $this->data));
    }
}
