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
        Schema::create('home_service_lists', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('button_name')->nullable();
            $table->enum('status', ['Show', 'Hide', 'Delete'])->default('Hide');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_service_lists');
    }
};
