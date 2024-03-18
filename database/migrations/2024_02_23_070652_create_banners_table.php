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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('sub_title');
            $table->string('headline');
            $table->string('sub_headline_1')->nullable();
            $table->string('sub_headline_2')->nullable();
            $table->string('sub_headline_3')->nullable();
            $table->string('offer_line')->nullable();
            $table->string('offer_count')->nullable();
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
        Schema::dropIfExists('banners');
    }
};
