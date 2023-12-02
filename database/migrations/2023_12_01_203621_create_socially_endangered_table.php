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
        Schema::create('socially_endangereds', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('phone')->nullable();
            $table->text('transactions')->nullable();
            $table->text('description')->nullable();
            $table->string('title')->nullable();
            $table->date('deadline')->nullable();
            $table->string('image')->nullable();
            $table->string('priority')->nullable();
            $table->decimal('goal', 10, 2)->nullable();
            $table->decimal('raised', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socially_endangered');
    }
};
