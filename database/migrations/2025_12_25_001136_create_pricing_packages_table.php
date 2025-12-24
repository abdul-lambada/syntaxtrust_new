<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pricing_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tagline')->nullable();
            $table->string('price_text');
            $table->string('price_subtext')->default('/Project');
            $table->string('badge')->nullable();
            $table->text('features'); // Will store as JSON or simple line-separated text
            $table->integer('order')->default(0);
            $table->boolean('is_highlighted')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('whatsapp_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_packages');
    }
};
