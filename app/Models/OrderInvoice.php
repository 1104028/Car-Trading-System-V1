<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderInvoice extends Model
{
    protected $primaryKey = 'OrderInvoiceID';

    protected $table = 'orderinvoices';

    protected $fillable = ['InvoiceNo','OrderID','BasePrice','SeaPortCost','TranspotationCost',
    'ConsumptionCost','DocumentationCost','RecyclingCost','InspectionCost'];
}
