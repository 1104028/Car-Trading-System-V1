<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeaPortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seaports', function (Blueprint $table) {
            $table->increments('SeaPortID');
            $table->string('SerPortCode',100);
            $table->string('SerPortName',100);
            $table->integer('CountryID')->references('CountryID')->on('countries');
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
        Schema::dropIfExists('seaports');
    }
}
