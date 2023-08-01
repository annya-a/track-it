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
        Schema::create('ticket_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('ticket_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->unique(['ticket_id','locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_translations');
    }
};
