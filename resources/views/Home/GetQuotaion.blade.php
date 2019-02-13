<?php
use App\DataLayer\CarTradingDBAccess;
?>
@extends('layouts.main')

@section('title')
    Get Quotation
@endsection

<script src="{{asset('Admin/js/jquery.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">

    var email;
    var code;

    function EmailVerification() {
        var NewEmail = document.getElementById("Email").value;
        
        if (NewEmail != email) {
            var form_input = [];
            form_input.push({name: '_token', value: '{{csrf_token()}}'});

            // Add hash object
            form_input.push({
                name: 'email', value: NewEmail
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('verificationcode') }}",
                async: false,
                data: $.param(form_input),
                success: function (data) {
                    if (data.EmailSend) {
                        email = data.email;
                        code = data.Code;
                        alert('A Verification code has been sent to your email');
                    }
                    else {
                        //code = data.Code;
                        console.log(data.EmailSend);
                        alert('Sorry, Verification code has not been sent, Please Try Again Later.'); 
                    }
                }
            });
        }

    }

    function Codeverification() {
        var CodeValue = document.getElementById("verfication_code").value;

        if (CodeValue == code) {
            //submit_button
            document.getElementById("submiy_button").disabled = false;

        }
        else {
            document.getElementById("submiy_button").disabled = true;
            alert('Code not matched!!!!');

        }
    }

    $(function () {
        $("#CountryID").change(function () {
            var CountryName = $("#CountryID :selected").text();

            if (CountryName == "Other") {
                $('#seaports').hide();
                $('#country-name').show();
                $('#port-name').show();

            }
            else {

                $('#country-name').hide();
                $('#port-name').hide();
                $('#seaports').show();
                var CountryId = $("#CountryID :selected").val();
                var id = CountryId;
                var form_input = [];
                form_input.push({name: '_token', value: '{{csrf_token()}}'});

                // Add hash object
                form_input.push({
                    name: 'id', value: id
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('seaportlist') }}",
                    async: false,
                    data: $.param(form_input),
                    success: function (data) {
                        var items = [];
                        items.push("<option value=" + 0 + ">" + "Select Seaport " + "</option>");

                        for (var i = 0; i < data.length; i++) {
                            items.push("<option value=" + data[i].SeaPortID + ">" + data[i].SerPortName + "(" + data[i].SerPortCode + ")" + "</option>");
                        }

                        $("#SeaPortID").html(items.join(' '));
                    }
                });
            }

        });


        $("#DeliveryID").change(function () {
            var Deliverytype = $("#DeliveryID :selected").val();
            if (Deliverytype == 1) {
                $('#delivery-address').hide();
                $('#warning').show();
            }
            else if (Deliverytype == 2) {
                $('#delivery-address').show();
                $('#warning').hide();
            }
        });

    });
    {{-- function getclientinfo() { --}}
            $.getJSON('https://ipapi.co/json/', function(data) {
                var form_input = [];
                    form_input.push({name: '_token', value: '{{csrf_token()}}'});

                    form_input.push({
                        IPAddress: 'IPAddress', value: JSON.stringify(data.ip, null, 2)
                    });

                    form_input.push({
                        CountryName: 'CountryName', value: JSON.stringify(data.country_name, null, 2),
                    });

                    form_input.push({
                        City: 'City', value: JSON.stringify(data.city, null, 2)
                    });

                    form_input.push({
                        Region: 'Region', value: JSON.stringify(data.region, null, 2)
                    });

                    form_input.push({
                        PostalCode: 'PostalCode', value: JSON.stringify(data.postal, null, 2)
                    });

                    form_input.push({
                        Latitude: 'Latitude', value: JSON.stringify(data.latitude, null, 2)
                    });

                    form_input.push({ 
                        Longitude: 'Longitude', value: JSON.stringify(data.longitude, null, 2)
                    });

                   
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('clientip') }}",
                        async: false,
                        data: $.param(form_input),
                        success: function (data) {
                         console.log(data);
                        }
                    });
            }); 
    {{-- } --}}
</script>

