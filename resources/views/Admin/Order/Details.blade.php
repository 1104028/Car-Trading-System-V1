﻿@extends('layouts.admin')

@section('content')

    <h2 style="text-align:center;">Order Details</h2>

    <div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-2">
                Customer Name
            </div>
            <div class="col-md-4">
                @Model.CustomerName
            </div>
            <div class="col-md-3">

            </div>
        </div>

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-2">
                Customer Email
            </div>
            <div class="col-md-4">
                @Model.CustomerEmail
            </div>
            <div class="col-md-3">

            </div>
        </div>

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-2">
                Customer Name
            </div>
            <div class="col-md-4">
                @Model.CustomerName
            </div>
            <div class="col-md-3">

            </div>
        </div>

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-2">
                Customer Contact Number
            </div>
            <div class="col-md-4">
                @Model.CustomerContactNumber
            </div>
            <div class="col-md-3">

            </div>
        </div>

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-2">
                Customer Address
            </div>
            <div class="col-md-4">
                @Model.CustomerAddress
            </div>
            <div class="col-md-3">

            </div>
        </div>

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-2">
                ModelName
            </div>
            <div class="col-md-4">
                @Model.ModelName
            </div>
            <div class="col-md-3">

            </div>
        </div>

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-2">
                Country
            </div>
            <div class="col-md-4">
                @Model.Country
            </div>
            <div class="col-md-3">

            </div>
        </div>

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-2">
                Sea Port
            </div>
            <div class="col-md-4">
                @Model.PortName
            </div>
            <div class="col-md-3">

            </div>
        </div>

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-2">
                Delivery Address
            </div>
            <div class="col-md-4">
                @Model.DeliveryAddress
            </div>
            <div class="col-md-3">

            </div>
        </div>

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-2">
                Invoice No
            </div>
            <div class="col-md-4">
                @Model.InvoiceNo
            </div>
            <div class="col-md-3">

            </div>
        </div>
        <table class="table table-bordered table-striped">
            <tr>
                <th id="table-header">
                    Model Name
                </th>
                <th id="table-header">
                    Description
                </th>

                <th id="table-header">
                    Quantity
                </th>
                <th id="table-header">
                    Price
                </th>
            </tr>
            <tr>
                <td id="table-header"></td>

                <td id="table-header">
                    Base Price
                </td>
                <td id="table-header"></td>
                <td id="table-header">
                    @Html.DisplayFor(modelItem => Model.BasePrice)
                </td>
            </tr>

            <tr>
                <td id="table-header"></td>

                <td id="table-header">
                    Sea Port Price
                </td>
                <td id="table-header"></td>
                <td id="table-header">
                    @Html.EditorFor(modelItem => Model.BasePrice)
                </td>
            </tr>

            <tr>
                <td id="table-header">
                    @Html.DisplayFor(modelItem => Model.ModelName)
                </td>

                <td id="table-header">
                    Shifting Cost
                </td>
                <td id="table-header">1</td>
                <td id="table-header">
                    @Html.EditorFor(modelItem => Model.ShiftingCost)
                </td>
            </tr>

            <tr>
                <td id="table-header"></td>

                <td id="table-header">
                    VAT
                </td>
                <td id="table-header"></td>
                <td id="table-header">
                    @Html.EditorFor(modelItem => Model.VAT)
                </td>
            </tr>

            <tr>
                <td id="table-header"></td>

                <td id="table-header"></td>
                <td id="table-header"></td>
                <td id="table-header">
                    @Html.EditorFor(modelItem => Model.TotalCost)
                </td>
            </tr>
        </table>


        <div class="row">
            <div class="col-md-4">

            </div>

            <div class="col-md-4">
                <button class="btn btn-primary" type="submit">Send Quotation</button>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>*@

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="text-xs-center">
                    <i class="fa fa-search-plus float-xs-left icon"></i>
                    <h2>Invoice for purchase #33221</h2>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12 col-md-3 col-lg-3 float-xs-left">
                        <div class="card  height">
                            <div class="card-header">Billing Details</div>
                            <div class="card-block">
                                <strong>David Peere:</strong><br>
                                1111 Army Navy Drive<br>
                                Arlington<br>
                                VA<br>
                                <strong>22 203</strong><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-3">
                        <div class="card  height">
                            <div class="card-header">Payment Information</div>
                            <div class="card-block">
                                <strong>Card Name:</strong> Visa<br>
                                <strong>Card Number:</strong> ***** 332<br>
                                <strong>Exp Date:</strong> 09/2020<br>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-3">
                        <div class="card  height">
                            <div class="card-header">Order Preferences</div>
                            <div class="card-block">
                                <strong>Gift:</strong> No<br>
                                <strong>Express Delivery:</strong> Yes<br>
                                <strong>Insurance:</strong> No<br>
                                <strong>Coupon:</strong> No<br>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-3 float-xs-right">
                        <div class="card  height">
                            <div class="card-header">Shipping Address</div>
                            <div class="card-block">
                                <strong>David Peere:</strong><br>
                                1111 Army Navy Drive<br>
                                Arlington<br>
                                VA<br>
                                <strong>22 203</strong><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="text-xs-center"><strong>Order summary</strong></h3>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-xs-center"><strong>Item Price</strong></td>
                                    <td class="text-xs-center"><strong>Item Quantity</strong></td>
                                    <td class="text-xs-right"><strong>Total</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Samsung Galaxy S5</td>
                                    <td class="text-xs-center">$900</td>
                                    <td class="text-xs-center">1</td>
                                    <td class="text-xs-right">$900</td>
                                </tr>
                                <tr>
                                    <td>Samsung Galaxy S5 Extra Battery</td>
                                    <td class="text-xs-center">$30.00</td>
                                    <td class="text-xs-center">1</td>
                                    <td class="text-xs-right">$30.00</td>
                                </tr>
                                <tr>
                                    <td>Screen protector</td>
                                    <td class="text-xs-center">$7</td>
                                    <td class="text-xs-center">4</td>
                                    <td class="text-xs-right">$28</td>
                                </tr>
                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-xs-center"><strong>Subtotal</strong></td>
                                    <td class="highrow text-xs-right">$958.00</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-xs-center"><strong>Shipping</strong></td>
                                    <td class="emptyrow text-xs-right">$20</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-xs-center"><strong>Total</strong></td>
                                    <td class="emptyrow text-xs-right">$978.00</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection