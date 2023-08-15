<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationInstructorTable extends Migration
{
    public function up()
    {
        Schema::create('qualification_instructor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qualification_id');
            $table->unsignedBigInteger('instructor_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('qualification_instructor');
    }
}

