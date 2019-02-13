<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'OrderID';

    protected $table = 'orders';

    protected $fillable = ['ModelID','CustomerName','CustomerEmail','CustomerContactNumber','CustomerAddress','SeaPortID','OtherSeaport','OtherCountryName','DeliveryAddress','OrderStatus'];

    public function allmodels()
    {
        return $this->belongsto('App\Model\CarModel','ModelID');
    }

    public function seaport()
    {
        return $this->belongsto('App\Model\SeaPort','SeaPortID');
    }
}
