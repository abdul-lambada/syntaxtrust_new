<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelineStep extends Model
{
    /** @use HasFactory<\Database\Factories\TimelineStepFactory> */
    use HasFactory;

    protected $fillable = [
        'title','description','order','is_active'
    ];
}
