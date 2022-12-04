<?php

namespace App\Listeners;

use App\Login;
use App\Models\LoginActivity;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RecordLogin
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if($event->user->tenant_id) {
            LoginActivity::create([
                'user_id' => $event->user->id,
                'store_id' => $event->user->store_id,
            ]);
        }
    }
}
