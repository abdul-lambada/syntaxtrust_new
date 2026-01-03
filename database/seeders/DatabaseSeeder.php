<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            SiteSettingSeeder::class,
            TechnologySeeder::class,
            DemoContentSeeder::class,
            PricingPackageSeeder::class,
            TestimonialSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
