<?php

namespace App\Jobs;

use App\Mail\NewSendMail;
use App\Mail\SendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     */
    public function __construct(
        public array $details
    )
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = new SendMail($this->details);
        $dispatchEmail = Mail::to($this->details['email']);
        if (isset($this->details['bcc']) && $this->details['bcc'] != null) {
            $email->replyTo($this->details['bcc']);
            $dispatchEmail->bcc($this->details['bcc']);
        }
        $dispatchEmail->send($email);
    }

}
