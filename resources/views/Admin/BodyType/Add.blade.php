@extends('layouts.admin') 
@section('content')
<h2 style="text-align:center">Add Body Type</h2>

@if(session()->has('message'))
<script>
    alert('{{ session()->get('message') }}'); // display string message
</script>
@endif @if ($errors->has('BodyTypeName'))
<script>
    alert('Body Type Already Exists!!!'); // display string message
</script>
@endif

<form enctype="multipart/form-data" method="POST" action="{{ route('bodytype.store') }}">
    {{ csrf_field() }}

    <style>
        .register-box {
            margin-top: 1%;
        }
    </style>
    <div class="register-box">
        <div class="register-box-body">

            <div class="form-group has-feedback">
                <label>Body Type</label>
                <input class="form-control text-box single-line" id="BodyTypeName" name="BodyTypeName" type="text" value="" />
                <span class="field-validation-valid text-danger" data-valmsg-for="BodyTypeName" data-valmsg-replace="true"></span>
            </div>
            <div class="form-group has-feedback">
                <label>Body Image</label> 
                <input id="BodyTypeImage" type="file" class="form-control" name="BodyTypeImage" value="" required autofocus> 
                @if ($errors->has('BodyTypeImage'))
                <span class="help-block">
                                                        <span class="field-validation-valid text-danger"
                                                              data-valmsg-for="BodyTypeImage" data-valmsg-replace="true">
                                                            {{ $errors->first('BodyTypeImage') }}</span>
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