@section('content')

    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message
        </script>
    @endif
    
    <section class="quotation-car-project-page">


        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4 border-0">
                        @foreach ($cardetails->carimages as $item)
                            @if($item->ThumbImage==true)
                                <img class="card-img-top" src="{{ URL::to('/images/CarImages/' . $item->ImagePath) }}" alt="{{ $item->ImagePath}}"/>
                            @endif
                        @endforeach

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4 border-0">
                        <h2>{{ $cardetails->ModelName }}</h2>
                        <h3 class="price">$ {{ $cardetails->Price }} USD <br>
                        
                            <span style="color: red;font-size:1rem;">(This is the base price, shipping and others are not included)</span></h3>
                        
                        <?php
                        $DBAAccess = new CarTradingDBAccess();
                        $countryname = $DBAAccess->FindCountryNameByBrandId($cardetails->BrandID);

                        ?>
                        <h4>Made in {{ $countryname }}</h4>
                        <h5>Year of Release: {{ $cardetails->YearOfRelease }}</h5>

                    </div>


                    <br/>

                </div>
            </div>
        </div>
    </section>
    <section class="quotation-form" id="quotation-form">
        <form method="POST" action="{{ route('GetQuotaionPost') }}">
            {{ csrf_field() }}
            <div class="container">
                <div class="startern-section">
                    <input type="hidden" name="ModelID" value="{{ $cardetails->ModelID }}">
                    <div class="row">
                        <div class="col-md-2">
                        </div>

                        <div class="col-md-8 col-md-offset-3 col-sm-10 col-sm-offset-1">

                            <div class="service-order-form-section">
                                <h1 class="myblink" style="display: block;">Submit Your Quotation</h1>

                                <div class="service-order-form">
                                    <ul class="progress_circles">
                                        <li id="stepIndicator-1" class="step active">1</li>
                                        <li class="connector"></li>
                                        <li id="stepIndicator-2" class="step">2</li>
                                        <li class="connector"></li>
                                        <li id="stepIndicator-3" class="step">3</li>
                                    </ul>
                                    <div id="form-verification-error">
                                    </div>

                                    <div id="test">
                                    </div>
                                    <div class="" id="order-step-1" style="display:block">
                                        <div class="order-form form-group">
                                            <label for="CountryID">DELIVERY COUNTRY</label>
                                            <br>
                                            <div class="btn-group bootstrap-select show-tick">
                                                <select class="form-control" data-val="true"
                                                        data-val-number="The field CountryId Name must be a number."
                                                        data-val-required="The Country Name field is required."
                                                        id="CountryID" name="CountryID">
                                                    <option value="">- Select Country -</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->CountryID }}">{{ $country->CountryName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group" id="country-name" style="display:none;">
                                            <label for="">Country Name</label>
                                            <br>
                                            <div class="input-group">
                                                <input class="form-control text-box single-line" id="CountryName"
                                                       name="CountryName" placeholder="Country Name" type="text"
                                                       value=""/>
                                            </div>
                                        </div>

                                        <div class="form-group" id="seaports">
                                            <label for="">PORT</label>
                                            <br>
                                            <div class="btn-group bootstrap-select show-tick">
                                                <select class="form-control" data-val="true"
                                                        data-val-number="The field SeaPortID must be a number."
                                                        data-val-required="The SeaPort Name field is required."
                                                        id="SeaPortID" name="SeaPortID">
                                                    <option value="">- Select SeaPort -</option>
                                                    @foreach($seaports as $seaport)
                                                        <option value="{{ $seaport->SeaPortID }}">{{ $seaport->SerPortName}}{{ ($seaport->SerPortCode) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group" id="port-name" style="display:none;">
                                            <label for="">PORT Name</label>
                                            <br/>
                                            <div class="input-group">
                                                <input class="form-control text-box single-line" id="SeaPortName"
                                                       name="SeaPortName" placeholder="Port Name" type="text" value=""/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Delivery Type</label>
                                            <br>
                                            <div class="btn-group bootstrap-select show-tick">
                                                <select class="form-control" data-val="true"
                                                        data-val-number="The field DeliveryID must be a number."
                                                        data-val-required="The DeliveryID field is required."
                                                        id="DeliveryID" name="DeliveryID">
                                                    <option value="">Select Delivery Option</option>
                                                    <option value="1">Self</option>
                                                    <option value="2">Company</option>
                                                </select>


                                            </div>
                                            <span style="color:red;display:none;" id="warning">Self: You will receive car from port.</span>
                                        </div>

                                        <div class="form-group" id="delivery-address" style="display:none">
                                            <label for="">Address</label>
                                            <div class="input-group">
                                                <input class="form-control text-box single-line" id="DeliveryAddress"
                                                       name="DeliveryAddress" placeholder="Delivery Address" type="text"
                                                       value=""/>
                                            </div>

                                        </div>
                                        <div align="center">
                                            <a class="btn-block btn-order-form" onclick="startern_show_step_2()">
                                                NEXT
                                            </a>
                                        </div>
                                    </div>
                                    <div class="" id="order-step-2" style="display:none">
                                        <div class="form-group">
                                            <label for="">Full Name</label>

                                            <input class="form-control text-box single-line" data-val="true"
                                                   data-val-required="The FullName field is required." id="FullName"
                                                   name="FullName" placeholder="Full Name" type="text" value=""/>

                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <div class="input-group">
                                                <input class="form-control text-box single-line" data-val="true"
                                                       data-val-required="The ContactNumber field is required."
                                                       id="ContactNumber" name="ContactNumber"
                                                       placeholder="Contact Number" type="text" value=""/>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <div class="input-group">
                                                <input class="form-control text-box single-line" data-val="true"
                                                       data-val-required="The Email field is required." id="Email"
                                                       name="Email" placeholder="abc@example.com" type="text" value=""/>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <div class="input-group">
                                                <input class="form-control text-box single-line" data-val="true"
                                                       data-val-required="The Address field is required." id="Address"
                                                       name="Address" placeholder="Address" type="text" value=""/>
                                            </div>
                                        </div>

                                        <div align="center">
                                            <a class="btn-block btn-order-form"
                                               onclick="startern_show_step_3();EmailVerification()">
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

                                        <div class="form-group">
                                            <label for="">Verification Code</label>
                                            <input type="text" class="form-control" id="verfication_code"
                                                   name="verfication_code" onchange="Codeverification()">
                                        </div>

                                        <div align="center">
                                            <button type="submit" id="submiy_button"
                                                    class="btn-order-form button btn-block" onclick="getclientinfo()" disabled>
                                                SUBMIT
                                            </button>
                                        </div>
                                        <div align="center" style="margin-top: -20px;">
                                            <a class="btn-block btn-order-form" onclick="startern_show_step('2')">
                                                BACK
                                            </a>
                                        </div>
                                        <input type="hidden" name="create_startern_form" value="1">

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </form>
    </section>

@endsection   