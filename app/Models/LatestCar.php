<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LatestCar extends Model
{
    protected $primaryKey = 'LatestCarID';

    protected $table = 'latestcars';

    protected $fillable = ['ModelID'];

    public function carmodels()
    {
        return $this->belongsTo('App\Model\CarModel','ModelID');
    }

    public function carimages()
    {
        return $this->belongsTo('App\Model\CarImage','ModelID');
    }
}
