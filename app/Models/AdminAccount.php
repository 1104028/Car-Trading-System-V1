<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminAccount extends Model
{
    protected $primaryKey = 'AdminID';

    protected $table = 'adminaccounts';

    protected $fillable = ['Name','Email','ContactNumber','UserName','Password'];
}
