<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'CompanyID';

    protected $table = 'companies';

    protected $fillable = ['CompanyName','Address','Country'];
}
