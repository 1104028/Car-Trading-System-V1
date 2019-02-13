@extends('layouts.admin')
@section('content')
    <h2 style="text-align:center">Company Informations</h2>

    <form enctype="multipart/form-data" method="POST" action="{{ route('clientinfo.store') }}">
        {{ csrf_field() }}
        <style>
            .register-box {
                margin-top: 1%;
            }
        </style>
        <div class="register-box">
            <div class="register-box-body">

                <div class="form-group has-feedback">
                    <label>Company Name</label> @if(!empty($clientInformations->COmpanyName))
                        <input class="form-control text-box single-line" id="COmpanyName" name="COmpanyName" type="text"
                               value="{{ $clientInformations->COmpanyName }}"
                        /> @else
                        <input id="COmpanyName" type="text" class="form-control" name="COmpanyName"
                               value="{{ old('COmpanyName') }}" required
                               autofocus> @endif 
                               @if ($errors->has('COmpanyName'))
                        <span class="help-block">
                    <span class="field-validation-valid text-danger" data-valmsg-for="COmpanyName"
                          data-valmsg-replace="true">
                        {{ $errors->first('COmpanyName') }}</span>
                </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Company Address</label> @if(!empty($clientInformations->CompanyAddress))
                        <input class="form-control text-box single-line" id="CompanyAddress" name="CompanyAddress"
                               type="text" value="{{ $clientInformations->CompanyAddress }}"
                        /> @else
                        <input id="CompanyAddress" type="text" class="form-control" name="CompanyAddress"
                               value="{{ old('CompanyAddress') }}" required
                               autofocus> @endif @if ($errors->has('CompanyAddress'))
                        <span class="help-block">
                    <span class="field-validation-valid text-danger" data-valmsg-for="CompanyAddress"
                          data-valmsg-replace="true">
                        {{ $errors->first('CompanyAddress') }}</span>
                </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Company Slogan</label>
                    @if(!empty($clientInformations->CompanySlogan))
                        <input class="form-control text-box single-line" id="CompanySlogan" name="CompanySlogan"
                               type="text" value="{{ $clientInformations->CompanySlogan }}"
                        /> @else
                        <input id="CompanySlogan" type="text" class="form-control" name="CompanySlogan" value=""
                               required autofocus> @endif
                    @if($errors->has('CompanySlogan'))
                        <span class="help-block">
                    <span class="field-validation-valid text-danger" data-valmsg-for="CompanySlogan"
                          data-valmsg-replace="true">
                        {{ $errors->first('CompanySlogan') }}</span>
                </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Company Title</label> @if(!empty($clientInformations->CompanyTitle))
                        <input class="form-control text-box single-line" id="CompanyTitle" name="CompanyTitle"
                               type="text" value="{{ $clientInformations->CompanyTitle }}"
                        /> @else
                        <input id="CompanyTitle" type="text" class="form-control" name="CompanyTitle" value="" required
                               autofocus> @endif
                    @if ($errors->has('CompanyTitle'))
                        <span class="help-block">
                    <span class="field-validation-valid text-danger" data-valmsg-for="CompanyTitle"
                          data-valmsg-replace="true">
                        {{ $errors->first('CompanyTitle') }}</span>
                </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Phone No</label> @if(!empty($clientInformations->PhoneNo))
                        <input class="form-control text-box single-line" id="PhoneNo" name="PhoneNo" type="text"
                               value="{{ $clientInformations->PhoneNo }}"
                        /> @else
                        <input id="PhoneNo" type="text" class="form-control" name="PhoneNo" value="" required
                               autofocus> @endif
                    @if ($errors->has('PhoneNo'))
                        <span class="help-block">
                                <span class="field-validation-valid text-danger" data-valmsg-for="PhoneNo"
                                      data-valmsg-replace="true">
                                    {{ $errors->first('PhoneNo') }}</span>
                </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Mobile No</label> @if(!empty($clientInformations->MobileNo))
                        <input class="form-control text-box single-line" id="MobileNo" name="MobileNo" type="text"
                               value="{{ $clientInformations->MobileNo }}"
                        /> @else
                        <input id="MobileNo" type="text" class="form-control" name="MobileNo" value="" required
                               autofocus> @endif
                    @if ($errors->has('MobileNo'))
                        <span class="help-block">
                                <span class="field-validation-valid text-danger" data-valmsg-for="MobileNo"
                                      data-valmsg-replace="true">
                                    {{ $errors->first('MobileNo') }}</span>
                </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Email Address</label> @if(!empty($clientInformations->Email))
                        <input class="form-control text-box single-line" id="Email" name="Email" type="text"
                               value="{{ $clientInformations->Email }}"
                        /> @else
                        <input id="Email" type="text" class="form-control" name="Email" value="" required
                               autofocus> @endif @if ($errors->has('Email'))
                        <span class="help-block">
                                            <span class="field-validation-valid text-danger" data-valmsg-for="Email"
                                                  data-valmsg-replace="true">
                                                {{ $errors->first('Email') }}</span>
                </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Company Logo</label> @if(!empty($clientInformations->CompanyLogo))
                        <input class="form-control text-box single-line" type="file" id="CompanyLogo" name="CompanyLogo"
                               type="text" value="{{ $clientInformations->CompanyLogo }}"
                        /> @else
                        <input id="CompanyLogo" type="file" class="form-control" name="CompanyLogo" value="" required
                               autofocus> @endif @if ($errors->has('CompanyLogo'))
                        <span class="help-block">
                                                        <span class="field-validation-valid text-danger"
                                                              data-valmsg-for="CompanyLogo" data-valmsg-replace="true">
                                                            {{ $errors->first('CompanyLogo') }}</span>
                </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Google Map Link</label> @if(!empty($clientInformations->GoogleMapLink))
                        <input class="form-control text-box single-line" id="GoogleMapLink"
                               name="GoogleMapLink" type="text" value="{{ $clientInformations->GoogleMapLink }}"
                        /> @else
                        <input id="GoogleMapLink" type="text" class="form-control" name="GoogleMapLink" value=""
                               required autofocus> @endif @if ($errors->has('GoogleMapLink'))
                        <span class="help-block">
                                                                    <span class="field-validation-valid text-danger"
                                                                          data-valmsg-for="GoogleMapLink"
                                                                          data-valmsg-replace="true">
                                                                        {{ $errors->first('GoogleMapLink') }}</span>
                </span>
                    @endif

                </div>

            
                <div class="form-group has-feedback">
                    <label>Facebook Link</label> @if(!empty($clientInformations->FacebookLink))
                        <input class="form-control text-box single-line" type="text" id="FacebookLink"
                               name="FacebookLink" type="text" value="{{ $clientInformations->FacebookLink }}"
                        /> @else
                        <input id="FacebookLink" type="text" class="form-control" name="FacebookLink" value=""> @endif
                    @if($errors->has('FacebookLink'))
                        <span class="help-block">
                                                                                <span class="field-validation-valid text-danger"
                                                                                      data-valmsg-for="FacebookLink"
                                                                                      data-valmsg-replace="true">
                                                                                    {{ $errors->first('FacebookLink') }}</span>
                </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Google Plus Link</label> @if(!empty($clientInformations->GooglePlusLink))
                        <input class="form-control text-box single-line" type="text" id="GooglePlusLink"
                               name="GooglePlusLink" type="text"
                               value="{{ $clientInformations->GooglePlusLink }}"
                        /> @else
                        <input id="GooglePlusLink" type="text" class="form-control" name="GooglePlusLink"
                               value=""> @endif
                    @if($errors->has('GooglePlusLink'))
                        <span class="help-block">
                                                                                            <span class="field-validation-valid text-danger"
                                                                                                  data-valmsg-for="GooglePlusLink"
                                                                                                  data-valmsg-replace="true">
                                                                                                {{ $errors->first('GooglePlusLink') }}</span>
                </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Twitter Link</label> @if(!empty($clientInformations->TwitterLink))
                        <input class="form-control text-box single-line" type="text" id="TwitterLink" name="TwitterLink"
                               type="text" value="{{ $clientInformations->TwitterLink }}"
                        /> @else
                        <input id="TwitterLink" type="text" class="form-control" name="TwitterLink" value=""> @endif
                    @if ($errors->has('TwitterLink'))
                        <span class="help-block">
                                                                                                        <span class="field-validation-valid text-danger"
                                                                                                              data-valmsg-for="TwitterLink"
                                                                                                              data-valmsg-replace="true">
                                                                                                            {{ $errors->first('TwitterLink') }}</span>
                </span>
                    @endif

                </div>

                <div class="form-group has-feedback">
                    <label>Youtube Link</label> @if(!empty($clientInformations->YoutubeLink))
                    <input class="form-control text-box single-line" type="text" id="YoutubeLink" name="LinkedinLink" type="text" value="{{ $clientInformations->YoutubeLink }}"
                    /> @else
                    <input id="YoutubeLink" type="text" class="form-control" name="YoutubeLink" value=""> @endif @if ($errors->has('YoutubeLink'))
                    <span class="help-block">
                                                                                                                                    <span class="field-validation-valid text-danger"
                                                                                                                                          data-valmsg-for="YoutubeLink"                                                                                                     {{ $errors->first('LinkedinLink') }}</span>
                    </span>
                    @endif

                <div class="form-group has-feedback">
                    <label>Linkedin Link</label> @if(!empty($clientInformations->LinkedinLink))
                        <input class="form-control text-box single-line" type="text" id="LinkedinLink"
                               name="LinkedinLink" type="text" value="{{ $clientInformations->LinkedinLink }}"
                        /> @else
                        <input id="LinkedinLink" type="text" class="form-control" name="LinkedinLink"
                               value=""> @endif @if ($errors->has('LinkedinLink'))
                        <span class="help-block">
                                                                                                                    <span class="field-validation-valid text-danger"
                                                                                                                          data-valmsg-for="LinkedinLink"                                                                                                     {{ $errors->first('LinkedinLink') }}</span>
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
