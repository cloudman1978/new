<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRdvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdv', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->dateTime('hour');
            $table->string('state');
            $table->text('rqs');
            $table->Integer('establishment_id')->unsigned();
            $table->Integer('user_id')->unsigned();
            $table->Integer('patient_id')->unsigned();

            $table->timestamps();

            $table->foreign('establishment_id')->references('id')->on('establishment')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rdv');
    }
}
