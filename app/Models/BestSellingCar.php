<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BestSellingCar extends Model
{
    protected $primaryKey = 'BestSellingCarID';

    protected $table = 'bestsellingcars';

    protected $fillable = ['ModelID'];

    public function carmodels()
    {
        return $this->belongsTo('App\Model\CarModel','ModelID');
    }

    public function carimages()
    {
        return $this->belongsTo('App\Model\CarImage','ModelID');
    }

    public function carimage()
    {
        return $this->hasMany('App\Model\CarImage','ModelID');
    }
}
