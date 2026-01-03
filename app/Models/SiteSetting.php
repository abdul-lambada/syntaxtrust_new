<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name', 'logo_path', 'is_active',
        'stats_projects', 'stats_clients', 'stats_years', 'stats_cities'
    ];
}
