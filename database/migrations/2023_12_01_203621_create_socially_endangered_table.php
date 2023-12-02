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
            $table->string('name');
            $table->string('surname');
            $table->string('phone');
            $table->text('transactions')->nullable();
            $table->text('description');
            $table->string('title');
            $table->date('deadline');
            $table->string('image')->nullable();
            $table->string('priority');
            $table->decimal('goal', 10, 2);
            $table->decimal('raised', 10, 2);
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
