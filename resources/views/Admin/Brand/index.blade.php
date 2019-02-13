@extends('layouts.admin')
<?php
use App\DataLayer\CarTradingDBAccess;
use App\Model\Company;
?>

@section('content')

    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message
        </script>
    @endif

    <h2 style="text-align:center">All Body Types</h2>

    <table class="table table-bordered table-striped">
        <tr>
            <th id="table-header">
                Brand Name
            </th>
            <th id="table-header">
                Company Name
            </th>
            <th id="table-header">Operations</th>

        </tr>

        @foreach ($allbrands as $brand)
            <tr>
                <td id="table-header">
                    {{ $brand->BrandName }}
                </td>

                <td id="table-header">
                    <?php
                    $companyname = Company::find($brand->CompanyID);
                    ?>
                    {{ $companyname->CompanyName }}
                </td>

                <td id="table-header">
                    <a href="{{ route('brand.edit',$brand->BrandID) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="text-align: center">
        {{ $allbrands->links() }}
    </div>
@endsection