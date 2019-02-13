<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderinvoices', function (Blueprint $table) {
            $table->increments('OrderInvoiceID');
            $table->string('InvoiceNo',20);
            $table->integer('OrderID')->references('OrderID')->on('orders');
            $table->double('BasePrice');
            $table->double('SeaPortCost');
            $table->double('TranspotationCost');
            $table->double('ConsumptionCost');
            $table->double('DocumentationCost');
            $table->double('RecyclingCost');
            $table->double('InspectionCost');
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
        Schema::dropIfExists('orderinvoices');
    }
}
