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
        Schema::create('meeting_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('method'); // meet or wa
            $table->string('topic');
            $table->dateTime('when_at')->index();
            $table->string('meet_link')->nullable();
            $table->string('wa_target')->nullable();
            $table->text('msg_preview')->nullable();
            $table->string('status')->default('pending')->index();
            $table->string('sent_via')->nullable(); // wa/api/manual
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_requests');
    }
};
