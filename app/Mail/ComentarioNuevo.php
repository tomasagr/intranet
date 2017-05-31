<?php

namespace Intranet\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Intranet\Models\Tema;

class ComentarioNuevo extends Mailable
{
    use Queueable, SerializesModels;

    public $tema;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tema $tema)
    {
        $this->tema = $tema;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.comentario')
        ->subject('Ha recibido una respuesta del foro.')
        ->from('admin@somossummit.com.ar');
    }
}
