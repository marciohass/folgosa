<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailContact extends Mailable
{
    use Queueable, SerializesModels;
    private $data;
    private $codigo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contato)
    {
        $this->contato = $contato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Contato do site');
        $this->to($this->contato['email'], $this->contato['nome']);


        return $this->markdown('emails.contact', [
            'data' => $this->contato
        ]);
    }
}
