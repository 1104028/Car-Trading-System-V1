<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankaccounts', function (Blueprint $table) {
            $table->integer('BankAccountID');
            $table->string('BankAccountName',100);
            $table->string('BankAccountNumber',100);
            $table->string('BankName',100);
            $table->string('Branch',100);
            $table->string('SWIFTCode',100);
            $table->string('ContactPerson',100);
            $table->string('ContactNumber',100);
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
        Schema::dropIfExists('bankaccounts');
    }
}
