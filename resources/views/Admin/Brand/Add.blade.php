@extends('layouts.admin')
@section('content')

    <h2 style="text-align:center">Add Brand</h2>
    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message

        </script>
    @endif

    <form method="POST" action="{{ route('brand.store') }}">
        {{ csrf_field() }}
        <style>
            .register-box {
                margin-top: 1%;
            }
        </style>
        <div class="register-box">
            <div class="register-box-body">

                <div class="form-group has-feedback">
                    <label>Brand</label>
                    <input class="form-control text-box single-line" id="BrandName" name="BrandName" type="text"
                           value="" required/>
                    @if ($errors->has('BrandName'))
                        <span class="field-validation-valid text-danger" data-valmsg-for="BrandName"
                              data-valmsg-replace="true">
                                            BrandName Already Exists
                                        </span> @endif
                </div>

                <div class="form-group has-feedback">
                    <label>Company Name</label>
                    <select class="form-control" data-val="true"
                            data-val-number="The field Company Name must be a number."
                            data-val-required="The Company Name field is required."
                            id="CompanyID" name="CompanyID" required>
                        <option value="">- Company Name-</option>
                        @foreach($allcompany as $company)
                            <option value="{{ $company->CompanyID }}">{{ $company->CompanyName }}</option>
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