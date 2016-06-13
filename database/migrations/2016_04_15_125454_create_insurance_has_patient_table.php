<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceHasPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_has_patient', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('insurance_id')->unsigned();
            $table->Integer('patient_id')->unsigned();
            $table->string('affiliation');
            $table->timestamps();

            $table->foreign('insurance_id')->references('id')->on('insurances')->onDelete('cascade');;
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('insurance_has_patient');
    }
}
