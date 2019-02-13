<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClientInformation extends Model
{
    protected $primaryKey = 'Companyid';

    protected $table = 'clientinformations';

    protected $fillable = ['COmpanyName', 'CompanyAddress', 'CompanySlogan',
    'CompanyTitle','PhoneNo','MobileNo','Email','CompanyLogo','GoogleMapLink',
    'FacebookLink','GooglePlusLink','TwitterLink','YoutubeLink','LinkedinLink'];
}
