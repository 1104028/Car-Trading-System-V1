@extends('layouts.admin')

@section('additionalScript')
    <script type="text/javascript">
        function getbrandlist(id) {
            var form_input = [];
            form_input.push({name: '_token', value: '{{csrf_token()}}'});

            // Add hash object
            form_input.push({
                name: 'id', value: id
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('brandlist') }}",
                async: false,
                data: $.param(form_input),
                success: function (data) {
                    var items = [];
                    items.push("<option value=" + 0 + ">" + "Select Brand " + "</option>");

                    for (var i = 0; i < data.length; i++) {
                        items.push("<option value=" + data[i].BrandID + ">" + data[i].BrandName + "</option>");
                    }
                    $("#BrandID").html(items.join(' '));
                }
            });
        }

        function getmodellist(id) {
            var form_input = [];
            form_input.push({name: '_token', value: '{{csrf_token()}}'});

            // Add hash object
            form_input.push({
                name: 'id', value: id
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('modellist') }}",
                async: false,
                data: $.param(form_input),
                success: function (data) {
                    var items = [];
                    items.push("<option value=" + 0 + ">" + "Select Brand " + "</option>");

                    for (var i = 0; i < data.length; i++) {
                        items.push("<option value=" + data[i].ModelID + ">" + data[i].ModelName + "</option>");
                    }

                    $("#ModelID").html(items.join(' '));
                }
            });
        }

    </script>

@endsection
@section('content')
    <h2 style="text-align:center;">Add Best Selling Car</h2>

    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message
        </script>
    @endif

    <form method="POST" action="{{ route('latestcar.store') }}">
        {{ csrf_field() }}
        <style>
            .register-box {
                margin-top: 1%;
            }
        </style>

        <div class="register-box">
            <div class="register-box-body">
                <div class="form-group has-feedback">
                    <label for="CompanyID">Company Name</label>
                    <select class="form-control" data-val="true"
                            data-val-number="The field Company Name must be a number."
                            data-val-required="The Company Name field is required." id="CompanyID" name="CompanyID"
                            onchange="getbrandlist(this.value)">
                        <option value="">- Company -</option>
                        @foreach($allcompany as $company)
                            <option value="{{ $company->CompanyID }}">{{ $company->CompanyName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group has-feedback">
                    <label>Brand Name</label>
                    <select class="form-control" data-val="true"
                            data-val-number="The field Brand Name must be a number."
                            data-val-required="The Brand Name field is required." id="BrandID" name="BrandID"
                            onchange="getmodellist(this.value)">
                        <option value="">- Brand -</option>
                        @foreach($allbrands as $brand)
                            <option value="{{ $brand->BrandID }}">{{ $brand->BrandName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group has-feedback">
                    <label>Model Name</label>
                    <select class="form-control" data-val="true" data-val-number="The field ModelID must be a number."
                            data-val-required="The Model Name field is required." id="ModelID" name="ModelID" required>
                        <option value="">- Model -</option>
                        @foreach($allcars as $car)
                            <option value="{{ $car->ModelID }}">{{ $car->ModelName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Add</button>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.form-box -->
    </form>
@endsection