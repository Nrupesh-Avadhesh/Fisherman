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
        Schema::create('fisherman_banners', function (Blueprint $table) {
            $table->id();
            $table->string('sub_title');
            $table->string('headline');
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->string('button_name')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fisherman_banners');
    }
};
