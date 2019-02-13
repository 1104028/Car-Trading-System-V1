<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('OrderID');
            $table->integer('ModelID')->references('ModelID')->on('carmodels');
            $table->string('CustomerName',100);
            $table->string('CustomerEmail',100);
            $table->string('CustomerContactNumber',30);
            $table->string('CustomerAddress',300);
            $table->integer('SeaPortID')->references('SeaPortID')->on('seaports');
            $table->string('OtherSeaport',100)->nullable();
            $table->string('OtherCountryName',100)->nullable();
            $table->string('DeliveryAddress',300);
            $table->string('OrderStatus',100);
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
        Schema::dropIfExists('orders');
    }
}
