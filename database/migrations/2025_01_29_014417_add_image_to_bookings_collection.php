<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mongodb')->table('bookings', function (Blueprint $collection) {
            $collection->string('image')->nullable(); // Add image field
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->table('bookings', function (Blueprint $collection) {
            $collection->dropColumn('image'); // Rollback
        });
    }
};
