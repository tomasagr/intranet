<?php

namespace Intranet\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Intranet\Models\Panel\RSE;
use Intranet\User;

class JobNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user; 
    public $job;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(RSE $job, User $user)
    {
        $this->user = $user;
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.job')
        ->subject('Nueva aplición de trabajo.')
        ->from('admin@somossummit.com.ar');
    }
}
