@extends('layouts.admin')
@section('content')
    <h2 style="text-align:center">Email Configurations</h2>

    <form method="POST" action="{{ route('emailconfigurations.store') }}">
        {{ csrf_field() }}
        <style>
            .register-box {
                margin-top: 1%;
            }
        </style>
        <div class="register-box">
            <div class="register-box-body">

                <div class="form-group has-feedback">
                    <label>SMTP Client Address</label>
                    @if(!empty($emailinformations->SMTPclientAddr))
                        <input class="form-control text-box single-line" id="SMTPclientAddr" name="SMTPclientAddr"
                               type="text"
                               value="{{ $emailinformations->SMTPclientAddr }}"/>
                    @else
                        <input id="SMTPclientAddr" type="text" class="form-control" name="SMTPclientAddr"
                               value="{{ old('SMTPclientAddr') }}"
                               required autofocus>
                    @endif

                    @if ($errors->has('SMTPclientAddr'))
                        <span class="help-block">
                    <span class="field-validation-valid text-danger" data-valmsg-for="SMTPclientAddr"
                          data-valmsg-replace="true">
                        {{ $errors->first('SMTPclientAddr') }}</span>
                </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>SMTP Client Port</label> @if(!empty($emailinformations->SMTPclientPort))
                        <input class="form-control text-box single-line" id="SMTPclientPort" name="SMTPclientPort"
                               type="text" value="{{ $emailinformations->SMTPclientPort }}"
                        /> @else
                        <input id="SMTPclientPort" type="number" class="form-control" name="SMTPclientPort"
                               value="{{ old('SMTPclientPort') }}" required
                               autofocus> @endif @if ($errors->has('SMTPclientPort'))
                        <span class="help-block">
                    <span class="field-validation-valid text-danger" data-valmsg-for="SMTPclientPort"
                          data-valmsg-replace="true">
                        {{ $errors->first('SMTPclientPort') }}</span>
    </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Host ID</label> @if(!empty($emailinformations->hostID))
                        <input class="form-control text-box single-line" id="hostID" name="hostID" type="text"
                               value="{{ $emailinformations->hostID }}"
                        /> @else
                        <input id="hostID" type="text" class="form-control" name="hostID" value="" required
                               autofocus> @endif @if ($errors->has('hostID'))
                        <span class="help-block">
                    <span class="field-validation-valid text-danger" data-valmsg-for="hostID"
                          data-valmsg-replace="true">
                        {{ $errors->first('hostID') }}</span>
    </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Host Password</label> @if(!empty($emailinformations->hostPass))
                        <input class="form-control text-box single-line" id="hostPass" name="hostPass" type="text"
                               value="{{ $emailinformations->hostPass }}"/> @else
                        <input id="hostPass" type="password" class="form-control" name="hostPass" value="" required
                               autofocus> @endif
                    @if ($errors->has('hostPass'))
                        <span class="help-block">
                    <span class="field-validation-valid text-danger" data-valmsg-for="hostPass"
                          data-valmsg-replace="true">
                        {{ $errors->first('hostPass') }}</span>
    </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Notification Email</label> @if(!empty($emailinformations->notficationemail))
                        <input class="form-control text-box single-line" id="notficationemail" name="notficationemail" type="text"
                               value="{{ $emailinformations->notficationemail }}"
                        /> @else
                        <input id="notficationemail" type="text" class="form-control" name="notficationemail" value="" required
                               autofocus> @endif @if ($errors->has('notficationemail'))
                        <span class="help-block">
                    <span class="field-validation-valid text-danger" data-valmsg-for="notficationemail"
                          data-valmsg-replace="true">
                        {{ $errors->first('notficationemail') }}</span>
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