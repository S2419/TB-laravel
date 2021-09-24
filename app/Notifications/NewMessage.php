<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
<<<<<<< HEAD
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessage extends Notification
{
    use Queueable;
=======
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\message;
class NewMessage extends Notification
{
    use Queueable;
    protected $message;
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb

    /**
     * Create a new notification instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct()
    {
        //
=======
    public function __construct(Message $message)
    {
        $this->message = $message;
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
<<<<<<< HEAD
        return ['mail'];
=======
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'message' => $this->message->message,
                'user_id' => $this->message->user_id,
            ],

        ];
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
<<<<<<< HEAD
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
=======

>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
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
<<<<<<< HEAD
            //
        ];
=======
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'message' => $this->message->message,
                'user_id' => $this->message->user_id,
            ],

        ];

>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
    }
}
