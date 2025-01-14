<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::connection('mongodb')->create('admins', function (Blueprint $collection) {
            $collection->id();
            $collection->string('name');
            $collection->string('email')->unique();
            $collection->string('password');
            $collection->string('phone')->nullable();
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('admins');
    }
};
