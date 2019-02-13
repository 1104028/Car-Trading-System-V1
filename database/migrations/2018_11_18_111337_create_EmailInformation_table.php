<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emailinformations', function (Blueprint $table) {
            $table->increments('EmailID_PK');
            $table->string('SMTPclientAddr',100);
            $table->integer('SMTPclientPort');
            $table->string('hostID',100);
            $table->string('hostPass',100);
            $table->string('notficationemail',100);
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
        Schema::dropIfExists('emailinformations');
    }
}
