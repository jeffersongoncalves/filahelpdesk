<?php

namespace App\Models;

use App\Observers\StatusObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(StatusObserver::class)]
class Status extends Model
{
    protected $fillable = [
        'name',
        'color',
    ];
}
