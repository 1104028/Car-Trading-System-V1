<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BankAccountInformation extends Model
{
    protected $primaryKey = 'BankAccountID';

    protected $table = 'bankaccounts';

    protected $fillable = ['BankAccountName','BankAccountNumber','BankName','Branch','SWIFTCode','ContactPerson','ContactNumber'];
}
