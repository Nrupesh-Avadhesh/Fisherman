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
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            $table->string('page_name')->nullable();
            $table->string('menu_titel')->nullable();
            $table->string('route_name')->nullable();
            $table->enum('is_sub_menu', ['true', 'false'])->default('false');
            $table->string('main_id')->nullable();
            $table->enum('is_show', ['true', 'false'])->default('true');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headers');
    }
};
