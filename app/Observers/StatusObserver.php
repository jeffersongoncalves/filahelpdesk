<?php

namespace App\Observers;

use App\Models\Status;
use Illuminate\Support\Facades\Cache;
use Psr\SimpleCache\InvalidArgumentException;

class StatusObserver
{
    /**
     * Handle the Status "created" event.
     */
    public function created(Status $status): void
    {
        try {
            Cache::delete('statuses_count');
        } catch (InvalidArgumentException) {
        }
    }

    /**
     * Handle the Status "updated" event.
     */
    public function updated(Status $status): void
    {
        //
    }

    /**
     * Handle the Status "deleted" event.
     */
    public function deleted(Status $status): void
    {
        try {
            Cache::delete('statuses_count');
        } catch (InvalidArgumentException) {
        }
    }

    /**
     * Handle the Status "restored" event.
     */
    public function restored(Status $status): void
    {
        //
    }

    /**
     * Handle the Status "force deleted" event.
     */
    public function forceDeleted(Status $status): void
    {
        //
    }
}
