<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cin')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('tel');
            $table->date('birthDate');
            $table->string('gender');
            $table->string('address');
            $table->double('height');
            $table->double('size');
         //   $table->Integer('insurance_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();


           // $table->foreign('insurance_id')->references('id')->on('insurance')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patients');
    }
}
