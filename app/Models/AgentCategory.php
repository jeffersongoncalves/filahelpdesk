<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int $agent_id
 * @property int $category_id
 * @property-read \App\Models\Agent $Agent
 * @property-read \App\Models\Category $category
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AgentCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AgentCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AgentCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AgentCategory whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AgentCategory whereCategoryId($value)
 *
 * @mixin \Eloquent
 */
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
