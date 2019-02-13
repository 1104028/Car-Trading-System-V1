@extends('layouts.admin')

@section('content')

    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message
        </script>
    @endif

    <h2 style="text-align:center">All Countries</h2>

    <table class="table table-bordered table-striped">
        <tr>
            <th id="table-header">
                CountryName
            </th>
            <th id="table-header">Operations</th>

        </tr>

        @foreach ($allcountry as $country)
            <tr>
                <td id="table-header">
                    {{ $country->CountryName }}
                </td>

                <td id="table-header">
                    <a href="{{ route('country.edit',$country->CountryID) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="text-align: center">
        {{ $allcountry->links() }}
    </div>
@endsection