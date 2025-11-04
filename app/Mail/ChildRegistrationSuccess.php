<?php

namespace App\Mail;

use App\Models\ChildRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ChildRegistrationSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $child;

    /**
     * Create a new message instance.
     */
    public function __construct(ChildRegistration $child)
    {
        $this->child = $child;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@plateaukidsquiz.com', 'Plateau Carol Children Bible Quiz Registration'),
            subject: '🎉 Child Registration Successful'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.child-registration-success',
            with: [
                'child' => $this->child,
            ],
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
