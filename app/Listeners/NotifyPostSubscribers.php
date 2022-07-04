<?php

namespace App\Listeners;

use App\Events\PostHasNewReply;
use App\Notifications\PostWasUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyPostSubscribers
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
    public function handle(PostHasNewReply $event)
    {
        $event->post->subscriptions
            ->where('user_id','!=',$event->reply->user_id)

            ->each(function ($sub) use ($event){
                $sub->user->notify(new PostWasUpdated($event->post,$event->reply));
            });
    }
}
