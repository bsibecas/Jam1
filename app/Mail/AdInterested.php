<?php

namespace App\Mail;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdInterested extends Mailable
{
    use Queueable, SerializesModels;

    public  $liker;
    public  $ad;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $liker, Ad $ad)
    {
        $this->liker = $liker;
        $this->ad = $ad;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.ads.ad_interested')
            ->subject('Someone is interested in your ad');
    }
}
