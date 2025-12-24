<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPackage extends Model
{
    protected $fillable = [
        'name',
        'tagline',
        'price_text',
        'price_subtext',
        'badge',
        'features',
        'order',
        'is_highlighted',
        'is_active',
        'whatsapp_message',
    ];

    protected $casts = [
        'features' => 'array',
        'is_highlighted' => 'boolean',
        'is_active' => 'boolean',
    ];
}
