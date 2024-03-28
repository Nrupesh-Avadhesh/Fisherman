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
        Schema::create('sitelogos', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('fav_icon')->nullable();
            $table->string('login_logo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sitelogos');
    }
};