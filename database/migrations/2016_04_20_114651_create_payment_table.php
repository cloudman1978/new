<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->double('amount');
            $table->integer('type');
            $table->text('observations');
            $table->Integer('rdv_id')->unsigned();
            $table->string("cheq");
            $table->string("other");
            $table->double("assAmount");
            $table->timestamps();

            $table->foreign('rdv_id')->references('id')->on('rdv')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payment');
    }
}
