@extends('layouts.admin')

@section('additionalScript')
    <script type="text/javascript">
        function ismodelnaemexists(id) {
          
            var form_input = [];
            form_input.push({name: '_token', value: '{{csrf_token()}}'});

            // Add hash object
            form_input.push({
                name: 'id', value: id
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('modelexist') }}",
                async: false,
                data: $.param(form_input),
                success: function (data) {
                    if(data==true)
                    {
                        alert('Model Name Already Exists!!, Please Try Another....');
                    }
                }
            });
        }
    </script>
@endsection

@section('content')
    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message
        </script>
    @endif

    @if ($errors->has('ModelName'))
        <script>
            alert('Model name Already Exists!!!'); // display string message
        </script>
    @endif

    <style>
        /*-------------------------------------Get Quotion form css ----------------------------*/
        .startern-section {
            padding: 80px 0;
        }
        
        .service-order-form-section {
            -webkit-box-shadow: 1px 1px 10px 0 rgba(0,0,0,.2);
            -moz-box-shadow: 1px 1px 10px 0 rgba(0,0,0,.2);
            box-shadow: 1px 1px 10px 0 rgba(0,0,0,.2);
        }
        
            .service-order-form-section h1 {
                color: #fff;
                background-color: #999fa4;
                text-align: center;
                margin: 0;
                padding: 30px 0
            }
        
        .service-order-form-section {
            -webkit-box-shadow: 1px 1px 10px 0 rgba(0,0,0,.2);
            -moz-box-shadow: 1px 1px 10px 0 rgba(0,0,0,.2);
            box-shadow: 1px 1px 10px 0 rgba(0,0,0,.2)
        }
        
        .service-order-form {
            padding: 40px;
            -webkit-transition: all .3s ease-in-out .1s;
            -moz-transition: all .3s ease-in-out .1s;
            transition: all .3s ease-in-out .1s
        }
        
        
        .progress_circles {
            margin: 2em 0;
            clear: both;
            display: inline-block;
            width: 100%;
            padding: 0
        }
        
            .progress_circles li {
                list-style: none;
                float: left;
                display: inline-block;
                height: 40px;
                box-sizing: border-box
            }
        
            .progress_circles .step {
                border: 2px solid #4EC2E7;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                line-height: 38px;
                text-align: center;
                color: #fff;
                font-weight: 700;
                background-color: #999fa4;
            }
        
                .progress_circles .step.active {
                    color: #fff;
                    background-color: #4EC2E7
                }
        
                .progress_circles .step.done {
                    border: 2px solid #999fa4;
                }
        
                .progress_circles .step.active ~ .step {
                    background-color: #fff;
                    color: #4EC2E7
                }
        
            .progress_circles .connector {
                background-color: #4EC2E7;
                width: 24.5%;
                border-bottom: 19px solid #ECF0F5;
                border-top: 19px solid #ECF0F5;
            }
        
        @media screen and (min-width:330px) and (max-width:480px) {
            .progress_circles .connector {
                width: 25%
            }
        
            .service-order-form {
                padding: 25px
            }
        }
        
        @media screen and (max-width:329px) {
            .progress_circles .connector {
                width: 25%
            }
        
            .service-order-form {
                padding: 10px
            }
        }
        
        .service-order-form label {
            font-weight: 400;
        }
        
        #form-verification-error {
            padding-bottom: 20px;
            color: #E04946;
            font-size: 2rem;
        }
        
        .service-order-form .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
            width: 100%;
        }
        
        .bootstrap-select > .dropdown-toggle {
            width: 100%;
            padding-right: 25px;
            z-index: 1;
        }
        
        .btn-order-form, .startern-contact-us-form label {
            font-weight: 500
        }
        
        .btn-order-form, .btn-order-form-select, .service-order-form .form-control {
            padding: 16px 16px;
            color: black;
            border: 1.5px solid #4EC2E7;
            border-radius: 4px;
            font-size: 18px;
            text-transform: none
        }
        
        .service-order-form .form-control {
            height: 59px;
        }
        
        .btn-order-form {
            font-size: 18px;
            padding: 12px 0;
            margin-top: 40px;
            cursor: pointer;
            color: #fff;
            background: #4EC2E7;
        }
        
            .btn-order-form:active, .btn-order-form:focus, .btn-order-form:hover, .btn-order-form:visited {
                text-decoration: none;
                color: #fff;
                background: #4EC2E7;
            }
        
        .how-it-works-process {
            padding: 60px 0
        }
        
        a.btn-order-form {
            color: white;
        }
        
        .input-group-addon {
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1;
            color: #FFF;
            text-align: center;
            background-color: #4EC2E7;
            border: 1px solid #4EC2E7;
            border-radius: 4px;
        }
    </style>
    <form method="POST" action="{{ route('car.store') }}">
        {{ csrf_field() }}

        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">

            <div class="service-order-form-section">
                <h1 class="myblink" style="display: block;">ADD A CAR</h1>

                <div class="service-order-form">
                    <ul class="progress_circles">
                        <li id="stepIndicator-1" class="step active">1</li>
                        <li class="connector"></li>
                        <li id="stepIndicator-2" class="step">2</li>
                        <li class="connector"></li>
                        <li id="stepIndicator-3" class="step">3</li>
                        <li class="connector"></li>
                        <li id="stepIndicator-4" class="step">4</li>
                    </ul>
                    <div id="form-verification-error">
                    </div>
                    <div id="test">
                    </div>
                    <div class="" id="order-step-1" style="display:block">
                        <div class="order-form form-group">
                            <label for="ModelName">Model Name</label>
                            <br>
                            <div class="btn-group bootstrap-select show-tick">
                                <input class="form-control text-box single-line" id="ModelName"
                                       name="ModelName" placeholder="Model Name" type="text"
                                       value="" onchange="ismodelnaemexists(this.value)"/>
                            </div>
                           
                        </div>

                        <div class="form-group" id="CompanyName">
                            <label for="CompanyID">Maker</label>
                            <br>
                            <div class="btn-group bootstrap-select show-tick">
                                <select class="form-control" data-val="true"
                                        data-val-number="The field CompanyID must be a number."
                                        data-val-required="The CompanyID field is required."
                                        id="CompanyID" name="CompanyID">
                                    <option value="">- Select A Maker -</option>
                                    @foreach($allcompany as $company)
                                    <option value="{{ $company->CompanyID }}">{{ $company->CompanyName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="brandname">
                            <label for="BrandID">Brand</label>
                            <br>
                            <div class="btn-group bootstrap-select show-tick">
                                <select class="form-control" data-val="true"
                                        data-val-number="The field BrandID must be a number."
                                        data-val-required="The BrandID field is required."
                                        id="BrandID" name="BrandID">
                                    <option value="">- Select A Brand -</option>
                                    @foreach($allbrands as $brand)
                                        <option value="{{ $brand->BrandID }}">{{ $brand->BrandName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="yearOfRelease">
                            <label for="YearOfRelease">Year Of Release</label>
                            <br>
                            <div class="btn-group bootstrap-select show-tick">
                                <select class="form-control" data-val="true"
                                        data-val-number="The field YearOfRelease must be a number."
                                        data-val-required="The YearOfRelease field is required."
                                        id="YearOfRelease" name="YearOfRelease">
                                    <option value="">- Select A Year -</option>
                                    @foreach($allyears as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
                        <div class="form-group" id="price">
                            <label for="">Price</label>
                            <div class="btn-group bootstrap-select show-tick">
                                <input class="form-control text-box single-line" id="Price"
                                       name="Price" placeholder="Car Price" type="number"
                                       value=""/>
                            </div>

                        </div>

                        <div class="form-group" id="bodyTypeID">
                            <label for="BodyTypeID">Body Type</label>
                            <br>
                            <div class="btn-group bootstrap-select show-tick">
                                <select class="form-control" data-val="true"
                                        data-val-number="The field BodyTypeID must be a number."
                                        data-val-required="The BodyTypeID field is required."
                                        id="BodyTypeID" name="BodyTypeID">
                                    <option value="">- Select A Body Type -</option>
                                    @foreach($allbodytype as $bodytype)
                                        <option value="{{ $bodytype->BodyTypeID }}">{{ $bodytype->BodyTypeName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div align="center">
                            <a class="btn-block btn-order-form" onclick="startern_show_step_2()">
                                NEXT
                            </a>
                        </div>
                    </div>
                    <div class="" id="order-step-2" style="display:none">
                            <div class="form-group" id="engineType">
                                    <label for="EngineType">Engine Type</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="EngineType"
                                               name="EngineType" placeholder="Engine Type" type="text"
                                               value=""/>
                                    </div>
        
                            </div>

                                <div class="form-group" id="displacement">
                                        <label for="Displacement">Displacement</label>
                                        <div class="btn-group bootstrap-select show-tick">
                                            <input class="form-control text-box single-line" id="Displacement"
                                                   name="Displacement" placeholder="Displacement" type="text"
                                                   value=""/>
                                        </div>
            
                                </div>

                                    <div class="form-group" id="power">
                                            <label for="Power">Power</label>
                                            <div class="btn-group bootstrap-select show-tick">
                                                <input class="form-control text-box single-line" id="Power"
                                                       name="Power" placeholder="Power" type="text"
                                                       value=""/>
                                            </div>
                
                                    </div>

                                        <div class="form-group" id="torque">
                                                <label for="Torque">Torque</label>
                                                <div class="btn-group bootstrap-select show-tick">
                                                    <input class="form-control text-box single-line" id="Torque"
                                                           name="Torque" placeholder="Torque" type="text"
                                                           value=""/>
                                                </div>
                    
                                        </div>
                                        <div class="form-group" id="transmission">
                                                <label for="Transmission">Transmission</label>
                                                <div class="btn-group bootstrap-select show-tick">
                                                    <input class="form-control text-box single-line" id="Transmission"
                                                           name="Transmission" placeholder="Transmission" type="text"
                                                           value=""/>
                                                </div>
                    
                                        </div>

                                        <div class="form-group" id="driveTrain">
                                                <label for="DriveTrain">DriveTrain</label>
                                                <div class="btn-group bootstrap-select show-tick">
                                                    <input class="form-control text-box single-line" id="DriveTrain"
                                                           name="DriveTrain" placeholder="DriveTrain" type="text"
                                                           value=""/>
                                                </div>
                    
                                        </div>

                                        <div class="form-group" id="numberOfGears">
                                                <label for="NumberOfGears">Number Of Gears</label>
                                                <div class="btn-group bootstrap-select show-tick">
                                                    <input class="form-control text-box single-line" id="NumberOfGears"
                                                           name="NumberOfGears" placeholder="Number Of Gears" type="number"
                                                           value=""/>
                                                </div>
                    
                                        </div>

                                        <div class="form-group" id="numberofCylinders">
                                                <label for="NumberofCylinders">Number of Cylinders</label>
                                                <div class="btn-group bootstrap-select show-tick">
                                                    <input class="form-control text-box single-line" id="NumberofCylinders"
                                                           name="NumberofCylinders" placeholder="Number of Cylinders" type="number"
                                                           value=""/>
                                                </div>
                    
                                        </div>

                                        <div class="form-group" id="performance0To100Kmph">
                                                <label for="Performance0To100Kmph">Performance 0 To 100Kmph</label>
                                                <div class="btn-group bootstrap-select show-tick">
                                                    <input class="form-control text-box single-line" id="Performance0To100Kmph"
                                                           name="Performance0To100Kmph" placeholder="Performance 0 To 100Kmph" type="text"
                                                           value=""/>
                                                </div>
                    
                                        </div>
                        <div align="center">
                            <a class="btn-block btn-order-form"
                               onclick="startern_show_step_3()">
                                NEXT
                            </a>
                        </div>
                        <div align="center" style="margin-top: -20px;">
                            <a class="btn-block btn-order-form" onclick="startern_show_step('1')">
                                BACK
                            </a>
                        </div>
                    </div>
                    <div class="" id="order-step-3" style="display:none">

                            <div class="form-group" id="maximumSpeed">
                                    <label for="MaximumSpeed">Maximum Speed</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="MaximumSpeed"
                                               name="MaximumSpeed" placeholder="Maximum Speed" type="number" step="0.1"
                                               value=""/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="fuelTankCapacity">
                                    <label for="FuelTankCapacity">Fuel Tank Capacity</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="FuelTankCapacity"
                                               name="FuelTankCapacity" placeholder="Fuel Tank Capacity" type="number" step="0.1"
                                               value=""/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="bodyColor">
                                    <label for="BodyColor">BodyColor</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="BodyColor"
                                               name="BodyColor" placeholder="Body Color" type="text"
                                               value=""/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="length">
                                    <label for="Length">Length</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="Length"
                                               name="Length" placeholder="Length" type="text"
                                               value=""/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="width">
                                    <label for="Width">Width</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="Width"
                                               name="Width" placeholder="Width" type="text"
                                               value=""/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="height">
                                    <label for="Height">Height</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="Height"
                                               name="Height" placeholder="Height" type="text"
                                               value=""/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="wheelbase">
                                    <label for="Wheelbase">Wheel Base</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="Wheelbase"
                                               name="Wheelbase" placeholder="Wheel Base" type="text"
                                               value=""/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="grossWeight">
                                    <label for="GrossWeight">Gross Weight</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="GrossWeight"
                                               name="GrossWeight" placeholder="Gross Weight" type="text"
                                               value=""/>
                                    </div>
                            </div>

                            <div class="form-group" id="seatingCapacity">
                                    <label for="SeatingCapacity">SeatingCapacity</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="SeatingCapacity"
                                               name="SeatingCapacity" placeholder="Seating Capacity" type="number"
                                               value=""/>
                                    </div>
        
                            </div>

                        <div align="center">
                                <a class="btn-block btn-order-form"
                                   onclick="startern_show_step_4()">
                                    NEXT
                                </a>
                            </div>
                            <div align="center" style="margin-top: -20px;">
                                <a class="btn-block btn-order-form" onclick="startern_show_step('2')">
                                    BACK
                                </a>
                            </div>
                    </div>

                    <div class="" id="order-step-4" style="display:none">

                            <div class="form-group" id="frontTyreSize">
                                    <label for="FrontTyreSize">Front Tyre Size</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="FrontTyreSize"
                                               name="FrontTyreSize" placeholder="Front Tyre Size" type="text" 
                                               value="" required/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="rearTyreSize">
                                    <label for="RearTyreSize">Rear Tyre Size</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="RearTyreSize"
                                               name="RearTyreSize" placeholder="Rear Tyre Size" type="text"
                                               value="" required/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="wheelType">
                                    <label for="WheelType">Wheel Type</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="WheelType"
                                               name="WheelType" placeholder="Wheel Type" type="text"
                                               value="" required/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="frontBrakeType">
                                    <label for="FrontBrakeType">Front Brake Type</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="FrontBrakeType"
                                               name="FrontBrakeType" placeholder="Front Brake Type" type="text"
                                               value="" required/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="rearBrakeType">
                                    <label for="RearBrakeType">RearBrakeType</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="RearBrakeType"
                                               name="RearBrakeType" placeholder="Rear Brake Type" type="text"
                                               value="" required/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="frontSuspension">
                                    <label for="FrontSuspension">Front Suspension</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="FrontSuspension"
                                               name="FrontSuspension" placeholder="FrontSuspension" type="text"
                                               value="" required/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="rearSuspension">
                                    <label for="RearSuspension">Rear Suspension</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="RearSuspension"
                                               name="RearSuspension" placeholder="Rear Suspension" type="text"
                                               value="" required/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="powerSteering">
                                    <label for="PowerSteering">Power Steering</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="PowerSteering"
                                               name="PowerSteering" placeholder="Power Steering" type="text" 
                                               value="" required/>
                                    </div>
        
                            </div>

                            <div class="form-group" id="steeringType">
                                    <label for="SteeringType">Steering Type</label>
                                    <div class="btn-group bootstrap-select show-tick">
                                        <input class="form-control text-box single-line" id="SteeringType"
                                               name="SteeringType" placeholder="Steering Type" type="text"
                                               value="" required/>
                                    </div>
        
                            </div>

                        <div align="center">
                            <button type="submit" id="submiy_button"
                                    class="btn-order-form button btn-block">
                                SUBMIT
                            </button>
                        </div>
                        <div align="center" style="margin-top: -20px;">
                            <a class="btn-block btn-order-form" onclick="startern_show_step('3')">
                                BACK
                            </a>
                        </div>
                       
                        <input type="hidden" name="create_startern_form" value="1">

                    </div>
                </div>
            </div>

        </div>
    </form>
    <script>
            function startern_show_step(step) {

                for (i = 1; i <= 4; i++) {
            
                    var cStep = 'order-step-' + i;
                    var stepIndicator = 'stepIndicator-' + i;
                  
                    if (i == step) {
                        $('#' + cStep).show();
                        $('#' + stepIndicator).addClass('active');
                        $('#' + stepIndicator).removeClass('done');
            
                    } else {
                        $('#' + cStep).hide();
                        $('#' + stepIndicator).removeClass('active');
            
                        if (i < step) {
                            $('#' + stepIndicator).addClass('done');
                        } else {
                            $('#' + stepIndicator).removeClass('done');
                        }
            
                    }
                }
            }
            
            
            function startern_show_step_2() {
                document.getElementById("form-verification-error").innerHTML = "";
                if ($('#ModelName').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put a Model Name !</p>";
                }
                else if ($('#CompanyID').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please Select a Maker !</p>";
                }  
                else if ($('#BrandID').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please Select a Brand Name !</p>";
                } 
                else if ($('#YearOfRelease').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please Select Year of Release !</p>";
                } 
                else if ($('#Price').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put Model Price !</p>";
                }
                else if ($('#BodyTypeID').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please select a Body Type !</p>";
                }  
                else
                {
                    $('#order-step-2').show();
                    $('#order-step-1').hide();
                    $('#order-step-3').hide();
                    $('#order-step-4').hide();
            
                    $('#stepIndicator-1').addClass('done');
                    $('#stepIndicator-2').addClass('active');
            
                    $('#stepIndicator-3').removeClass('done');
                    $('#stepIndicator-4').removeClass('done');
                    $('#stepIndicator-1').removeClass('active');
                    $('#stepIndicator-3').removeClass('active');
                    $('#stepIndicator-4').removeClass('active');
                }          
            }

            function startern_show_step_3() {
                document.getElementById("form-verification-error").innerHTML = "";
                if ($('#EngineType').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put Engine Type !</p>";
                } 
                else if ($('#Power').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put Model Power!</p>";
                }   
                else if ($('#Torque').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put Model Torque!</p>";
                } 
                else if ($('#Transmission').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put Model Transmission!</p>";
                } 
                else if ($('#DriveTrain').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put Model DriveTrain!</p>";
                } 
                else if ($('#NumberOfGears').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put NumberOfGears!</p>";
                } 
                else if ($('#NumberofCylinders').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put NumberofCylinders!</p>";
                } 
                else if ($('#Performance0To100Kmph').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put Performance0To100Kmph!</p>";
                }    
                else
                {
                    $('#order-step-3').show();
                    $('#order-step-1').hide();
                    $('#order-step-2').hide();
                    $('#order-step-4').hide();
            
                    $('#stepIndicator-2').addClass('done');
                    $('#stepIndicator-3').addClass('active');
            
                    $('#stepIndicator-1').removeClass('active');
                    $('#stepIndicator-4').removeClass('active');
                    $('#stepIndicator-2').removeClass('active');
                    $('#stepIndicator-4').removeClass('done');  
                }          
            }

            function startern_show_step_4() {
                document.getElementById("form-verification-error").innerHTML = "";
                if ($('#MaximumSpeed').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put MaximumSpeed!</p>";
                } 
                else if ($('#FuelTankCapacity').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put FuelTankCapacity!</p>";
                } 
                else if ($('#BodyColor').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put BodyColor!</p>";
                }    
                else if ($('#Length').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put Length!</p>";
                }    
                else if ($('#Width').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put Width!</p>";
                }    
                else if ($('#Height').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put Height!</p>";
                }    
                else if ($('#Wheelbase').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put Wheelbase!</p>";
                }    
                else if ($('#GrossWeight').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put GrossWeight!</p>";
                }    
                else if ($('#SeatingCapacity').val() == "") {

                    document.getElementById("form-verification-error").innerHTML = "<p>Please put SeatingCapacity!</p>";
                }       
                else
                {
                $('#order-step-4').show();
                $('#order-step-1').hide();
                $('#order-step-2').hide();
                $('#order-step-3').hide();
        
                $('#stepIndicator-3').addClass('done');
                $('#stepIndicator-4').addClass('active');
        
                $('#stepIndicator-1').removeClass('active');
                $('#stepIndicator-2').removeClass('active');            
                $('#stepIndicator-3').removeClass('active');   
                }         
        }
            
            
    </script>
@endsection

