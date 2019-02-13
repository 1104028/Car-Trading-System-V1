<!DOCTYPE html>
<html>
<head>
    <?Php 
        use App\Model\ClientInformation;
        $clientInformations = ClientInformation::where('Companyid',1)->first();
        ?>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('favicon.ico')}}">
    <title>{{ $clientInformations->CompanyTitle }}</title>
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
    
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="">
            <img src="{{ URL::to('/images/logo/' . $clientInformations->CompanyLogo) }}" alt="{{ $clientInformations->CompanyLogo }}"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars fa-1x"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('index') }}">HOME</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('buy',['CompanyID'=>0,'BodyType'=>0,'YearMin'=>0,'YearMax'=>0,'PriceMin'=>0,'PriceMax'=>0]) }}">BUY</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('About') }}">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Contact') }}">CONTACT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')


<footer class="car-footer bg-dark text-light pb-1 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="car-footer-title text-uppercase mb-3">
                    <p><strong>{{ $clientInformations->COmpanyName }}</strong></p>
                </div>
                <p class="mb-3">{{ $clientInformations->CompanySlogan }}</p>
                <ul class="list-unstyled car-footer-contact mb-0">
                    <li>
                        <span><i class="fas fa-phone-square"></i></span>
                        <a href="">{{ $clientInformations->PhoneNo }}</a>
                    </li>
                    <li>
                        <span><i class="fas fa-envelope-square"></i></span>
                        <a href="">{{ $clientInformations->Email }}</a>
                    </li>
                    <li>
                        <a href="">
                            <p><span class="text-light"><i class="fas fa-map-marker">&nbsp;</i>&nbsp;</span>{{ $clientInformations->CompanyAddress }}</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <div class="car-footer-title text-uppercase mb-md-3">
                    <p><strong>Follow Us</strong></p>
                </div>
                <ul class="list-inline car-footer-follow-us">
                    <li class="list-inline-item"><a href="{{ $clientInformations->FacebookLink }}"><i class="fab fa-facebook-square">&nbsp;</i></a></li>
                    <li class="list-inline-item"><a href="{{ $clientInformations->GooglePlusLink }}"><i class="fab fa-google-plus-square">&nbsp;</i></a></li>
                    <li class="list-inline-item"><a href="{{ $clientInformations->TwitterLink }}"><i class="fab fa-twitter-square">&nbsp;</i></a></li>
                    <li class="list-inline-item"><a href="{{ $clientInformations->COmpanyName }}"><i class="fab fa-youtube">&nbsp;</i></a></li>
                    <li class="list-inline-item"><a href="{{ $clientInformations->LinkedinLink }}"><i class="fab fa-linkedin">&nbsp;</i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <p class="text-center">Copyright 2018@ <a href="https://www.nirapodbangla.com" target="_blank"><strong>NIRAPOD.BANGLA SOLUTIONS LIMITED</strong></a></p>
    <a href="JavaScript:;" class="scroll_to_top">
        <i class="fas fa-sort-up"></i>
    </a>
</footer>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/grid-gallery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/style.js')}}" type="text/javascript"></script>
<script src="{{asset('js/order-form.js')}}" type="text/javascript"></script>

</body>
</html>
