@extends('layouts.main')

@section('title')
    Contacts
@endsection

@section('content')
@if(session()->has('message'))
<script>
    alert('{{ session()->get('message') }}'); // display string message
</script>
@endif
<section class="cartrading-contact-form">
    <style>
            .car-btn::before {
                border-bottom: 3px solid #FFF;
                border-left: 3px solid #FFF;
                -webkit-transform-origin: 100% 0%;
            }
            .car-btn::after {
                border-bottom: 3px solid #FFF;
                border-left: 3px solid #FFF;
                -webkit-transform-origin: 100% 0%;
            }
            .car-btn {
                position: relative;
                vertical-align: middle;
                display: inline-block;
                line-height: 3;
                text-align: center;
                transition: 0.5s;
                padding: 0 20px;
                cursor: pointer;
                border: 2px solid #009ADA;
                -webkit-transition: 0.5s;
                background-color: #009ADA;
            }
    </style>
    <div class="container">
        <br />
        <br />
        <div class="text-center">
            <h3>Contact Us</h3>
        </div>
        
        <form method="POST" action="{{ route('ContactPost') }}">
                {{ csrf_field() }}
            <div class="form-row">
                
                <div class="form-group col-md-12">
                    <label for="Subject">Subject</label>
                    <select id="Subject" name="Subject" class="car-form-control" required>
                        <option selected>Please Select a Subject</option>
                        <option>I want to buy a car</option>
                        <option>I have a question</option>
                        <option>Others</option>
                    </select>
                </div>
                    
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 pr-md-3">
                    <label for="FirstName">First Name</label>
                    <input type="text" class="car-form-control" id="FirstName" name="FirstName" required>
                </div>
                <div class="form-group col-md-6 pl-md-3">
                    <label for="LastName">Last Name</label>
                    <input type="text" class="car-form-control" id="LastName" name="LastName">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 pr-md-3">
                    <label for="Email">Email Address</label>
                    <input type="email" class="car-form-control" id="Email" name="Email" required>
                </div>
                <div class="form-group col-md-6 pl-md-3">
                    <label for="Phone_number">Phone Number</label>
                    <input type="text" class="car-form-control" id="Phone_number" name="Phone_number" required>
                </div>

            </div>

            <div class="form-group">
                <label for="Message">Message</label>
                <textarea class="car-form-control" id="Message" name="Message" rows="5" required></textarea>
            </div>
            <button type="submit" class="car-btn text-light">SUBMIT</button>
        </form>

    </div>
</section>

<section class="car-maps" id="google_map">

    <div id="map" style="height:500px"></div>

    <script>
            function initMap() {
                var uluru = { lat: 35.648405, lng: 140.041966 };
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: uluru
                });
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                });
            }
        </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9ufEulECpKsGnLM-GW8MaNfmKhieJ-q4&callback=initMap"></script>
    <!--
    To use this code on your website, get a free API key from Google.
    Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
    -->
</section>

 
@endsection   