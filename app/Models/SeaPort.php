<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SeaPort extends Model
{
    protected $primaryKey = 'SeaPortID';

    protected $table = 'seaports';

    protected $fillable = ['SerPortCode','SerPortName','CountryID'];

    public function countries()
    {
        return $this->belongsTo('App\Model\Country','CountryID');
    }
}
