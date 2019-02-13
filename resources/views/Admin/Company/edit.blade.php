@extends('layouts.admin')
@section('content')
    <h2 style="text-align:center">Update Maker</h2>

    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message

        </script>
    @endif

    <form method="POST" action="{{ route('company.update',$id) }}">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <style>
            .register-box {
                margin-top: 1%;
            }
        </style>
        <div class="register-box">
            <div class="register-box-body">

                <div class="form-group has-feedback">
                    <label>Maker Name</label>
                    @if(!empty($company->CompanyName))
                        <input class="form-control text-box single-line" id="CompanyName" name="CompanyName" type="text"
                               value="{{ $company->CompanyName }}" required/>
                    @else
                        <input class="form-control text-box single-line" id="CompanyName" name="CompanyName" type="text"
                               value="" required/>
                    @endif
                    @if ($errors->has('CompanyName'))
                        <span class="field-validation-valid text-danger" data-valmsg-for="CompanyName"
                              data-valmsg-replace="true">
                    CompanyName Already Exists
                </span>
                    @endif

                </div>


                <div class="form-group has-feedback">
                    <label>Address</label>
                    @if(!empty($company->Address))
                        <input class="form-control text-box single-line" id="Address" name="Address" type="text"
                               value="{{ $company->Address }}"/>
                    @else
                        <input class="form-control text-box single-line" id="Address" name="Address" type="text"
                               value=""/>
                    @endif
                    @if($errors->has('Address'))
                        <span class="field-validation-valid text-danger" data-valmsg-for="Address"
                              data-valmsg-replace="true">
                                                                            Address Required
                </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <label>Country</label>
                    @if(!empty($company->Country))
                        <input class="form-control text-box single-line" id="Country" name="Country" type="text"
                               value="{{ $company->Country }}"/>
                    @else
                        <input class="form-control text-box single-line" id="Country" name="Country" type="text"
                               value=""/>
                    @endif
                    @if($errors->has('Country'))
                        <span class="field-validation-valid text-danger" data-valmsg-for="Country"
                              data-valmsg-replace="true">
                                                                            Country Required
                                                                        </span> @endif
                </div>


                <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">UPDATE</button>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.form-box -->
    </form>
@endsection