<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Sugerencia extends Mailable
{
    use Queueable, SerializesModels;
    public $sugerencia;

    public function __construct($mensaje)
    {
        $this->sugerencia = $mensaje;
    }

    public function build()
    {
        return $this->view('emails.sugerencias');
    }
}
