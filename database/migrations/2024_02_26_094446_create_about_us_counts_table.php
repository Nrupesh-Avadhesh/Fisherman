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
        Schema::create('about_us_counts', function (Blueprint $table) {
            $table->id();
            $table->string('headline');
            $table->string('sub_headline')->nullable();
            $table->string('name_1')->nullable();
            $table->string('count_1')->nullable();
            $table->string('name_2')->nullable();
            $table->string('count_2')->nullable();
            $table->string('name_3')->nullable();
            $table->string('count_3')->nullable();
            $table->string('name_4')->nullable();
            $table->string('count_4')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_counts');
    }
};
