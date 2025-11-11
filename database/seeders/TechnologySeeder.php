<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['name'=>'Laravel 12','icon'=>null,'color'=>'#FF2D20','order'=>1],
            ['name'=>'Tailwind v4','icon'=>null,'color'=>'#38BDF8','order'=>2],
            ['name'=>'Vite 5','icon'=>null,'color'=>'#646CFF','order'=>3],
            ['name'=>'Alpine.js','icon'=>null,'color'=>'#77C1D2','order'=>4],
            ['name'=>'Axios','icon'=>null,'color'=>'#5A29E4','order'=>5],
            ['name'=>'MySQL','icon'=>null,'color'=>'#F29111','order'=>6],
        ];
        foreach ($items as $it) {
            DB::table('technologies')->updateOrInsert(
                ['slug' => Str::slug($it['name'])],
                [
                    'name' => $it['name'],
                    'slug' => Str::slug($it['name']),
                    'icon' => $it['icon'],
                    'color' => $it['color'] ?? null,
                    'order' => $it['order'] ?? 0,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
