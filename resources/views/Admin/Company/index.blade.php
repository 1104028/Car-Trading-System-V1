@extends('layouts.admin')

@section('content')
    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message
        </script>
    @endif

    <h2 style="text-align:center">All Makers</h2>

    <table class="table table-bordered table-striped">
        <tr>
            <th id="table-header">
                Maker Name
            </th>
            <th id="table-header">
                Address
            </th>
            <th id="table-header">
                Country
            </th>
            <th id="table-header">Operations</th>

        </tr>

        @foreach ($allcompany as $company)
            <tr>
                <td id="table-header">
                    {{ $company->CompanyName }}
                </td>

                <td id="table-header">
                    {{ $company->Address }}
                </td>

                <td id="table-header">
                    {{ $company->Country }}
                </td>

                <td id="table-header">
                    <a href="{{ route('company.edit',$company->CompanyID) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="text-align: center">
        {{ $allcompany->links() }}
    </div>
@endsection