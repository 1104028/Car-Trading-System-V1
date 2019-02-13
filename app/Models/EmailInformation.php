<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmailInformation extends Model
{
    protected $primaryKey = 'EmailID_PK';

    protected $table = 'emailinformations';

    protected $fillable = ['SMTPclientAddr','SMTPclientPort','hostID','hostPass','notficationemail'];
}
