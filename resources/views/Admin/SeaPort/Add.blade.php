@extends('layouts.admin')
@section('content')

    <h2 style="text-align:center">Add Sea Port</h2>
    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message
        </script>
    @endif

    <form method="POST" action="{{ route('seaport.store') }}">
        {{ csrf_field() }}
        <style>
            .register-box {
                margin-top: 1%;
            }
        </style>
        <div class="register-box">
            <div class="register-box-body">

                <div class="form-group has-feedback">
                    <label>SeaPort Name</label>
                    <input class="form-control text-box single-line" id="SerPortName" name="SerPortName" type="text"
                           value="" required/>
                    @if ($errors->has('SerPortName'))
                        <span class="field-validation-valid text-danger" data-valmsg-for="SerPortName"
                              data-valmsg-replace="true">
                                            SeaPort Name Already Exists
                </span> @endif
                </div>

                <div class="form-group has-feedback">
                    <label>SeaPort Code</label>
                    <input class="form-control text-box single-line" id="SerPortCode" name="SerPortCode" type="text"
                           value="" required/>
                    @if ($errors->has('SerPortCode'))
                        <span class="field-validation-valid text-danger" data-valmsg-for="SerPortCode"
                              data-valmsg-replace="true">
                                                        SeaPort Code Already Exists
                </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <label>Country Name</label>
                    <select class="form-control" data-val="true"
                            data-val-number="The field Company Name must be a number."
                            data-val-required="The Company Name field is required."
                            id="CountryID" name="CountryID" required>
                        <option value="">- Country Name-</option>
                        @foreach($allcountry as $country)
                            <option value="{{ $country->CountryID }}">{{ $country->CountryName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">ADD</button>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.form-box -->
        </div>

        <!-- /.form-box -->
    </form>
@endsection