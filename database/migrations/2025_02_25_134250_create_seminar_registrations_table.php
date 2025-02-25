<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarRegistrationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('seminar_id');
            $table->integer('order_id');
            $table->double('payment_amount')->default(0);
            $table->date('payment_date');
            $table->string('status')->nullable();
            $table->text('transaction_id')->nullable();
            $table->text('note')->nullable();
            $table->string('image')->nullable();
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
        Schema::drop('seminar_registrations');
    }
}
