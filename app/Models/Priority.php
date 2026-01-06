<?php

namespace App\Models;

use App\Observers\PriorityObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(PriorityObserver::class)]
class Priority extends Model
{
    protected $fillable = [
        'name',
        'color',
    ];
}
