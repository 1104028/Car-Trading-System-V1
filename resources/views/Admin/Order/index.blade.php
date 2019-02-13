@extends('layouts.admin')

@section('content')
@if(session()->has('message'))
<script>
    alert('{{ session()->get('message') }}'); // display string message
</script>
@endif
    <h2 style="text-align:center">Order List</h2>

    <table class="table table-bordered table-striped">
        <tr>
            <th id="table-header">
                Model Name
            </th>

            <th id="table-header">
                CustomerName
            </th>

            <th id="table-header">
                CustomerAddress
            </th>

            <th id="table-header">
                OrderStatus
            </th>

            <th id="table-header">Operations</th>

        </tr>

        @foreach ($allorders as $order)
            <tr>
                <td id="table-header">
                    {{ $order->allmodels->ModelName }}
                </td>

                <td id="table-header">
                    {{ $order->CustomerName }}
                </td>

                <td id="table-header">
                    {{ $order->CustomerAddress }}
                </td>

                <td id="table-header">
                    {{ $order->OrderStatus }}
                </td>

                <td id="table-header">
                    <a href="{{ route('invoice',$order->OrderID) }}">Send Invoice</a> |
                    <a href="{{ route('order.destroy',$order->OrderID) }}">Delete</a>
                </td>
            </tr>
        @endforeach

    </table>
@endsection