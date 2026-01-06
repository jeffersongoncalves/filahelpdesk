<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AgentCategory extends Pivot
{
    protected $fillable = [
        'category_id',
        'Agent_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function Agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class);
    }
}
