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
            $table->id();
            $table->string('title');
            $table->string('category_id');
            $table->string('author_name')->nullable();
            $table->string('author_image')->nullable();
            $table->dateTime('date');
            $table->longText('description_1')->nullable();
            $table->longText('heading')->nullable();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->string('label_image');
            $table->string('image');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
            $table->softDeletes();
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
