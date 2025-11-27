<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class courseEnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The user and course instances for the email.
     */
    public $user;
    public $course;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $course)
    {
       $this->user = $user;
       $this->course = $course;
    }
     public function build()
     {
        return $this->subject('New Course Enrollment')
                    ->view('emails.course_enquiry');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Course Enquiry Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
