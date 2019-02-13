<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    protected $primaryKey = 'ImageID';

    protected $table = 'carimages';

    protected $fillable = ['ImagePath','ModelID','ThumbImage','CardImage'];
    
    
}
