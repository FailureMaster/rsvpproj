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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('firstName')->unique();
            $table->string('lastName')->unique();
            $table->string('code', 6)->unique();
            $table->string('relationship')->nullable();
            $table->string('role')->nullable();
            $table->boolean('is_plus_one')->nullable();
            $table->string('added_by')->nullable();
            $table->boolean('is_coming')->nullable();
            $table->boolean('did_come')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
