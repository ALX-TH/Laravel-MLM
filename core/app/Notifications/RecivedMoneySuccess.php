<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RecivedMoneySuccess extends Notification
{
    use Queueable;
    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //

        $this->data= $data;


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
        $data = $this->data;

        return (new MailMessage)
            ->subject('Receive Money Successful')
            ->greeting('Hi '. $data->receiver_name.'!')
            ->line("You got money. A user was request to us send money to you. Here is below transactions info:")
            ->line('Amount: $'.$data->amount)
            ->line('Sender Name: '.$data->sender_name)
            ->line('Sender Email: '.$data->sender_email)
            ->line("After your request we send that money to your account instantly. You should check your account. For details log please login your account by click the button below.")
            ->action('Login Now', route('login'))
            ->line('Thank you for using our website! If you face any problem feel free to contact us anytime.');
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
