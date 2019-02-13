@extends('layouts.main')

<?php
use App\DataLayer\CarTradingDBAccess;
use App\Model\CarImage;
?>

@section('title')
    Car Trading System
@endsection

@section('content')

    <section id="carSlider" class="carousel slide car-slider" data-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item car-overlay active">
                <img class="" src="{{asset('images/banner/banner.jpg')}}" alt="">
                <div class="carousel-caption animated bounceInDown delay-2s">
                    <div class="car-display-table">
                        <div class="car-display-table-cell">
                            <div class="container">
                                <h2 class="text-light">
                                    Great cars.<br/>
                                    Delivered to you.<br/>
                                    Get in.
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <section class="car-card-grids">
        <div class="container">
            <div class="car-section-header text-center">
                <h3>Latest Cars</h3>
            </div>
            <div class="row">
                @foreach ($latestcar as $item)
                    <?php
                    $carimages = CarImage::where('ModelID', $item->ModelID)->get();
                    ?>
                    @foreach($carimages as $image)
                        @if($image->CardImage == true)
                            <div class="col-md-3 col-sm-4" style="margin-bottom:2%;">
                                <div class="panel panel-default">
                                    <a href="{{ route('CarDetails',$item->ModelID) }}">
                                        <div class="panel-thumbnail">
                                            <img src="{{ URL::to('/images/CarImages/' . $image->ImagePath) }}" alt="{{ $image->ImagePath}}"
                                                 class="img-responsive"></div>
                                        <div class="panel-body">
                                            <div class="subtext">
                                                <h5 class="car-title">{{ $item->carmodels->ModelName }}</h5>
                                                <div class="car-details">
                                                    <?php
                                                    $DBAAccess = new CarTradingDBAccess();
                                                    $bodytypename = $DBAAccess->FindBodyTypeNameById($item->carmodels->BodyTypeID);

                                                    ?>
                                                    <div class="trim">{{ $bodytypename }}</div>
                                                </div>
                                                <div class="price">$ {{ $item->carmodels->Price }} USD</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>

        </div>
    </section>

    <section class="car-card-grids">
        <div class="container">
            <div class="car-section-header text-center">
                <h3>Best Selling Cars</h3>
            </div>
            <div class="row">
                @foreach ($bestsellingcar as $item)
                    <?php
                    $carimages = CarImage::where('ModelID', $item->ModelID)->get();
                    ?>
                    @foreach($carimages as $image)
                        @if($image->CardImage == true)
                            <div class="col-md-3 col-sm-4" style="margin-bottom:2%;">
                                <div class="panel panel-default">
                                    <a href="{{ route('CarDetails',$item->ModelID) }}">
                                        <div class="panel-thumbnail">
                                            <img src="{{ URL::to('/images/CarImages/' . $image->ImagePath) }}" alt="{{ $image->ImagePath}}" 
                                                 class="img-responsive"></div>
                                        <div class="panel-body">
                                            <div class="subtext">
                                                <h5 class="car-title">{{ $item->carmodels->ModelName }}</h5>
                                                <div class="car-details">
                                                    <?php
                                                    $DBAAccess = new CarTradingDBAccess();
                                                    $bodytypename = $DBAAccess->FindBodyTypeNameById($item->carmodels->BodyTypeID);
                                                    ?>
                                                    <div class="trim">{{ $bodytypename }}</div>
                                                </div>
                                                <div class="price">$ {{ $item->carmodels->Price }} USD</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
@endsection   
