<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserNotification extends Notification
{
    use Queueable;


    public $document_message, $document_file_name, $notification_type, $request_status, $document_status, $additional_message;

    /**
     * Create a new notification instance.
     */
    public function __construct($additional_message, $notification_type, $document_file_name, $document_status)
    {
        $this->document_status = $document_status;
        $this->notification_type = $notification_type;
        $this->document_file_name = $document_file_name;
        $this->additional_message = $additional_message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
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

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
    
    public function toDatabase($notifiable)
    {   
        return [
            'additional_message' => $this->additional_message,
            'notification_type' => $this->notification_type,
            'message' => "The status of your document request for '{$this->document_file_name}' has been changed to '{$this->document_status}'.",
            'status' => $this->document_status
        ];
    }
}
