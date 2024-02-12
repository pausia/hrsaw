<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OfferLetterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $sub_email;
    public $full_name;
    public $company_email;
    public $position;
    public $letter_content;
    public $attachment;

    public function __construct($sub_email, $full_name, $company_email, $position, $letter_content, $attachment)
    {
        $this->data = [
            'sub_email' => $sub_email,
            'full_name' => $full_name,
            'company_email' => $company_email,
            'position' => $position,
            'letter_content' => $letter_content,
            'attachment' => $attachment, // Tambahkan properti attachment ke dalam array data
        ];
    }

    public function build()
    {
        $offer_letter_pdf_url = '...'; // Gantilah dengan URL yang seharusnya digunakan
    
        return $this->subject('Subject Surat Tawaran')
            ->view('offerletter.offer_letter')
            ->with($this->data + ['offer_letter_pdf_url' => $offer_letter_pdf_url]);
    }
    



    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Offer Letter Mail',
        );
    }

    /**
     * Get the message content definition.
     */

    

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
