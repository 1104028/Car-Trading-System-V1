<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ClientInformations', function (Blueprint $table) {
            $table->increments('Companyid');
            $table->string('COmpanyName', 100);
            $table->string('CompanyAddress');
            $table->string('CompanySlogan');
            $table->string('CompanyTitle');
            $table->string('PhoneNo', 100);
            $table->string('MobileNo', 100);
            $table->string('Email', 100);
            $table->string('CompanyLogo', 255);
            $table->string('GoogleMapLink', 255);
            $table->string('FacebookLink', 255)->nullable();
            $table->string('GooglePlusLink', 255)->nullable();
            $table->string('TwitterLink', 255)->nullable();
            $table->string('YoutubeLink', 255)->nullable();
            $table->string('LinkedinLink', 255)->nullable();
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
        Schema::table('ClientInformations', function (Blueprint $table) {
            //
        });
    }
}
