@extends('layouts.admin')

<?php
use App\DataLayer\CarTradingDBAccess;
$DBAAccess = new CarTradingDBAccess();
?>

@section('content')

    <h2 style="text-align:center;">Order Details</h2>
    <style>
        .height {
            min-height: 200px;
        }

        .icon {
            font-size: 47px;
            color: #5CB85C;
        }

        .iconbig {
            font-size: 77px;
            color: #5CB85C;
        }

        .table > tbody > tr > .emptyrow {
            border-top: none;
        }

        .table > thead > tr > .emptyrow {
            border-bottom: none;
        }

        .table > tbody > tr > .highrow {
            border-top: 3px solid;
        }
    </style>

    <form method="POST" action="{{ route('invoicepost') }}">
        {{ csrf_field() }}

        <script>
            function TotalCostCalculation() {

                var baseprice = document.getElementById("BasePrice").value;


                var seaportcost = document.getElementById("SeaPortCost").value;
                var transpotationcost = document.getElementById("TranspotationCost").value;
                var consumptioncost = document.getElementById("ConsumptionCost").value;
                var documentationcost = document.getElementById("DocumentationCost").value;
                var recyclingcost = document.getElementById("RecyclingCost").value;
                var inspectioncost = document.getElementById("InspectionCost").value;

                if (baseprice && seaportcost && transpotationcost && consumptioncost && documentationcost && recyclingcost && inspectioncost) {

                    base = parseFloat(baseprice);
                    seaport = parseFloat(seaportcost);
                    transportation = parseFloat(transpotationcost);
                    consumption = parseFloat(consumptioncost);
                    documentation = parseFloat(documentationcost);
                    recycling = parseFloat(recyclingcost);
                    inspection = parseFloat(inspectioncost);


                    var total = base + seaport + transportation + consumption + documentation + recycling + inspection;
                    document.getElementById("TotalCost").value = total;
                }

            }
        </script>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center">
                        <h2>Quotation No: <strong>{{ $invoiceno }}</strong></h2>

                        <input type="hidden" name="InvoiceNo" value="{{ $invoiceno }}">
                        <input type="hidden" name="OrderID" value="{{ $allorders->OrderID }}">
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-md-4 col-lg-4 pull-left">
                            <div class="panel panel-default height">
                                <div class="panel-heading">Customer Details</div>
                                <div class="panel-body">
                                    <strong>
                                        Name:
                                    </strong> {{ $allorders->CustomerName }}
                                    <input type="hidden" name="CustomerName" value="{{ $allorders->CustomerName }}">
                                    <br>

                                    <strong>
                                        Email:
                                    </strong> {{ $allorders->CustomerEmail }}
                                    <input type="hidden" name="CustomerEmail" value="{{ $allorders->CustomerEmail }}">
                                    <br>

                                    <strong>
                                        Contact Number:
                                    </strong> {{ $allorders->CustomerContactNumber }}
                                    <input type="hidden" name="CustomerContactNumber"
                                           value="{{ $allorders->CustomerContactNumber }}">
                                    <br>

                                    <strong>
                                        Address:
                                    </strong> {{ $allorders->CustomerAddress }}
                                    <input type="hidden" name="CustomerAddress"
                                           value="{{ $allorders->CustomerAddress }}">
                                    <br/>

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-4">
                            <div class="panel panel-default height">
                                <div class="panel-heading">Quotation Details</div>
                                <div class="panel-body">
                                    <strong>Model:</strong> {{ $allorders->allmodels->ModelName }}
                                    <input type="hidden" name="ModelName"
                                           value="{{ $allorders->allmodels->ModelName }}">
                                    <br>

                                    <?php
                                    $countryname = $DBAAccess->FindCountryNameByBrandId($allorders->allmodels->BrandID);
                                    $companyname = $DBAAccess->FindCompanyNameByBrandId($allorders->allmodels->BrandID);
                                    $brandname = $DBAAccess->FindBrandNameByBrandId($allorders->allmodels->BrandID);
                                    ?>
                                    <strong>Maker:</strong> {{ $companyname }}<br>
                                    <strong>Brand:</strong> {{ $brandname }}<br>
                                    <strong>Country of Origin:</strong> {{ $countryname }}<br>
                                    <strong>Year Of Release:</strong> {{ $allorders->allmodels->YearOfRelease }}<br>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-4 col-lg-4">
                            <div class="panel panel-default height">
                                <div class="panel-heading">Shipping Address</div>
                                <div class="panel-body">

                                    <strong>Name:</strong>{{ $allorders->CustomerName }}<br>
                                    <strong>Country: </strong>

                                    <?php
                                    $seaport = $DBAAccess->FindCountryBySeaPortId($allorders->SeaPortID);
                                    ?>

                                    @if($allorders->OtherCountryName!=null) {{ $allorders->OtherCountryName }}<br>
                                    <strong>Port: </strong> {{ $allorders->OtherSeaport }} @else {{ $seaport->countries->CountryName
                                        }}<br>
                                    <strong>Port: </strong> {{ $seaport->SerPortName }} @endif

                                    <input type="hidden" name="OtherCountryName"
                                           value="{{ $allorders->OtherCountryName }}">
                                    <input type="hidden" name="PortName" value="{{ $seaport->SerPortName }}"><br>
                                    <strong>Address: </strong> {{ $allorders->DeliveryAddress }}
                                    <input type="hidden" name="DeliveryAddress"
                                           value="{{ $allorders->DeliveryAddress }}"><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="text-center"><strong>Quotation summary</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <td><strong>Item Name</strong></td>
                                        <td class="text-center"><strong>Base Price</strong></td>
                                        <td class="text-center"><strong>Quantity</strong></td>
                                        <td class="text-center"><strong>Total</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td> {{ $allorders->allmodels->ModelName }}</td>

                                        <td class="text-center">$ {{ $allorders->allmodels->Price }} USD</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">$ {{ $allorders->allmodels->Price }} USD</td>
                                    </tr>

                                    <tr>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow text-center"><strong>Car Base Price</strong></td>
                                        <td class="highrow text-center">$ <input data-val="true"
                                                                                 data-val-number="The field BasePrice must be a number."
                                                                                 data-val-required="The BasePrice field is required."
                                                                                 id="BasePrice" name="BasePrice"
                                                                                 onchange="TotalCostCalculation()"
                                                                                 type="text"
                                                                                 value="{{ $allorders->allmodels->Price }}"
                                            /> USD
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Shipping Cost</strong></td>
                                        <td class="emptyrow text-center">$<input data-val="true"
                                                                                 data-val-number="The field SeaPortCost must be a number."
                                                                                 data-val-required="The SeaPortCost field is required."
                                                                                 id="SeaPortCost" name="SeaPortCost"
                                                                                 onchange="TotalCostCalculation()"
                                                                                 type="number" value="0"/> USD
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Local Transpotation Cost</strong></td>
                                        <td class="emptyrow text-center">$<input data-val="true"
                                                                                 data-val-number="The field ShiftingCost must be a number."
                                                                                 data-val-required="The TranspotationCost field is required."
                                                                                 id="TranspotationCost"
                                                                                 name="TranspotationCost"
                                                                                 onchange="TotalCostCalculation()"
                                                                                 type="number" value="0"
                                            /> USD
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Consumption Cost</strong></td>
                                        <td class="emptyrow text-center">$ <input data-val="true"
                                                                                  data-val-number="The field VAT must be a number."
                                                                                  data-val-required="The ConsumptionCost field is required."
                                                                                  id="ConsumptionCost" name="ConsumptionCost"
                                                                                  onchange="TotalCostCalculation()"
                                                                                  type="number" value="0"
                                            /> USD
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Documentation Cost</strong></td>
                                        <td class="emptyrow text-center">$ <input data-val="true"
                                                                                  data-val-number="The field DocumentationCost must be a number."
                                                                                  data-val-required="The DocumentationCost field is required."
                                                                                  id="DocumentationCost" name="DocumentationCost"
                                                                                  onchange="TotalCostCalculation()"
                                                                                  type="number" value="0"
                                            /> USD
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Recycling Cost</strong></td>
                                        <td class="emptyrow text-center">$ <input data-val="true"
                                                                                  data-val-number="The field RecyclingCost must be a number."
                                                                                  data-val-required="The RecyclingCost field is required."
                                                                                  id="RecyclingCost" name="RecyclingCost"
                                                                                  onchange="TotalCostCalculation()"
                                                                                  type="number" value="0"
                                            /> USD
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Inspection Cost</strong></td>
                                        <td class="emptyrow text-center">$ <input data-val="true"
                                                                                  data-val-number="The field RecyclingCost must be a number."
                                                                                  data-val-required="The InspectionCost field is required."
                                                                                  id="InspectionCost" name="InspectionCost"
                                                                                  onchange="TotalCostCalculation()"
                                                                                  type="number" value="0"
                                            /> USD
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow text-center" style="font-size:20px;"><strong>Total</strong></td>
                                        <td class="highrow text-center">$ <input type="number" id="TotalCost" readonly
                                                                                  value="0" required/> USD
                                        </td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary" style="width:100%;" type="submit">Send Invoice</button>
                </div>

                <div class="col-md-3">

                </div>
            </div>
        </div>
    </form>
@endsection