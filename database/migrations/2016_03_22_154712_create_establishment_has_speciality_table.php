<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstablishmentHasSpecialityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishment_has_speciality', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('speciality_id')->unsigned();
            $table->Integer('establishment_id')->unsigned();
            $table->timestamps();

            $table->foreign('speciality_id')->references('id')->on('specialities')->onDelete('cascade');;
            $table->foreign('establishment_id')->references('id')->on('establishment')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('establishment_has_speciality');
    }
}
