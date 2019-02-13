<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankpays', function (Blueprint $table) {
            $table->increments('PayId');
            $table->integer('OrderInvoiceID')->references('OrderInvoiceID')->on('orderinvoices');
            $table->string('BankName',100);
            $table->string('BranchName',100);
            $table->string('AccountName',100);
            $table->string('AccountNumber',100);
            $table->string('BankIdentifierCode',100);
            $table->date('Date');
            $table->double('Amount');
            $table->string('BankReciptImage',300);
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
        Schema::dropIfExists('bankpays');
    }
}
