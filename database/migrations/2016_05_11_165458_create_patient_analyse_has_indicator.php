<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientAnalyseHasIndicator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_analyse_has_indicator', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('indicator_id')->unsigned();
            $table->Integer('pha_id')->unsigned();
            $table->string('result');
            $table->timestamps();


            $table->foreign('indicator_id')->references('id')->on('indicators')->onDelete('cascade');;
            $table->foreign('pha_id')->references('id')->on('patient_has_analyse')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patient_analyse_has_indicator');
    }
}
