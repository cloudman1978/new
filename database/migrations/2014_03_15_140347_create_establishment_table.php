<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstablishmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('establishment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameE')->unique();
            $table->string('email')->nullable();
            $table->text('address');
             $table->text('textLatlng');
            $table->string('tel');
            $table->string('tel1');
            $table->string('logo');
            $table->Integer('type_id')->unsigned();
            $table->text('horaire');
            $table->timestamps();


            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });
       // DB::statement('ALTER TABLE establishment add COLUMN  horaire varray of VARCHAR(20)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('establishment');


    }
}
