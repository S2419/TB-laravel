<?php

namespace App\Events;

use App\Comment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;
use App\Post;
class CommentsEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * User that sent the comment
     *
     * @var User
     */
    public $user;

    /**
     * Comment details
     *
     * @var Comment
     */
    public $comment;

    /**
     * The post the comment is on
     *
     * @var Post
     */
    public $post;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Comment $comment)
    {
        $this->user = $user;
        $this->comment = $comment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('comment');
    }

}

