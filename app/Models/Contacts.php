<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'contacts';

    protected $fillable = ['FirstName','LastName','Email','Phone_number',
                            'Message','Subject'];
}
