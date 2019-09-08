<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Notifications\Messages\MailMessage;
use App\Comment;
use App\User;
use Illuminate\Notifications\Messages\BroadcastMessage;
use App\Post;
use Illuminate\Notifications\Notifiable;
class NewComment extends Notification implements ShouldQueue
{
    use Queueable;
    protected $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'comment' => $this->comment->comment,
                'user_id' => $this->comment->user_id,
                'post_id' => $this->comment->commentable_id,
            ],

        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'comment' => $this->comment->comment,
                'user_id' => $this->comment->user_id,
                'post_id' => $this->comment->commentable_id,

            ],

        ];
    }



}
