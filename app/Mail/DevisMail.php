<?php

namespace App\Mail;

use App\Models\Client;
use App\Models\Devis;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DevisMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Client $client,
        public Devis  $devis
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '✦ Nouvelle demande de devis — ' . $this->client->prenom . ' ' . $this->client->nom,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.devis',
        );
    }
}