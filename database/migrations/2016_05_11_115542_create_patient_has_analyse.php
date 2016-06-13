<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientHasAnalyse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_has_analyse', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->Integer('patient_id')->unsigned();
            $table->date('demandDate');
            $table->date('resultDate');
            $table->Integer('doctor_id')->unsigned();
            $table->Integer('labo_id')->unsigned();
            $table->Integer('establishment_id');
            $table->timestamps();


            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
          //  $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('labo_id')->references('id')->on('establishment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patient_has_analyse');
    }
}
