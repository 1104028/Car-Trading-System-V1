<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminaccounts', function (Blueprint $table) {
            $table->increments('AdminID');
            $table->string('Name', 100);
            $table->string('Email', 100);
            $table->string('ContactNumber', 100);
            $table->string('UserName', 50);
            $table->string('Password');
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
        Schema::dropIfExists('adminaccounts');
    }
}
