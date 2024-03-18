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
        Schema::create('demo_calls', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('investment_amount')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->date('new_date')->nullable();
            $table->time('new_time')->nullable();
            $table->string('uuid_call')->nullable();
            $table->string('id_call')->nullable();
            $table->string('start_time')->nullable();
            $table->string('join_url')->nullable();
            $table->string('password')->nullable();
            $table->enum('status', ['Pending', 'Schedule', 'ReSchedule', 'Rejected'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demo_calls');
    }
};
