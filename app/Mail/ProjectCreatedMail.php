<?php

namespace App\Mail;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

final class ProjectCreatedMail extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct(
        public Project $project
    )
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Project Created Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.project-created',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
