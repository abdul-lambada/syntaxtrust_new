<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'image',
        'link',
        'client_name',
        'order',
        'is_active',
    ];
}
