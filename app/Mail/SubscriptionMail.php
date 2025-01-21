<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The subscription instance.
     *
     * @var mixed
     */
    public $subscription;

    /**
     * Create a new message instance.
     *
     * @param mixed $subscription
     */
    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }

    public function build()
    {
        return $this->subject('Subscription Confirmation')
                    ->view('emails.subscription_confirm')
                    ->with([
                        'subscription' => $this->subscription,
                    ]);
    }
}
