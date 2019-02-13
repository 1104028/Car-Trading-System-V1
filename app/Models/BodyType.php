<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    protected $primaryKey = 'BodyTypeID';

    protected $table = 'bodytypes';

    protected $fillable = ['BodyTypeName','BodyTypeImage'];
}
