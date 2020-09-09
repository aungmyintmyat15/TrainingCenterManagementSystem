<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->text('student_photo');
            $table->text('student_phone');
            $table->string('student_address');
            $table->text('student_email');
            $table->text('student_gender');
            $table->date('student_date_of_birth');
            $table->foreignId('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreignId('batch_id');
            $table->foreign('batch_id')->references('id')->on('batches');
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
        Schema::dropIfExists('students');
    }
}
