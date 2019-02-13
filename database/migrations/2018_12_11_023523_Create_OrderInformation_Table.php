<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderinformations', function (Blueprint $table) {
            $table->increments('Infoid');
            $table->integer('OrderID')->references('OrderID')->on('orders');
            $table->string('IPAddress');
            $table->string('CountryName');
            $table->string('City');
            $table->string('Region');
            $table->string('PostalCode');
            $table->string('Latitude');
            $table->string('Longitude');
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
        Schema::dropIfExists('orderinformations');
    }
}
