<?php

namespace App\Mail;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPurchased extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        
        public Payment $payment,
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Purchased',
            tags: ['purchased'],
            metadata: [
                'payment_id' => $this->payment->payment_id,
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $url = route('orders.show', ['payment' => $this->payment->payment_id]);

        return new Content(
            markdown: 'mail.orders.purchased',
            with: [
                'url' => $url,
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