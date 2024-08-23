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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Title of the blog
            $table->text('description'); // Description of the blog
            $table->string('category'); // Category with predefined options
            $table->string('photo')->nullable(); // Photo URL (nullable)
            $table->enum('status', ['approved', 'pending'])->default('pending'); // Status with default value
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
