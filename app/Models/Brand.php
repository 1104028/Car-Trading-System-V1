<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $primaryKey = 'BrandID';

    protected $table = 'brands';

    protected $fillable = ['BrandName','CompanyID'];

    public function companies()
    {
        return $this->hasMany('App\Model\Company','CompanyID');
    }
}
