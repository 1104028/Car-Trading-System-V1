@extends('layouts.main')

<?php
use App\DataLayer\CarTradingDBAccess;
?>

@section('title')
    Car Details
@endsection

@section('content')
    <section class="car-project-page">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4 border-0">
                        @foreach ($cardetails->carimages as $item)
                            @if($item->ThumbImage==true)
                                <img class="card-img-top" src="{{ URL::to('/images/CarImages/' . $item->ImagePath) }}" alt="{{ $item->ImagePath}}"/>
                            @endif
                        @endforeach
                        <a class="more-image" href="#image-gallery"><i class="fas fa-eye"></i>View Gallery</a>
                    </div>
                </div>
                <div class="col-md-6 bacground-transparent">
                    <div class="mb-4 border-0">
                        <h2>{{ $cardetails->ModelName }}</h2>
                        <h3 class="price">$ {{ $cardetails->Price }} USD <br>
                        
                            <span style="color: red;font-size:1rem;" id="warning">(This is the base price, shipping and others are not included)</span></h3>
                        <?php
                        $DBAAccess = new CarTradingDBAccess();
                        $countryname = $DBAAccess->FindCountryNameByBrandId($cardetails->BrandID);

                        ?>
                        <h4>Made in {{ $countryname }}</h4>
                        <h5>Year of Release: {{ $cardetails->YearOfRelease }}</h5>

                    </div>

                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <div class="card mb-4 border-0">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('GetQuotaion', $cardetails->ModelID) }}">
                                    <button class="btn btn-primary">Get Free Quote</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('Paybill') }}">
                                    <button class="btn btn-primary" type="submit">Payment</button>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="car-overview">
        <div class="container">
            <div class="car-section-header text-center">
                <h3>{{ $cardetails->ModelName }} Overview</h3>
            </div>
            <div class="row bacground-white">
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span
                                        class="text-secondary">Engine Type</span></h5>
                            <p class="text-secondary"> {{ $cardetails->EngineType }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span
                                        class="text-secondary">Displacement</span></h5>
                            <p class="text-secondary"> {{ $cardetails->Displacement }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span
                                        class="text-secondary">Power</span></h5>
                            <p class="text-secondary"> {{ $cardetails->Power }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span
                                        class="text-secondary">Torque</span></h5>
                            <p class="text-secondary"> {{ $cardetails->Torque }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span
                                        class="text-secondary">Mileage</span></h5>
                            <p class="text-secondary">N/A</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span
                                        class="text-secondary">Transmission</span></h5>
                            <p class="text-secondary"> {{ $cardetails->Transmission }}</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span
                                        class="text-secondary">Drive Train</span></h5>
                            <p class="text-secondary"> {{ $cardetails->DriveTrain }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span
                                        class="text-secondary">Number of Gears</span></h5>
                            <p class="text-secondary"> {{ $cardetails->NumberOfGears }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span
                                        class="text-secondary">Number of Cylinders</span></h5>
                            <p class="text-secondary"> {{ $cardetails->NumberofCylinders }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span
                                        class="text-secondary">Performance 0 To 100 Kmph</span></h5>
                            <p class="text-secondary"> {{ $cardetails->Performance0To100Kmph }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span
                                        class="text-secondary">Maximum Speed</span></h5>
                            <p class="text-secondary"> {{ $cardetails->MaximumSpeed }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span
                                        class="text-secondary">Fuel Tank Capacity</span></h5>
                            <p class="text-secondary"> {{ $cardetails->FuelTankCapacity }}</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="car-specifications">
        <div class="container">
            <div class="car-section-header text-center">
                <h3>{{ $cardetails->ModelName }} Specifications</h3>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="car-accordion-card">
                    <div class="car-accordion-card" id="headingOne">
                        <a href="" class="car-accordion-collapse collapsed" data-toggle="collapse"
                           data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">DIMENSIONS</a>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="data-grid grid">
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Length</div>
                                <div class="data-grid__val"> {{ $cardetails->Length }}</div>
                            </div>
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Width</div>
                                <div class="data-grid__val"> {{ $cardetails->Width }}</div>
                            </div>
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Height</div>
                                <div class="data-grid__val"> {{ $cardetails->Height }}</div>
                            </div>
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Wheelbase</div>
                                <div class="data-grid__val"> {{ $cardetails->Wheelbase }}</div>
                            </div>
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Gross Weight</div>
                                <div class="data-grid__val"> {{ $cardetails->GrossWeight }}</div>
                            </div>
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Seating Capacity</div>
                                <div class="data-grid__val"> {{ $cardetails->SeatingCapacity }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="car-accordion-card">
                    <div class="car-accordion-card" id="headingTwo">
                        <a href="" class="car-accordion-collapse collapsed" data-toggle="collapse"
                           data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">WHEELS &
                            TYRES</a>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="data-grid grid">
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Wheel Type</div>
                                <div class="data-grid__val"> {{ $cardetails->WheelType }}</div>
                            </div>
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Front Tyre Size</div>
                                <div class="data-grid__val"> {{ $cardetails->FrontTyreSize }}</div>
                            </div>
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Rear Tyre Size</div>
                                <div class="data-grid__val"> {{ $cardetails->RearTyreSize }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="car-accordion-card">
                    <div class="car-accordion-card" id="headingThree">
                        <a href="" class="car-accordion-collapse collapsed" data-toggle="collapse"
                           data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">BRAKING
                            SYSTEM</a>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                         data-parent="#accordionExample">
                        <div class="data-grid grid">
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Front Brake Type</div>
                                <div class="data-grid__val"> {{ $cardetails->FrontBrakeType }}</div>
                            </div>
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Rear Brake Type</div>
                                <div class="data-grid__val"> {{ $cardetails->RearBrakeType }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="car-accordion-card">
                    <div class="car-accordion-card" id="headingFour">
                        <a href="" class="car-accordion-collapse collapsed" data-toggle="collapse"
                           data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">SUSPENSION</a>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                         data-parent="#accordionExample">
                        <div class="data-grid grid">
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Front Suspension</div>
                                <div class="data-grid__val"> {{ $cardetails->FrontSuspension }}</div>
                            </div>
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Rear Suspension</div>
                                <div class="data-grid__val"> {{ $cardetails->RearSuspension }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="car-accordion-card">
                    <div class="car-accordion-card" id="headingFour">
                        <a href="" class="car-accordion-collapse collapsed" data-toggle="collapse"
                           data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFour">STEERING</a>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                         data-parent="#accordionExample">
                        <div class="data-grid grid">
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Power Steering</div>
                                <div class="data-grid__val"> {{ $cardetails->PowerSteering }}</div>
                            </div>
                            <div class="data-grid__row grid grid-2">
                                <div class="data-grid__label">Steering Type</div>
                                <div class="data-grid__val"> {{ $cardetails->SteeringType }}</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="car-project-page" id="image-gallery">
        <div class="car-section-header text-center">
            <h3>{{ $cardetails->ModelName }} Photos</h3>
        </div>

        <div class="container">
            <div id="gg-screen"></div>
            <div class="row">

                @foreach ($cardetails->carimages as $item)
                    @if($item->CardImage == false && $item->ThumbImage==false)
                        <div class="col-md-3 card mb-3 border-0 gg-element" id="gg-element">
                            <img class="card-img-top" id="card-img-top" src="{{ URL::to('/images/CarImages/' . $item->ImagePath) }}"
                                 alt="">
                            <div class="card-img-overlay car-overlay">
                                <div class="car-display-table">
                                    <div class="car-display-table-cell">
                                        <div class="car-overlay-body text-center">
                                            <a href=""><i class="fas fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection   