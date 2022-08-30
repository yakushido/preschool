<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ToUserMail extends Mailable
{
    use Queueable, SerializesModels;

    protected string $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $body)
    {
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('teacher.email.contact')
                    ->from('sample@example.com')
                    ->subject('ABC保育園です。')
                    ->with([
                        'body' => $this->body
                    ]);
    }
}
