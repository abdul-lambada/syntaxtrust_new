<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    /** @use HasFactory<\Database\Factories\ContactInfoFactory> */
    use HasFactory;

    protected $fillable = [
        'type','label','value','order','is_active'
    ];
}
