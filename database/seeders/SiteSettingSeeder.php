<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::truncate();

        SiteSetting::create([
            'site_name' => 'SyntaxTrust',
            'whatsapp' => '6285156553226',
            'stats_projects' => 42,
            'stats_clients' => 38,
            'stats_years' => 4,
            'stats_cities' => 15,
            'is_active' => true,
        ]);
    }
}
