<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserComplaintNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $notificationType, $additionalMessage, $complaintStatus;
    public function __construct($notificationType, $additional_message, $complaintStatus)
    {
        $this->notificationType = $notificationType;
        $this->additionalMessage = $additional_message;
        $this->complaintStatus = $complaintStatus;
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
    public function toArray($notifiable): array
    {
        return [
            'notification_type' => $this->notificationType,
            'message' => 'The status of your complaint has been updated to ' . $this->complaintStatus,
            'additional_message' => $this->additionalMessage,
            'status' => $this->complaintStatus
        ];
    }
}
