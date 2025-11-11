<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BackupDataSeeder extends Seeder
{
    /**
     * Path to the backup data file relative to the base path.
     */
    private const BACKUP_PATH = 'database/seeders/data/backup.php';

    public function run(): void
    {
        $fullPath = base_path(self::BACKUP_PATH);

        if (!file_exists($fullPath)) {
            $this->command?->warn('Backup file not found at '.self::BACKUP_PATH.'. Run `php artisan data:backup` to generate it.');
            return;
        }

        $payload = include $fullPath;

        if (!is_array($payload) || empty($payload)) {
            $this->command?->warn('Backup file is empty. Skipping backup seeding.');
            return;
        }

        Schema::disableForeignKeyConstraints();

        DB::transaction(function () use ($payload) {
            foreach ($payload as $table => $rows) {
                if (!Schema::hasTable($table)) {
                    $this->command?->warn("Table '{$table}' does not exist, skipping.");
                    continue;
                }

                $rows = array_map(function ($row) {
                    return Arr::undot((array) $row);
                }, $rows);

                DB::table($table)->delete();

                if (!empty($rows)) {
                    DB::table($table)->insert($rows);
                }

                $this->command?->info("Seeded table '{$table}' from backup.");
            }
        });

        Schema::enableForeignKeyConstraints();
    }
}
