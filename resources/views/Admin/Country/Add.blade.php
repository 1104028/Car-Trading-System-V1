@extends('layouts.admin')

@section('content')

    <h2 style="text-align:center">Add Country</h2>
    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message

        </script>
    @endif

    <form method="POST" action="{{ route('country.store') }}">
        {{ csrf_field() }}
        <style>
            .register-box {
                margin-top: 1%;
            }
        </style>
        <div class="register-box">
            <div class="register-box-body">

                <div class="form-group has-feedback">
                    <label>Country</label>
                    <input class="form-control text-box single-line" id="CountryName" name="CountryName" type="text"
                           value="" required/>
                    @if($errors->has('CountryName'))
                        <span class="field-validation-valid text-danger" data-valmsg-for="CountryName"
                              data-valmsg-replace="true">
                     CompanyName Already Exists
                </span>
                    @endif
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