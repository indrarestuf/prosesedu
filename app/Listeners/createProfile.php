<?php

namespace App\Listeners;

use App\User;
use App\Profile;

use App\Events\registerProfile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class createProfile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  registerProfile  $event
     * @return void
     */
    public function handle(registerProfile $event)
    {
    $profile = new Profile();
    $event->user->profile()->save($profile);
    }
}
