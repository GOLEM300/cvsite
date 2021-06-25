<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo')->nullable();
            $table->string('lastname');
            $table->string('name');
            $table->string('patronymic');
            $table->date('birth_date')->nullable();
            $table->string('sex')->index();
            $table->string('locate_city')->index();
            $table->string('email');
            $table->unsignedBigInteger('phone');
            $table->string('specialization')->index();
            $table->unsignedBigInteger('salary');
            $table->string('expirience')->index();
            $table->text('about')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cv');
    }
}
