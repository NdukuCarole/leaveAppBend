<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class sendOtp extends Notification
{
    use Queueable;
    
    /**
    * Create a new notification instance.
    *
    * @return void
    */
    public function __construct($otp)
    {
        $this->otp = $otp;
    }
    
    /**
    * Get the notification's delivery channels.
    *
    * @param  mixed  $notifiable
    * @return array
    */
    public function via($notifiable)
    {
        return ['mail'];
    }
    
    /**
    * Get the mail representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return \Illuminate\Notifications\Messages\MailMessage
    */
    public function toMail($notifiable)
    {
        $OTP= $this->otp;
        return (new MailMessage)
        ->line('Your Otp'." " . $OTP."  ")
        ->line('Thank you for using our application!');
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
            //
        ];
    }
}
