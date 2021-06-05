<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PreviousExpirience extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_expirience', function (Blueprint $table) {
            $table->increments('id');
            $table->string('workStartMonth');
            $table->string('workStartYear');
            $table->string('workEndMonth');
            $table->string('workEndYear');
            $table->string('stillWork');
            $table->string('vacancy');
            $table->string('organisation');
            $table->text('duty');
            $table->integer('cv_id')->unsigned();
            $table->foreign('cv_id')->references('id')->on('cv')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('previous_expirience');
    }
}
