<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BackupDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:backup {--path= : Relative path for the backup file (default: database/seeders/data/backup.php)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export selected tables into a PHP array file that can be consumed by seeders.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $tables = [
            'services',
            'process_steps',
            'timeline_steps',
            'testimonials',
            'technologies',
            'faqs',
            'contact_infos',
            'promos',
            'site_settings',
            'projects',
        ];

        $backup = [];
        foreach ($tables as $table) {
            if (!DB::getSchemaBuilder()->hasTable($table)) {
                $this->warn("Table '{$table}' does not exist, skipping.");
                continue;
            }

            $backup[$table] = DB::table($table)->orderBy('id')->get()->map(function ($row) {
                $row = (array) $row;
                foreach ($row as $key => $value) {
                    if ($value instanceof \BackedEnum) {
                        $row[$key] = $value->value;
                    }
                }
                return $row;
            })->toArray();
        }

        $relativePath = $this->option('path') ?: 'database/seeders/data/backup.php';
        $targetPath = base_path($relativePath);
        File::ensureDirectoryExists(dirname($targetPath));

        $export = "<?php\n\nreturn " . var_export($backup, true) . ";\n";
        File::put($targetPath, $export);

        $this->info("Backup exported to {$relativePath}");

        return self::SUCCESS;
    }
}
