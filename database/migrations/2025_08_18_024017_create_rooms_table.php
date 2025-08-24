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
        Schema::create('rooms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('boardinghouse_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            // $table->string('slug')->unique();
            $table->string('room_type')->nullable();
            $table->integer('square_feet');
            $table->integer('capacity');
            $table->integer('price_per_month');
            $table->boolean('is_available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
