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
        Schema::create('profiles', function (Blueprint $table) {
    $table->id();

    $table->foreignId('user_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->integer('age')->nullable();

    $table->decimal('height', 5, 2)->nullable();

    $table->decimal('weight', 5, 2)->nullable();

    $table->string('gender')->nullable();

    $table->string('activity_level')->nullable();

    $table->string('dietary_preference')->nullable();

    $table->string('goal')->nullable();

    $table->timestamps();

    $table->unique('user_id');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
