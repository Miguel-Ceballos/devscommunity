<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLikePost extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($post_id, $post_title, $user_id, $user_username, $message)
    {
        $this->post_id = $post_id;
        $this->post_title = $post_title;
        $this->user_id = $user_id;
        $this->user_username = $user_username;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable) : array
    {
        return [ 'database' ];
//        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    // Almacena las notificaciones en la base de datos
    public function toDatabase($notifiable): array
    {
        return [
            'post_id' => $this->post_id,
            'post_title' => $this->post_title,
            'user_id' => $this->user_id,
            'user_username' => $this->user_username,
            'message' => $this->message
        ];
    }
}
