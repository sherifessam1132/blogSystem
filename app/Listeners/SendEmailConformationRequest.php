<?php

namespace App\Listeners;

use App\Mail\PleaseConfirmYourEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class SendEmailConformationRequest
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        Mail::to($event->user)->send(new PleaseConfirmYourEmail($event->user));
    }
}
