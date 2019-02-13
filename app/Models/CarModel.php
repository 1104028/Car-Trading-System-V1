<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $primaryKey = 'ModelID';

    protected $table = 'carmodels';
    
    protected $fillable = ['ModelName',
                            'BrandID',
                            'YearOfRelease',
                            'Price',
                            'BodyTypeID',
                            'EngineType',
                            'Displacement',
                            'Power',
                            'Torque',
                            'Transmission',
                            'DriveTrain',
                            'NumberOfGears',
                            'NumberofCylinders',
                            'Performance0To100Kmph',
                            'MaximumSpeed',
                            'FuelTankCapacity',
                            'BodyColor',
                            'Length',
                            'Width',
                            'Height',
                            'Wheelbase',
                            'GrossWeight',
                            'SeatingCapacity',
                            'FrontTyreSize',
                            'WheelType',
                            'RearTyreSize',
                            'FrontBrakeType',
                            'RearBrakeType',
                            'FrontSuspension',
                            'RearSuspension',
                            'PowerSteering',
                            'SteeringType'];
                            
    public function bodytype()
    {
        return $this->belongsTo('App\Model\BodyType','BodyTypeID');
    }

    public function carimages()
    {
        return $this->hasMany('App\Model\CarImage','ModelID');
    }

    public function brands()
    {
        return $this->belongsTo('App\Model\Brand','BrandID');
    }

    public function company()
    {
        return $this->belongsTo('App\Model\Company','CompanyID');
    }
}
