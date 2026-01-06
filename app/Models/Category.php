<?php

namespace App\Models;

use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[ObservedBy(CategoryObserver::class)]
class Category extends Model
{
    protected $fillable = [
        'name',
        'color',
    ];

    public function agents(): BelongsToMany
    {
        return $this->belongsToMany(Agent::class)
            ->using(AgentCategory::class);
    }
}
