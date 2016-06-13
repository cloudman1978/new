<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('tel');
            $table->enum('role', ['10', '20', '30']);
            $table->string('gradeHonor');
            $table->string('image');
            $table->Integer('speciality_id')->unsigned();
            $table->Integer('establishment_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('speciality_id')->references('id')->on('specialities')->onDelete('cascade');
            $table->foreign('establishment_id')->references('id')->on('establishment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
