<?php

namespace App\Listeners;

use App\Events\PostReceivedNewReply;
use App\Events\PostRevievedNewReply;
use App\Models\User;
use App\Notifications\YouWereMentioned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyMentionedUser
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
     * @param  object  $event
     * @return void
     */
    public function handle(PostReceivedNewReply $event)
    {
        preg_match_all('/@([\w\-]+)/',$event->reply->body,$matches);
        $names=$matches[1];
        foreach ($names as $name){
            $user=User::whereName($name)->first();
            if ($user){
                $user->notify(new YouWereMentioned($event->reply));
            }
        }
    }
}
