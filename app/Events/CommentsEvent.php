<?php

namespace App\Events;

<<<<<<< HEAD
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

=======
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
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
class CommentsEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
<<<<<<< HEAD
=======
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
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
     * Create a new event instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct()
    {
        //
=======
    public function __construct(User $user, Comment $comment)
    {
        $this->user = $user;
        $this->comment = $comment;
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
    }

    /**
     * Get the channels the event should broadcast on.
     *
<<<<<<< HEAD
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
=======
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('comment');
    }

}

>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
