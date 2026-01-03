<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('SyntaxTrust');
            $table->string('logo_path')->nullable();
            $table->integer('stats_projects')->default(29);
            $table->integer('stats_clients')->default(23);
            $table->integer('stats_years')->default(5);
            $table->integer('stats_cities')->default(12);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
