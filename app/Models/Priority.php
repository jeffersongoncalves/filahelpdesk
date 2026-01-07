<?php

namespace App\Models;

use App\Observers\PriorityObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(PriorityObserver::class)]
/**
 * @property int $id
 * @property string $name
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Priority extends Model
{
    protected $fillable = [
        'name',
        'color',
    ];
}
