<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('details');
            $table->double('amount')->default(0);
            $table->date('seminar_date');
            $table->time('seminar_time');
            $table->date('seminar_close_date')->nullable();
            $table->time('seminar_close_time')->nullable();
            $table->string('place');
            $table->string('image');
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
        Schema::drop('seminars');
    }
}
