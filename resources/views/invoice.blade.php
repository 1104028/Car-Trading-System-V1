<?php
use App\DataLayer\CarTradingDBAccess;
$DBAAccess = new CarTradingDBAccess();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

        td {
            font-size: 20px;
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
</head>
<body>
        <div style="border-color: #ddd;margin-bottom: 20px;background-color: #fff;border: 1px solid transparent;border-radius: 4px;box-shadow: 0 1px 1px rgba(0,0,0,.05);">
                <div style="background-color: #f5f5f5;border-color: #ddd;padding: 10px 15px;border-bottom: 1px solid transparent;border-top-left-radius: 3px;border-top-right-radius: 3px;">
                    <h2 class="text-center" style="text-align:center;">Nirapod Limited</h3>
                </div>
        </div>
        <div class="container">
                <div class="row">
                    <div style="width: 100%;">
                        <div style="text-align: center;">
                            <h2>Quotation No: <strong>{{ $quotation->InvoiceNo }}</strong></h2>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div style="float: left!important; width: 29.33333333%;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                                <div style="min-height: 200px;border-color: #ddd;margin-bottom: 20px;background-color: #fff;border: 1px solid transparent;border-radius: 4px;box-shadow: 0 1px 1px rgba(0,0,0,.05);">
                                    <div style="background-color: #f5f5f5;border-color: #ddd;padding: 10px 15px;border-bottom: 1px solid transparent;border-top-left-radius: 3px;border-top-right-radius: 3px;text-align: center;">Customer Details</div>
                                    <div style="padding: 15px;">
                                        <strong>
                                            Customer Name:
                                        </strong> {{ $allorders->CustomerName }}
                                        <br>
        
                                        <strong>
                                            Customer Email:
                                        </strong> {{ $allorders->CustomerEmail }}
                                        <br>
        
                                        <strong>
                                            Contact Number:
                                        </strong> {{ $allorders->CustomerContactNumber }}
                                        <br>
        
                                        <strong>
                                            Address:
                                        </strong> {{ $allorders->CustomerAddress }}
                                        <br/>
        
                                    </div>
                                </div>
                            </div>
                            
                            <div style="float: left!important; width: 29.33333333%;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                                <div style="min-height: 200px;border-color: #ddd;margin-bottom: 20px;background-color: #fff;border: 1px solid transparent;border-radius: 4px;box-shadow: 0 1px 1px rgba(0,0,0,.05);">
                                    <div style="background-color: #f5f5f5;border-color: #ddd;padding: 10px 15px;border-bottom: 1px solid transparent;border-top-left-radius: 3px;border-top-right-radius: 3px;text-align: center;">Quotation Details</div>
                                    <div style="padding: 15px;">
                                        <strong>Model Name:</strong> {{ $allorders->allmodels->ModelName }}
                                        <br>
        
                                        <?php
                                        $countryname = $DBAAccess->FindCountryNameByBrandId($allorders->allmodels->BrandID);
                                        $companyname = $DBAAccess->FindCompanyNameByBrandId($allorders->allmodels->BrandID);
                                        ?>
                                        <strong>Company Name:</strong> {{ $companyname }}<br>
                                        <strong>Country:</strong> {{ $countryname }}<br>
                                        <strong>Year Of Release:</strong> {{ $allorders->allmodels->YearOfRelease }}<br>
                                    </div>
                                </div>
                            </div>
        
                            <div style="float: left!important; width: 29.33333333%;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                                <div style="min-height: 200px;border-color: #ddd;margin-bottom: 20px;background-color: #fff;border: 1px solid transparent;border-radius: 4px;box-shadow: 0 1px 1px rgba(0,0,0,.05);">
                                    <div style="background-color: #f5f5f5;border-color: #ddd;padding: 10px 15px;border-bottom: 1px solid transparent;border-top-left-radius: 3px;border-top-right-radius: 3px;text-align: center;">Shipping Address</div>
                                    <div style="padding: 15px;">
        
                                        <strong>Name:</strong>{{ $allorders->CustomerName }}<br>
                                        <strong>Country: </strong>
        
                                        <?php
                                        $seaport = $DBAAccess->FindCountryBySeaPortId($allorders->SeaPortID);
                                        ?>
        
                                        @if($allorders->OtherCountryName!=null) {{ $allorders->OtherCountryName }}<br>
                                        <strong>Port: </strong> {{ $allorders->OtherSeaport }} @else {{ $seaport->countries->CountryName
                                        }}<br>
                                        <strong>Port: </strong> {{ $seaport->SerPortName }} @endif
        
                                        <strong>Address: </strong> {{ $allorders->DeliveryAddress }}
        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div style="width: 100%;">
                        <div style="border-color: #ddd;margin-bottom: 20px;background-color: #fff;border: 1px solid transparent;border-radius: 4px;box-shadow: 0 1px 1px rgba(0,0,0,.05);">
                            <div style="background-color: #f5f5f5;border-color: #ddd;padding: 10px 15px;border-bottom: 1px solid transparent;border-top-left-radius: 3px;border-top-right-radius: 3px;">
                                <h3 style="text-align: center;font-size: 24px;margin-top: 20px;margin-bottom: 10px;"><strong>Quotation summary</strong></h3>
                            </div>
                            <div style="padding: 15px;">
                                <div class="table-responsive">
                                    <table class="table table-condensed" style="border: 2px solid black;text-align:center;">
                                        <thead>
                                        <tr style="border: 2px solid black;text-align:center;">
                                            <td style="border: 2px solid black;text-align:center;"><strong>Item Name</strong></td>
                                            <td style="border: 2px solid black;text-align:center;"><strong>Base Price</strong></td>
                                            <td style="border: 2px solid black;text-align:center;"><strong>Item Quantity</strong></td>
                                            <td style="border: 2px solid black;text-align:center;"><strong>Total</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                
                                        <tr style="border: 2px solid black;text-align:center;">
                                            <td style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->ModelName }}</td>
                                            <td style="border: 2px solid black;text-align:center;">${{ $quotation->BasePrice }}</td>
                                            <td style="border: 2px solid black;text-align:center;">1</td>
                                            <td style="border: 2px solid black;text-align:center;">${{ $quotation->BasePrice }} USD</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="highrow" style="border: 2px solid black;text-align:center;"></td>
                                            <td class="highrow" style="border: 2px solid black;text-align:center;"></td>
                                            <td class="highrow text-center" style="border: 2px solid black;text-align:center;"><strong>Car Base Price</strong></td>
                                            <td class="highrow text-center" style="border: 2px solid black;text-align:center;">$ {{ $quotation->BasePrice }} USD</td>
                                        </tr>
                                        <tr>
        
                                            <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                            <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                            <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;" ><strong>Shipping Cost</strong></td>
                                            <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;">$ {{ $quotation->SeaPortCost }} USD</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                            <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                            <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;"><strong>Local Transpotation Cost</strong></td>
                                            <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;">${{ $quotation->TranspotationCost }} USD</td>
                                        </tr>
        
                                        <tr>
                                            <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                            <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                            <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;"><strong>Consumption Cost</strong></td>
                                            <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;">$ {{ $quotation->ConsumptionCost }} USD</td>
                                        </tr>
                                        <tr>
                                                <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                                <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                                <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;"><strong>Documentation Cost</strong></td>
                                                <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;">$ {{ $quotation->DocumentationCost }} USD</td>
                                            </tr>
        
                                            <tr>
                                                    <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                                    <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                                    <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;"><strong>Recycling Cost</strong></td>
                                                    <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;">$ {{ $quotation->RecyclingCost }} USD</td>
                                                </tr>
        
                                                <tr>
                                                        <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                                        <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                                        <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;"><strong>Inspection Cost</strong></td>
                                                        <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;">$ {{ $quotation->InspectionCost }} USD</td>
                                                    </tr>
                                                    
                                        <tr>
                                            <td class="highrow" style="border: 2px solid black;text-align:center;"></td>
                                            <td class="highrow" style="border: 2px solid black;text-align:center;"></td>
                                            <td class="highrow text-center" style="border: 2px solid black;text-align:center;"><strong>Total</strong></td>
                                            <td class="highrow text-center" style="border: 2px solid black;text-align:center;">$ {{ $totalprice }} USD</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                            <td class="emptyrow" style="border: 2px solid black;text-align:center;"></td>
                                            <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;"><strong>Amount In Words</strong></td>
                                            <td class="emptyrow text-center" style="border: 2px solid black;text-align:center;"> {{ $amountinword }} USD</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div style="width: 80%;">
        
                        <h3 style="text-align: left;font-size: 24px;"><strong>[Payee Account]</strong></h3>
                        <h5 style="text-align: left;font-size: 20px;">BANK NAME： NRB COMMERCIAL BANK LIMITED</h5>
                        <h5 style="text-align: left;font-size: 20px;">BRANCH NAME: HEMAYETPUR BRANCH</h5>
                        <h5 style="text-align: left;font-size: 20px;">ACCOUNT NUMBER： 010733300000362</h5>
                        <h5 style="text-align: left;font-size: 20px;">ACCOUNT NAME： NIRAPOD.BANGLA SOLUTIONS LIMITED</h5>
                        <h5><span style="color:red;font-size:16px;">*Please contact your CNF partner to determine the LC and TT amount. Please ask our help if needed.</span></h5>
                    </div>
                    <div style="width: 20%;">
        
                    </div>
        
                </div>
            </div>
            <div class="row">
                <div style="width:100%;">
                    <div style="border-color: #ddd;margin-bottom: 20px;background-color: #fff;border: 1px solid transparent;border-radius: 4px;box-shadow: 0 1px 1px rgba(0,0,0,.05);">
                        <div style="background-color: #f5f5f5;border-color: #ddd;padding: 10px 15px;border-bottom: 1px solid transparent;border-top-left-radius: 3px;border-top-right-radius: 3px;">
                            <h3 style="text-align: center;"><strong>Car Description</strong></h3>
                        </div>
        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed" style="border: 2px solid black;text-align:center;">
                                    <thead>
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;"><strong>Properties</strong></td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;"><strong>Value</strong></td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;"><strong>Properties</strong></td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;"><strong>Value</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Model</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->ModelName }}</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Length</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->Length }}</td>
                                    </tr>
        
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Country og Origin</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $countryname }}</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">
                                            Width
                                        </td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->Width }}</td>
        
                                    </tr>
                                    <tr style="border: 2px solid black;text-align:center;">
        
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Year Of Release</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->YearOfRelease }}</td>
                                        <td class="text-center"style="border: 2px solid black;text-align:center;">
                                            Height
                                        </td>
                                        <td class="text-center">{{ $allorders->allmodels->Height }}</td>
                                    </tr>
        
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Engine Type</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->EngineType }}</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Wheelbase</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->Wheelbase }}</td>
                                    </tr>
        
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Displacement</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->Displacement }}</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Gross Weight</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->GrossWeight }}</td>
                                    </tr>
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Power</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->Power }}</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">
                                            Seating Capacity
                                        </td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->SeatingCapacity }}</td>
                                    </tr>
        
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Torque</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->Torque }}</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Wheel Type</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->WheelType }}</td>
                                    </tr>
        
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Mileage</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">N/A</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">
                                            Front Tyre Size
                                        </td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->FrontTyreSize }}</td>
                                    </tr>
        
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Transmission</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->Transmission }}</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Rear Tyre Size</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->RearTyreSize }}</td>
                                    </tr>
        
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Drive Train</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->DriveTrain }}</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Front Brake Type</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->FrontBrakeType }}</td>
                                    </tr>
        
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Number of Gears</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->NumberOfGears }}</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Rear Brake Type</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->RearBrakeType }}</td>
                                    </tr>
        
                                    <tr style="border: 2px solid black;text-align:center;"> 
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Number of Cylinders</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->NumberofCylinders }}</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Front Suspension</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->FrontSuspension }}</td>
                                    </tr>
        
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Performance 0 To 100 Kmph</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->Performance0To100Kmph }}</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Rear Suspension</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->RearSuspension }}</td>
                                    </tr>
        
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Maximum Speed</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->MaximumSpeed }}</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Power Steering</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->PowerSteering }}</td>
                                    </tr>
        
                                    <tr style="border: 2px solid black;text-align:center;">
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Fuel Tank Capacity</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->FuelTankCapacity }}</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">Steering Type</td>
                                        <td class="text-center" style="border: 2px solid black;text-align:center;">{{ $allorders->allmodels->SteeringType }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>


