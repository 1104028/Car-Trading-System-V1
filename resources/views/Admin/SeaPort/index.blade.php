@extends('layouts.admin')
<?php
use App\DataLayer\CarTradingDBAccess;
use App\Model\Country;
?>



@section('content') @if(session()->has('message'))
    <script>
        alert('{{ session()->get('message') }}'); // display string message
    </script>
@endif

<h2 style="text-align:center">All Body Types</h2>

<table class="table table-bordered table-striped">
    <tr>
        <th id="table-header">
            SerPort Name
        </th>
        <th id="table-header">
            SeaPort Code
        </th>
        <th id="table-header">
            Country Name
        </th>
        <th id="table-header">Operations</th>

    </tr>

    @foreach ($seaports as $seaport)
        <tr>
            <td id="table-header">
                {{ $seaport->SerPortName }}
            </td>

            <td id="table-header">
                {{ $seaport->SerPortCode }}
            </td>

            <td id="table-header">
                {{ $seaport->countries->CountryName }}
            </td>

            <td id="table-header">
                <a href="{{ route('seaport.edit',$seaport->SeaPortID) }}">Edit</a>
            </td>
        </tr>
    @endforeach
</table>
<div style="text-align: center">
    {{ $seaports->links() }}
</div>
@endsection