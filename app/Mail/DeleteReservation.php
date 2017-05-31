<?php

namespace Intranet\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Intranet\Reserva;

class DeleteReservation extends Mailable
{
    use Queueable, SerializesModels;
    
    public $reserva;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reserva $reserva)
    {
        $this->reserva = $reserva;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.delete-reserva')
                ->subject('Se ha eliminado la reserva a la sala.')
                ->from('admin@somossummit.com.ar');
    }
}
