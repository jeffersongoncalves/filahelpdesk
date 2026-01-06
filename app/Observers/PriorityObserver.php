<?php

namespace App\Observers;

use App\Models\Priority;
use Illuminate\Support\Facades\Cache;
use Psr\SimpleCache\InvalidArgumentException;

class PriorityObserver
{
    /**
     * Handle the Priority "created" event.
     */
    public function created(Priority $priority): void
    {
        try {
            Cache::delete('priorities_count');
        } catch (InvalidArgumentException) {
        }
    }

    /**
     * Handle the Priority "updated" event.
     */
    public function updated(Priority $priority): void
    {
        //
    }

    /**
     * Handle the Priority "deleted" event.
     */
    public function deleted(Priority $priority): void
    {
        try {
            Cache::delete('priorities_count');
        } catch (InvalidArgumentException) {
        }
    }

    /**
     * Handle the Priority "restored" event.
     */
    public function restored(Priority $priority): void
    {
        //
    }

    /**
     * Handle the Priority "force deleted" event.
     */
    public function forceDeleted(Priority $priority): void
    {
        //
    }
}
