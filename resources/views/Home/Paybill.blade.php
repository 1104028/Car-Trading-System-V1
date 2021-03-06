@extends('layouts.main')

@section('title')
    Pay Bill
@endsection

@section('content')
    <section class="quotation-form" id="quotation-form">
        <div class="container">
            <div class="startern-section">
                <div class="row">
                    <div class="col-md-2">
                    </div>

                    <div class="col-md-8 col-md-offset-3 col-sm-10 col-sm-offset-1">

                        <main class="credit-page-main start-purchase-page">
                            <h3 class="myblink" style="display: block;text-align:center">How would you like to Pay?</h3>

                            <div class="pay-option-container second pay-option-content">
                                <div class="pay-options-grid">
                                    <div class="pay-options-grid-left">
                                        <h3 class="pay-option-title">Finance with your bank</h3>
                                        <p>Use an existing approval from your own bank.</p>
                                    </div>
                                    <div class="pay-options-grid-right">
                                        <a class="btn btn-secondary btn-pay-option"
                                           href="{{ route('BankTransaction') }}"><span>Use My Bank</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="pay-option-container second pay-option-content">
                                <div class="pay-options-grid">
                                    <div class="pay-options-grid-left">
                                        <h3 class="pay-option-title">Pay with Credit Card</h3>
                                        <p>Transfer funds with a credit card.</p>
                                    </div>
                                    <div class="pay-options-grid-right">
                                        <a class="btn btn-secondary btn-pay-option"
                                           href="#"><span>Credit Card</span></a>
                                    </div>
                                </div>
                            </div>
                        </main>

                    </div>

                    <div class="col-md-2">
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection   