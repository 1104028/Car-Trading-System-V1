@extends('layouts.admin')
@section('content')
    <h2 style="text-align:center">Admin Registration</h2>

    <form method="POST" action="{{ route('registrationpost') }}">
        {{ csrf_field() }}
        <style>
            .register-box {
                margin-top: 1%;
            }
        </style>
        <div class="register-box">
            <div class="register-box-body">

                <div class="form-group has-feedback">
                    <label>Full Name</label>
                    @if(!empty($UserFullName))
                        <input class="form-control text-box single-line" id="UserFullName" name="UserFullName"
                               placeholder="Full name" type="text"
                               value="{{ $UserFullName }}"/>
                    @else
                        <input id="UserFullName" type="text" class="form-control" name="UserFullName"
                               placeholder="Full name" value="{{ old('UserFullName') }}"
                               required autofocus>
                    @endif
                    @if ($errors->has('UserFullName'))
                        <span class="help-block">
                    <span class="field-validation-valid text-danger" data-valmsg-for="UserFullName"
                          data-valmsg-replace="true">
                        {{ $errors->first('UserFullName') }}</span>
                </span>
                    @endif

                </div>


                <div class="form-group has-feedback">
                    <label>Email</label>
                    <input Placeholder="Email" class="form-control text-box single-line" data-val="true"
                           data-val-required="Email Address required"
                           id="Email" name="Email" type="email" value=""/> @if ($errors->has('Email'))
                        <span class="help-block">
                    <span class="field-validation-valid text-danger" data-valmsg-for="Email"
                          data-valmsg-replace="true">{{ $errors->first('Email') }}</span>
                </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <label>ContactNumber</label>
                    <input Placeholder="ContactNumber" class="form-control text-box single-line" data-val="true"
                           data-val-required="Email Address required"
                           id="ContactNumber" name="ContactNumber" type="text"
                           value=""/> @if ($errors->has('ContactNumber'))
                        <span class="help-block">
                                <span class="field-validation-valid text-danger" data-valmsg-for="ContactNumber"
                                      data-valmsg-replace="true">{{ $errors->first('ContactNumber') }}</span>
                </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <label>User Name</label>
                    <input class="form-control text-box single-line" data-val="true"
                           data-val-required="User Name required" id="User_name" name="User_name"
                           placeholder="User name" type="text" value=""/>
                    @if ($errors->has('User_name'))
                        <span class="help-block">
                    <span class="field-validation-valid text-danger" data-valmsg-for="User_name"
                          data-valmsg-replace="true">{{ $errors->first('User_name') }}</span>
                </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <label>Password</label>
                    <input Placeholder="Password" class="form-control text-box single-line password" data-val="true"
                           data-val-minlength="Minimum 6 characters required"
                           data-val-minlength-min="6" data-val-required="Password is required" id="password"
                           name="password" type="password"
                           value=""/>
                    <span class="field-validation-valid text-danger" data-valmsg-for="password"
                          data-valmsg-replace="true"></span>
                </div>
                <div class="form-group has-feedback">
                    <label>Confirm Password</label>
                    <input Placeholder="Password" class="form-control text-box single-line password" data-val="true"
                           data-val-equalto="Confirm password and password do not match"
                           data-val-equalto-other="*.Password" id="ConfirmPassword" name="ConfirmPassword"
                           type="password" value=""
                    />
                    <span class="field-validation-valid text-danger" data-valmsg-for="ConfirmPassword"
                          data-valmsg-replace="true"></span>
                </div>


                <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.form-box -->
    </form>
@endsection