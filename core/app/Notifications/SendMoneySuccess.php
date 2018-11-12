<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendMoneySuccess extends Notification
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

            ->subject('Send Money Successful')
            ->greeting('Hi '. $data->user_name.'!')
            ->line("You was request to us send money to another user. Here is below your info:")
            ->line('Total Amount: $'.$data->amount)
            ->line('Charge: $'.$data->charge)
            ->line('Net Amount: $'.$data->new_amount)
            ->line('Receiver Name: '.$data->receiver_name)
            ->line('Receiver Email: '.$data->receiver_email)
            ->line("After your request we send that money to this email address instantly. You should confirm who receive that money. We send your money as soon as you request. For details log please login your account by click the button below.")
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
