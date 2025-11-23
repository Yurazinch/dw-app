<?php

namespace App\Listeners;

use App\Events\HallCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HallCreatedListener
{
    /**
     * Создайте прослушиватель событий.
     */
    public function __construct()
    {
        //
    }

    /**
     * Управляйте событием.
     */
    public function handle(HallCreated $event): void
    {
        function () {
            return route('film.index');
        };
    }
}
