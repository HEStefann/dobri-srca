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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name_for_donation');
            $table->unsignedBigInteger('socially_endangered_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->boolean('paid');
            $table->boolean('approval')->default(true);
            $table->string('status');
            $table->timestamps();
            
            $table->foreign('socially_endangered_id')->references('id')->on('socially_endangereds');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
