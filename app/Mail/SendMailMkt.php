<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailMkt extends Mailable
{
    use Queueable, SerializesModels;

    private $produto;
    private $cli;
    private $nm;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($produto, $email, $nome)
    {
        $this->produto = $produto;
        $this->email = $email;
        $this->nome = $nome;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Tem novidade no meu site!');
        $this->from('folgosa@gmail.com', 'Folgosa');
        $this->to($this->email, $this->nome);

        return $this->markdown('emails.novidade', [
            'produto' => $this->produto,
            'nome' => $this->nome
        ]);
    }
}
