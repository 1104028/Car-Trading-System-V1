@extends('layouts.admin')
<?php
use App\DataLayer\CarTradingDBAccess;
use App\Model\CarImage;
?>
@section('content')
    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message

        </script>
    @endif

    <h2 style="text-align: center;">Best Selling Cars</h2>
    <div class="row" style="margin:2%;">
        @foreach ($allbestseeelingcars as $item)
            <?php
            $carimages = CarImage::where('ModelID', $item->ModelID)->get();
            ?>
            @foreach($carimages as $image)
                @if($image->CardImage == true)
                    <div class="col-md-3 col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-thumbnail">
                                <img src="{{ URL::to('/images/CarImages/' . $image->ImagePath ) }}" class="img-responsive"></div>

                            <div class="panel-body">
                                <div class="subtext" style="text-align: center;">
                                    <h3 class="car-title">{{ $item->carmodels->ModelName }}</h3>
                                    <div class="car-details">
                                        <a href="{{ route('bestseller.edit',$item->BestSellingCarID) }}"
                                           style="color:white">
                                            <button class="btn-primary" type="submit" style="width:100%;height:2.8rem;">
                                                Update
                                            </button>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
@endsection