<?php

namespace App\Listeners;

use App\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendNotification
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
        Mail::send('email.notify',['message_contact'=>$message_contact],function($m)use ($message_contact){
            $m->from('noreplay@site.com');
            $m->to('admin@site.com');
            $m->subject('you get email from '.$message_contact->subject);
        });
    }
}
