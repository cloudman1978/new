<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalysePredefHasIndicatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyse_predef_has_indicator', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('indicator_id')->unsigned();
            $table->Integer('analyse_predef_id')->unsigned();
            $table->timestamps();


            $table->foreign('indicator_id')->references('id')->on('indicators')->onDelete('cascade');;
            $table->foreign('analyse_predef_id')->references('id')->on('analyses_predef')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('analyse_predef_has_indicator');
    }
}
