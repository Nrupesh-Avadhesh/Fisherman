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
        Schema::create('fisherman_services', function (Blueprint $table) {
            $table->id();
            $table->string('sub_title');
            $table->string('headline');
            $table->string('url')->nullable();
            $table->string('button_name')->nullable();
            $table->string('icon_1')->nullable();
            $table->string('title_1')->nullable();
            $table->string('detail_1')->nullable();
            $table->string('url_1')->nullable();
            $table->string('button_name_1')->nullable();
            $table->string('icon_2')->nullable();
            $table->string('title_2')->nullable();
            $table->string('detail_2')->nullable();
            $table->string('url_2')->nullable();
            $table->string('button_name_2')->nullable();
            $table->string('icon_3')->nullable();
            $table->string('title_3')->nullable();
            $table->string('detail_3')->nullable();
            $table->string('url_3')->nullable();
            $table->string('button_name_3')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fisherman_services');
    }
};
