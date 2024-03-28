<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     */
    public function __construct(
        protected array $data
    )
    {
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.sendmail',
            with: [
                'title' => $this->data['title'],
                'body' => $this->data['body']
            ]
        );
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->data['subject'] ?? 'LAMPEH',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
