<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carimages', function (Blueprint $table) {
            $table->increments('ImageID');
            $table->string('ImagePath',300);
            $table->integer('ModelID')->references('ModelID')->on('carmodels');
            $table->boolean('ThumbImage')->default(false);
            $table->boolean('CardImage')->default(false);
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
        Schema::dropIfExists('carimages');
    }
}

