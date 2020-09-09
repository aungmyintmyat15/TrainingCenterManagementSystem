<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreignId('batch_id');
            $table->foreign('batch_id')->references('id')->on('batches');
            $table->string('teacher_name');
            $table->text('teacher_phone');
            $table->text('teacher_address');
            $table->text('teacher_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainers');
    }
}
