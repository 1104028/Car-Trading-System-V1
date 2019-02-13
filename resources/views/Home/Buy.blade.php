@extends('layouts.main')
<?php
use Carbon\Carbon;
use App\Model\CarModel;
use App\Model\CarImage;
?>
@section('title')
    Buy
@endsection

@section('content')

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <ul class="list-unstyled components">
                <button type="button" id="sidebarCollapse" class="btn-filter ">
                    <i class="fas fa-align-left"></i>
                    <span>Filters</span>
                </button>

                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">MAKER &
                        BRAND</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a class="nav-link" style="text-align: center;font-size:1rem !important;"
                               href="{{ route('buy',['CompanyID'=>0,'BodyType'=>0,'YearMin'=>0,'YearMax'=>0,'PriceMin'=>0,'PriceMax'=>0]) }}">All
                                Makers</a>
                        </li>
                        @foreach ($allcompany as $company)
                            <li>
                                <?php
                                $allcarscount = CarModel::with('bodytype', 'carimages', 'brands')->where('NotAvailable', '=', false)->get();
                                $companycars = $allcarscount->where("brands.CompanyID", "=", $company->CompanyID)->count();
                                ?>
                                <a class="nav-link"
                                   href="{{ route('buy',['CompanyID'=>$company->CompanyID,'BodyType'=>$previousparameter->BodyType,'YearMin'=>$previousparameter->YearMin,'YearMax'=>$previousparameter->YearMax,'PriceMin'=>$previousparameter->PriceMin,'PriceMax'=>$previousparameter->PriceMax]) }}">{{ $company->CompanyName }}
                                    ({{$companycars}})</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">BODY
                        TYPE</a>

                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a class="nav-link" style="text-align: center;font-size:1rem !important;"
                               href="{{ route('buy',['CompanyID'=>$previousparameter->CompanyID,'BodyType'=>0,'YearMin'=>$previousparameter->YearMin,'YearMax'=>$previousparameter->YearMax,'PriceMin'=>$previousparameter->PriceMin,'PriceMax'=>$previousparameter->PriceMax]) }}">All
                                Body Types</a>
                        </li>
                        @foreach ($allbodytype as $body)
                            <div class="filter-body-type">
                                <a class="nav-link"
                                   href="{{ route('buy',['CompanyID'=>$previousparameter->CompanyID,'BodyType'=>$body->BodyTypeID,'YearMin'=>$previousparameter->YearMin,'YearMax'=>$previousparameter->YearMax,'PriceMin'=>$previousparameter->PriceMin,'PriceMax'=>$previousparameter->PriceMax]) }}">
                                    <figure>
                                        <div class="filter-car-icon suv">
                                            <img src="{{ URL::to('/images/bodytype/' . $body->BodyTypeImage) }}" alt="{{ $body->BodyTypeImage}}">
                                            </div>
                                        <figcaption class="car-icon-text">{{ $body->BodyTypeName}}</figcaption>
                                    </figure>
                                </a>
                            </div>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="#yearSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">YEAR</a>

                    <ul class="collapse list-unstyled" id="yearSubmenu">
                        <li>
                            <a class="nav-link" style="text-align: center;font-size:1rem !important;"
                               href="{{ route('buy',['CompanyID'=>$previousparameter->CompanyID,'BodyType'=>$previousparameter->BodyType,'YearMin'=>0,'YearMax'=>0,'PriceMin'=>$previousparameter->PriceMin,'PriceMax'=>$previousparameter->PriceMax]) }}">All
                                Year</a>
                        </li>

                        <div class="filter-body-type">
                            <?php
                            $mytime = Carbon::now();
                            $mytime = $mytime->toDateTimeString();
                            list($part1) = explode('-', $mytime);
                            $currentyear = (int)$part1;
                            $year1 = $currentyear - 1;
                            $year2 = $currentyear - 2;
                            ?>
                            <a class="filter-select-bar half-select-bar" href="{{ route('buy',['CompanyID'=>$previousparameter->CompanyID,'BodyType'=>$previousparameter->BodyType,'YearMin'=>$currentyear,'YearMax'=>$currentyear,'PriceMin'=>$previousparameter->PriceMin,'PriceMax'=>$previousparameter->PriceMax])
                        }}">
                                <span>{{ $currentyear }}</span>
                            </a>
                            <a class="filter-select-bar half-select-bar" href="{{ route('buy',['CompanyID'=>$previousparameter->CompanyID,'BodyType'=>$previousparameter->BodyType,'YearMin'=>$year1,'YearMax'=>$year1,'PriceMin'=>$previousparameter->PriceMin,'PriceMax'=>$previousparameter->PriceMax])
                        }}">
                                <span>{{ $year1 }}</span>
                            </a>

                            <a class="filter-select-bar half-select-bar" href="{{ route('buy',['CompanyID'=>$previousparameter->CompanyID,'BodyType'=>$previousparameter->BodyType,'YearMin'=>1970,'YearMax'=>$year2,'PriceMin'=>$previousparameter->PriceMin,'PriceMax'=>$previousparameter->PriceMax])
                        }}">
                                <span>{{ $year2 }} and Before</span>
                            </a>
                            <br/>
                        </div>
                    </ul>
                </li>
                <li>
                    <a href="#priceSubmenu" data-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle">PRICE</a>

                    <ul class="collapse list-unstyled" id="priceSubmenu">
                        <li>
                            <a href="{{ route('buy',['CompanyID'=>$previousparameter->CompanyID,'BodyType'=>$previousparameter->BodyType,'YearMin'=>$previousparameter->YearMin,'YearMax'=>$previousparameter->YearMax,'PriceMin'=>0,'PriceMax'=>0])
                        }}" class="nav-link" style="text-align: center;font-size:1rem !important;">All Prices</a>
                        </li>

                        <div class="filter-body-type">
                            <a class="filter-select-bar half-select-bar" href="{{ route('buy',['CompanyID'=>$previousparameter->CompanyID,'BodyType'=>$previousparameter->BodyType,'YearMin'=>$previousparameter->YearMin,'YearMax'=>$previousparameter->YearMax,'PriceMin'=>1,'PriceMax'=>20000])
                        }}">
                                <span>Less than $20k</span>
                            </a>
                            <a class="filter-select-bar half-select-bar" href="{{ route('buy',['CompanyID'=>$previousparameter->CompanyID,'BodyType'=>$previousparameter->BodyType,'YearMin'=>$previousparameter->YearMin,'YearMax'=>$previousparameter->YearMax,'PriceMin'=>20000,'PriceMax'=>30000])
                        }}">
                                <span>$20k - $30k</span>
                            </a>

                            <a class="filter-select-bar half-select-bar" href="{{ route('buy',['CompanyID'=>$previousparameter->CompanyID,'BodyType'=>$previousparameter->BodyType,'YearMin'=>$previousparameter->YearMin,'YearMax'=>$previousparameter->YearMax,'PriceMin'=>30000,'PriceMax'=>40000])
                        }}">
                                <span>$30k - $40k</span>
                            </a>
                            <a class="filter-select-bar half-select-bar" href="{{ route('buy',['CompanyID'=>$previousparameter->CompanyID,'BodyType'=>$previousparameter->BodyType,'YearMin'=>$previousparameter->YearMin,'YearMax'=>$previousparameter->YearMax,'PriceMin'=>40000,'PriceMax'=>99999999])
                        }}">
                                <span>Greater than $40k</span>
                            </a>
                            <br/>
                        </div>
                    </ul>
                </li>


            </ul>
        </nav>


        <section class="car-card-grids" style="width:100%;">
            <div class="container" style="width:100%;">
                <div class="car-section-header text-left">
                    <h5>{{$allcars->count()}} Results</h5>
                </div>
                <div class="row" style="width:100%;">
                    @foreach ($allcars as $item)
                        @foreach ($item->carimages as $image)
                            @if($image->CardImage == true)
                                <div class="col-md-3 col-sm-4" style="width:100%;margin-bottom:2%;">

                                    <div class="panel panel-default" style="width:100%;">
                                        <a href="{{ route('CarDetails',$item->ModelID) }}">
                                            <div class="panel-thumbnail"><img
                                                        src="{{ URL::to('/images/CarImages/' . $image->ImagePath ) }}"
                                                        class="img-responsive"></div>
                                            <div class="panel-body">
                                                <div class="subtext">
                                                    <h6 class="car-title">{{ $item->ModelName }}</h3>
                                                    <div class="car-details">
                                                        <div class="trim">{{ $item->bodytype->BodyTypeName }}</div>
                                                    </div>
                                                    <div class="price">$ {{ $item->Price }} USD</div>
                                                </div>
                                            </div>
                                    </div>
                                </div><!--/col-->
                            @endif
                        @endforeach
                    @endforeach

                </div>
            </div>
        </section>
    </div>

@endsection   