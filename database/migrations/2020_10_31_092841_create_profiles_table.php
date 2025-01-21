<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('department');
            $table->string('faculty');
            $table->string('batch');
            $table->string('academic_program')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('student_reg_no');
            $table->string('student_id');
            $table->string('phone');
            $table->string('address');
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('job_type');
            $table->text('job_details');
            $table->string('student_type');
            $table->string('file')->nullable();
            $table->string('image');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
}
