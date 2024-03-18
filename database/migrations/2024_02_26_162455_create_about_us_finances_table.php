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
        Schema::create('about_us_finances', function (Blueprint $table) {
            $table->id();
            $table->string('sub_title');
            $table->string('headline');
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('button_name')->nullable();
            $table->string('image');
            $table->string('address')->nullable();
            $table->string('map_url')->nullable();
            $table->string('distance_minutes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_finances');
    }
};
