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
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transID');
            $table->unsignedBigInteger('courseID');
            $table->unsignedBigInteger('instructorID');
            $table->date('startDate');
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->foreign('transID')->references('id')->on('transactions');
            $table->foreign('courseID')->references('id')->on('courses');
            $table->foreign('instructorID')->references('id')->on('instructors');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transactions');
    }
};
