<?php

namespace Intranet\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Intranet\User;

class ToAdminUser extends Mailable
{
    use Queueable, SerializesModels;

    
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.user-registered-notify')
                    ->subject('Se ha registrado un nuevo usuario.')
                    ->from('postmaster@summitsamurai.com.ar');
    }
}
