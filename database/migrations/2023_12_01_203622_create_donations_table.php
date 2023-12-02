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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name_for_donation')->nullable();
            $table->unsignedBigInteger('socially_endangered_id')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->boolean('paid')->nullable();
            $table->boolean('approval')->default(true)->nullable();
            $table->enum('status', ['in_bank', 'waiting', 'donated', 'declined', 'refunded'])->nullable();
            $table->timestamps();
            $table->softDeletes();
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
