@extends('layouts.admin') 
@section('content') @if(session()->has('message'))
<script>
    alert('{{ session()->get('message') }}'); // display string message
</script>
@endif @if ($errors->has('BodyTypeName'))
<script>
    alert('Body Type Already Exists!!!'); // display string message
</script>
@endif
<h2 style="text-align:center">Update Body Type</h2>
<form enctype="multipart/form-data" method="POST" action="{{ route('bodytype.update',$id) }}">
    {{ csrf_field() }} {{ method_field('PUT') }}
    <style>
        .register-box {
            margin-top: 1%;
        }
    </style>
    <div class="register-box">
        <div class="register-box-body">

            <div class="form-group has-feedback">
                <label>Body Type</label> @if(!empty($bodytype->BodyTypeName))
                <input class="form-control text-box single-line" id="BodyTypeName" name="BodyTypeName" type="text" value="{{ $bodytype->BodyTypeName }}"
                /> @else
                <input class="form-control text-box single-line" id="BodyTypeName" name="BodyTypeName" type="text" value="" />                @endif
            </div>
            <div class="form-group has-feedback">
                <label>Body Image</label>
                <input id="BodyTypeImage" type="file" class="form-control" name="BodyTypeImage" value="" required autofocus>                @if ($errors->has('BodyTypeImage'))
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
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.form-box -->
</form>
@endsection