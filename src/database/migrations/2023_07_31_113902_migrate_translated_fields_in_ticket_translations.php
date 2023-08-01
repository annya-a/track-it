<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // We insert the old attributes into the fresh translation table:
        DB::statement("insert into ticket_translations (ticket_id, title, locale) select id, title, 'en' from tickets");

        // We drop the translation attributes in our main table:
        Schema::table('tickets', function ($table) {
            $table->dropColumn('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('title');
        });
    }
};
