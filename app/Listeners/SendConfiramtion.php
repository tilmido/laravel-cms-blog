<?php

namespace App\Listeners;

use App\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendConfiramtion
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
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $message_contact=$event->message;
        Mail::send('email.contact',['message_contact'=>$message_contact],function($m)use ($message_contact){
            $m->from('admin@site.com');
            $m->to($message_contact->email);
            $m->subject($message_contact->subject);
        });
    }
}
