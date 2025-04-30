<?php

namespace App\Mail;

use App\Models\Inscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InscriptionConfirmee extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * L'inscription concernée.
     *
     * @var \App\Models\Inscription
     */
    public $inscription;

    /**
     * Créer une nouvelle instance du message.
     *
     * @param  \App\Models\Inscription  $inscription
     * @return void
     */
    public function __construct(Inscription $inscription)
    {
        $this->inscription = $inscription;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation de votre inscription - ' . $this->inscription->getNumeroInscription(),
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.inscriptions.confirmation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments(): array
    {
        return [];
    }
} 