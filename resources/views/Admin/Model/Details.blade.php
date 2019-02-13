@extends('layouts.admin')

@section('content')

<style>
    .content-wrapper, .main-footer{
        margin-left:0px;
    }
</style>
{{--  <section class="car-project-page">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4 border-0">
                    <img class="card-img-top" src="/images/CarImages/ModelID-4_ThumbImage.jpg" alt="Image">
                    <a class="more-image" href="#image-gallery"><i class="fas fa-eye"></i>View Gallery</a>
                </div>
            </div>
            <div class="col-md-6 bacground-transparent">
                <div class="mb-4 border-0">
                    <h2>Marcentiz benz</h2>
                    <h3 class="price">$ 355656 USD</h3>
                    <h4>Made in Country1</h4>
                    <h5>Year of Release: 2018</h5>

                </div>

                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <div class="card mb-4 border-0">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="http://127.0.0.1:8000/GetQuotaion/4">
                                    <button class="btn btn-primary">Get Quotation</button>
                                </a>
                        </div>
                        <div class="col-md-6">
                            <a href="http://127.0.0.1:8000/Paybill">
                                    <button class="btn btn-primary" type="submit">Pay Bill</button>
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
            <h3>Mercedes-Benz C-Class Cabriolet Overview</h3>
        </div>
        <div class="row bacground-white">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title text-green"><i class="fas fa-users">&nbsp;</i>&nbsp;<span class="text-secondary">Engine Type</span></h5>
                        <p class="text-secondary"> Petrol Engine</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span class="text-secondary">Displacement</span></h5>
                        <p class="text-secondary"> 1991 CC</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title text-green"><i class="fas fa-headset">&nbsp;</i>&nbsp;<span class="text-secondary">Power</span></h5>
                        <p class="text-secondary"> 258 bhp@5800-6100 rpm</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title text-green"><i class="fas fa-users">&nbsp;</i>&nbsp;<span class="text-secondary">Torque</span></h5>
                        <p class="text-secondary"> 370 Nm@1800-4000 rpm</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title text-green"><i class="fas fa-cogs">&nbsp;</i>&nbsp;<span class="text-secondary">Mileage</span></h5>
                        <p class="text-secondary">N/A</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title text-green"><i class="fas fa-headset">&nbsp;</i>&nbsp;<span class="text-secondary">Transmission</span></h5>
                        <p class="text-secondary"> Automatic</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title text-green"><i class="fas fa-headset">&nbsp;</i>&nbsp;<span class="text-secondary">Drive Train</span></h5>
                        <p class="text-secondary"> RWD</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title text-green"><i class="fas fa-headset">&nbsp;</i>&nbsp;<span class="text-secondary">Number of Gears</span></h5>
                        <p class="text-secondary"> 6</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title text-green"><i class="fas fa-headset">&nbsp;</i>&nbsp;<span class="text-secondary">Number of Cylinders</span></h5>
                        <p class="text-secondary"> 6</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title text-green"><i class="fas fa-headset">&nbsp;</i>&nbsp;<span class="text-secondary">Performance 0 To 100 Kmph</span></h5>
                        <p class="text-secondary"> 6.2 seconds</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title text-green"><i class="fas fa-headset">&nbsp;</i>&nbsp;<span class="text-secondary">Maximum Speed</span></h5>
                        <p class="text-secondary"> 156</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title text-green"><i class="fas fa-headset">&nbsp;</i>&nbsp;<span class="text-secondary">Fuel Tank Capacity</span></h5>
                        <p class="text-secondary"> 155</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

<section class="car-specifications">
    <div class="container">
        <div class="car-section-header text-center">
            <h3>Mercedes-Benz C-Class Cabriolet Specifications</h3>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="car-accordion-card">
                <div class="car-accordion-card" id="headingOne">
                    <a href="" class="car-accordion-collapse collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
                        aria-controls="collapseOne">DIMENSIONS</a>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="data-grid grid">
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Length</div>
                            <div class="data-grid__val"> 4686 mm</div>
                        </div>
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Width</div>
                            <div class="data-grid__val"> 1810 mm</div>
                        </div>
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Height</div>
                            <div class="data-grid__val"> 1409 mm</div>
                        </div>
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Wheelbase</div>
                            <div class="data-grid__val"> 2840 mm</div>
                        </div>
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Gross Weight</div>
                            <div class="data-grid__val"> 2200 Kg</div>
                        </div>
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Seating Capacity</div>
                            <div class="data-grid__val"> 6</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="car-accordion-card">
                <div class="car-accordion-card" id="headingTwo">
                    <a href="" class="car-accordion-collapse collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo">WHEELS &
                            TYRES</a>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="data-grid grid">
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Wheel Type</div>
                            <div class="data-grid__val"> Alloy Wheels</div>
                        </div>
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Front Tyre Size</div>
                            <div class="data-grid__val"> 235 / 35 R17</div>
                        </div>
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Rear Tyre Size</div>
                            <div class="data-grid__val"> 235 / 30 R17</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="car-accordion-card">
                <div class="car-accordion-card" id="headingThree">
                    <a href="" class="car-accordion-collapse collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">BRAKING
                            SYSTEM</a>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="data-grid grid">
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Front Brake Type</div>
                            <div class="data-grid__val"> Disc</div>
                        </div>
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Rear Brake Type</div>
                            <div class="data-grid__val"> Disc</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="car-accordion-card">
                <div class="car-accordion-card" id="headingFour">
                    <a href="" class="car-accordion-collapse collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                        aria-controls="collapseFour">SUSPENSION</a>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="data-grid grid">
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Front Suspension</div>
                            <div class="data-grid__val"> AGILITY CONTROL</div>
                        </div>
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Rear Suspension</div>
                            <div class="data-grid__val"> AGILITY CONTROL</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="car-accordion-card">
                <div class="car-accordion-card" id="headingFour">
                    <a href="" class="car-accordion-collapse collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false"
                        aria-controls="collapseFour">STEERING</a>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="data-grid grid">
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Power Steering</div>
                            <div class="data-grid__val"> Yes</div>
                        </div>
                        <div class="data-grid__row grid grid-2">
                            <div class="data-grid__label">Steering Type</div>
                            <div class="data-grid__val"> Yes</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="car-project-page" id="image-gallery">
    <div class="car-section-header text-center">
        <h3>Mercedes-Benz C-Class Cabriolet Photos</h3>
    </div>

    <div class="container">
        <div id="gg-screen"></div>
        <div class="row">

            <div class="col-md-3 card mb-3 border-0 gg-element" id="gg-element">
                <img class="card-img-top" id="card-img-top" src="/images/CarImages/ModelID-4_1.jpg" alt="">
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
            <div class="col-md-3 card mb-3 border-0 gg-element" id="gg-element">
                <img class="card-img-top" id="card-img-top" src="/images/CarImages/ModelID-4_2.jpg" alt="">
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
            <div class="col-md-3 card mb-3 border-0 gg-element" id="gg-element">
                <img class="card-img-top" id="card-img-top" src="/images/CarImages/ModelID-4_3.jpg" alt="">
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
            <div class="col-md-3 card mb-3 border-0 gg-element" id="gg-element">
                <img class="card-img-top" id="card-img-top" src="/images/CarImages/ModelID-4_4.jpg" alt="">
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
            <div class="col-md-3 card mb-3 border-0 gg-element" id="gg-element">
                <img class="card-img-top" id="card-img-top" src="/images/CarImages/ModelID-4_5.jpg" alt="">
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
            <div class="col-md-3 card mb-3 border-0 gg-element" id="gg-element">
                <img class="card-img-top" id="card-img-top" src="/images/CarImages/ModelID-4_6.jpg" alt="">
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
            <div class="col-md-3 card mb-3 border-0 gg-element" id="gg-element">
                <img class="card-img-top" id="card-img-top" src="/images/CarImages/ModelID-4_7.jpg" alt="">
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
            <div class="col-md-3 card mb-3 border-0 gg-element" id="gg-element">
                <img class="card-img-top" id="card-img-top" src="/images/CarImages/ModelID-4_8.jpg" alt="">
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
        </div>
    </div>
</section>  --}}

@endsection
