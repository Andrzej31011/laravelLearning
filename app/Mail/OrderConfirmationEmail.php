<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $orderDetails;
    protected $paymentDetails;

    /**
     * Create a new message instance.
     */
    public function __construct($orderDetails, $paymentDetails)
    {
        $this->orderDetails = $orderDetails;
        $this->paymentDetails = $paymentDetails;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Potwierdzenie zamówienia',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order-confirmation',
            with: [
                'orderDetails' => $this->orderDetails,
                'paymentDetails' => $this->paymentDetails
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
