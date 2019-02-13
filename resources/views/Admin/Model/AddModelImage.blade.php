@extends('layouts.admin')
@section('content')

    <h2 style="text-align: center;">Add Model Image</h2>
    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message
        </script>
    @endif

    <form enctype="multipart/form-data" method="POST" action="{{ route('modelimagepost') }}">
        {{ csrf_field() }}

        <div class="form-group">
            <input data-val="true" data-val-number="The field ModelID must be a number."
                   data-val-required="The ModelID field is required."
                   id="ModelID" name="ModelID" type="hidden" value="{{ $modelid }}"/>
            <div class="row">

                <div class="col-md-12" style="text-align: center;">
                    <label class="control-label" for="ModelName" style="font-size:20px;">Model
                        Name: {{ $modelname }}</label>
                </div>
            </div>

        </div>

        <h3 style="text-align: center;">Input Images</h3>

        <div class="row" style="margin-left:0.5%;margin-right:0.5%;">

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue" style="height:150px;">
                    <div class="inner">
                        <h3></h3>

                        <p style="text-align:center;font-size:20px;">Thumb Image</p>
                    </div>

                    <input style="margin-left:20%;" type="file" name="thumb" id="thumb" required/>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue" style="height:150px;">
                    <div class="inner">
                        <h3></h3>

                        <p style="text-align:center;font-size:20px;">Card Image</p>
                    </div>

                    <input style="margin-left:20%;" type="file" name="cardimage" id="cardimage" required/>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue" style="height:150px;">
                    <div class="inner">
                        <h3></h3>

                        <p style="text-align:center;font-size:20px;">Car Image #1</p>
                    </div>

                    <input style="margin-left:20%;" type="file" name="img1" id="img1" required/>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue" style="height:150px;">
                    <div class="inner">
                        <h3></h3>

                        <p style="text-align:center;font-size:20px;">Car Image #2</p>
                    </div>

                    <input style="margin-left:20%;" type="file" name="img2" id="img2" required/>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue" style="height:150px;">
                    <div class="inner">
                        <h3></h3>

                        <p style="text-align:center;font-size:20px;">Car Image #3</p>
                    </div>

                    <input style="margin-left:20%;" type="file" name="img3" id="img3" required/>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue" style="height:150px;">
                    <div class="inner">
                        <h3></h3>

                        <p style="text-align:center;font-size:20px;">Car Image #4</p>
                    </div>

                    <input style="margin-left:20%;" type="file" name="img4" id="img4" required/>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue" style="height:150px;">
                    <div class="inner">
                        <h3></h3>

                        <p style="text-align:center;font-size:20px;">Car Image #5</p>
                    </div>

                    <input style="margin-left:20%;" type="file" name="img5" id="img5" required/>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue" style="height:150px;">
                    <div class="inner">
                        <h3></h3>

                        <p style="text-align:center;font-size:20px;">Car Image #6</p>
                    </div>

                    <input style="margin-left:20%;" type="file" name="img6" id="img6" required/>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue" style="height:150px;">
                    <div class="inner">
                        <h3></h3>

                        <p style="text-align:center;font-size:20px;">Car Image #7</p>
                    </div>

                    <input style="margin-left:20%;" type="file" name="img7" id="img7" required/>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue" style="height:150px;">
                    <div class="inner">
                        <h3></h3>

                        <p style="text-align:center;font-size:20px;">Car Image #8</p>
                    </div>

                    <input style="margin-left:20%;" type="file" name="img8" id="img8" required/>
                </div>
            </div>
        </div>

        <div class="row" style="margin-left:30%;">
            <button style="width:50%;" type="submit" class="btn btn-primary">ADD</button>
        </div>

        </div>
    </form>
@endsection