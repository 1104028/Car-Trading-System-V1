<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BankPay extends Model
{
    protected $primaryKey = 'PayId';

    protected $table = 'bankpays';

    protected $fillable = ['OrderInvoiceID','BankName','BranchName','AccountName',
                            'AccountNumber','BankIdentifierCode','Date','Amount','BankReciptImage'];
}
