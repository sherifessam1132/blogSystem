<?php

namespace App\Events;

use App\Models\Post;
use App\Models\Reply;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostHasNewReply
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
     public $post,$reply;
    /**
     * Create a new event instance.
     *
     * @param Post $post
     * @param Reply $reply
     * @return void
     */
    public function __construct(Post $post,Reply $reply)
    {
        $this->post=$post;
        $this->reply=$reply;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
