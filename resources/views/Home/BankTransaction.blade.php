@extends('layouts.main')
@section('title') Transaction
@endsection

@section('content')

    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message
        </script>
    @endif

    <form action="{{ route('BankTransactionPost') }}" enctype="multipart/form-data" method="post">
        <div class="container">
            {{ csrf_field() }}
            <div class="startern-section">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8 col-md-offset-3 col-sm-10 col-sm-offset-1">
                        <div class="service-order-form-section">
                            <h1 class="myblink" style="display: block;">Submit Your Payment Information</h1>
                            <div class="service-order-form">

                                <div class="form-group">
                                    <label for="">Invoice No</label>
                                    <input class="form-control text-box single-line" data-val="true"
                                           data-val-required="Invoice No required" id="InvoiceNo" name="InvoiceNo"
                                           placeholder="Invoice number" type="text" value=""/>
                                    @if($errors->has('InvoiceNo'))
                                        <span class="field-validation-valid text-danger" data-valmsg-for="InvoiceNo"
                                              data-valmsg-replace="true">
                                                    Invoice No required
                                                </span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label for="">Bank Name</label>
                                    <input class="form-control text-box single-line" data-val="true"
                                           data-val-required="Bank Name required" id="BankName" name="BankName"
                                           placeholder="Bank Name" type="text" value=""/>
                                    @if ($errors->has('BankName'))
                                        <span class="field-validation-valid text-danger" data-valmsg-for="BankName"
                                              data-valmsg-replace="true">
                                                    Bank Name required
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Brach Name</label>
                                    <input class="form-control text-box single-line" data-val="true"
                                           data-val-required="Branch Name required" id="BranchName"
                                           name="BranchName" placeholder="Brach Name" type="text" value=""/>
                                    @if ($errors->has('BranchName'))
                                        <span class="field-validation-valid text-danger" data-valmsg-for="InvoiceNo"
                                              data-valmsg-replace="true">
                                          Branch Name required
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Bank Identifier Code</label>
                                    <input class="form-control text-box single-line" id="BankIdentifierCode"
                                           name="BankIdentifierCode" placeholder="Bank Identifier Code"
                                           type="text" value=""/>

                                    @if ($errors->has('BankIdentifierCode'))
                                        <span class="field-validation-valid text-danger" data-valmsg-for="InvoiceNo"
                                              data-valmsg-replace="true">
                                            BankIdentifier Code required
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="">Account Name</label>

                                    <input class="form-control text-box single-line" data-val="true"
                                           data-val-required="Account Name required" id="AccountName"
                                           name="AccountName" placeholder="Account Name" type="text" value=""/>
                                    @if ($errors->has('AccountName'))
                                        <span class="field-validation-valid text-danger" data-valmsg-for="InvoiceNo"
                                              data-valmsg-replace="true">
                                    Account Name required
                                </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Account Number</label>
                                    <input class="form-control text-box single-line" data-val="true"
                                           data-val-required="Account Number required" id="AccountNumber"
                                           name="AccountNumber" placeholder="Account Number" type="text" value=""/>
                                    @if ($errors->has('AccountNumber'))
                                        <span class="field-validation-valid text-danger" data-valmsg-for="InvoiceNo"
                                              data-valmsg-replace="true">
                              Account Number required
                            </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input class="form-control text-box single-line" data-val="true"
                                           data-val-date="The field Date must be a date."
                                           data-val-required="The Date field is required."
                                           id="Date" name="Date" type="date" value=""/>
                                </div>
                                <div class="form-group">
                                    <label for="">Amount</label>
                                    <input class="form-control text-box single-line" data-val="true"
                                           data-val-number="The field Amount must be a number."
                                           data-val-required="Amount required"
                                           id="Amount" name="Amount" placeholder="USD" type="text" value="0"/>
                                    @if ($errors->has('Amount'))
                                        <span class="field-validation-valid text-danger" data-valmsg-for="InvoiceNo"
                                              data-valmsg-replace="true">
                                Amount required
                            </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Bank Receipt</label>

                                    <input type="file" name="BankReceipt" id="BankReceipt" accept="image/*" required/>
                                </div>

                                <div align="center">
                                    <button type="submit" id="submiy_button" class="btn-order-form button btn-block">
                                        SUBMIT
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection