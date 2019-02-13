<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $primaryKey = 'CountryID';

    protected $table = 'countries';

    protected $fillable = ['CountryName'];

    public function seaports()
    {
        return $this->hasMany('App\Model\SeaPort','ModelID');
    }
}
