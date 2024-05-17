<?php

namespace App\Listeners;

use App\Events\CommandEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CommandListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param CommandEvent $event
     * @return void
     */
    public function handle(CommandEvent $event)
    {
        // sending to redis
        $redis = new \Redis();
        $redis->publish($event->message['channel'],json_encode($event->message));
    }
}
