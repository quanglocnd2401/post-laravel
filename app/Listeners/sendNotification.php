<?php

namespace App\Listeners;

use App\Events\ApproveArticle;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class sendNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ApproveArticle $event): void
    {
        $data = array('name' => $event->name);

        Mail::send('mail', $data, function ($message) {
            $message->to('loctqph42545@fpt.edu.vn', 'Tutorials Point')
                ->subject('Laravel Basic Testing Mail');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
}
