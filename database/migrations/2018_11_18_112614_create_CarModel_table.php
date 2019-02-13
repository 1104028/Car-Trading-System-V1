<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carmodels', function (Blueprint $table) {
            $table->increments('ModelID');
            $table->string('ModelName',100);
            $table->integer('BrandID')->references('BrandID')->on('brands');
            $table->integer('YearOfRelease');
            $table->double('Price');
            $table->integer('BodyTypeID')->references('BodyTypeID')->on('bodytypes');
            // Engine Info 
            $table->string('EngineType',100);
            $table->string('Displacement',100);
            $table->string('Power',100);
            $table->string('Torque',100);
            $table->string('Transmission',100);
            $table->string('DriveTrain',100);
            $table->integer('NumberOfGears');
            $table->integer('NumberofCylinders');
            $table->string('Performance0To100Kmph',100);
            $table->double('MaximumSpeed');
            $table->double('FuelTankCapacity');

            $table->string('BodyColor',100);
            $table->string('Length',100);
            $table->string('Width',100);
            $table->string('Height',100);
            $table->string('Wheelbase',100);
            $table->string('GrossWeight',100);

            $table->integer('SeatingCapacity');

            $table->string('FrontTyreSize',100);
            $table->string('WheelType',100);
            $table->string('RearTyreSize',100);

            $table->string('FrontBrakeType',100);
            $table->string('RearBrakeType',100);
            $table->string('FrontSuspension',100);

            $table->string('RearSuspension',100);
            $table->string('PowerSteering',100);
            $table->string('SteeringType',100);
            $table->boolean('NotAvailable')->default(false);
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
        Schema::dropIfExists('carmodels');
    }
}
