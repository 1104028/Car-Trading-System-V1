<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderInformation extends Model
{
    protected $primaryKey = 'Infoid';

    protected $table = 'orderinformations';

    protected $fillable = ['OrderID','IPAddress','CountryName','City','Region','PostalCode',
    'Latitude','Longitude'];
}
