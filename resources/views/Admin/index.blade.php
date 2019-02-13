@extends('layouts.admin')

@section('content')
    <h2 style="text-align: center;">All Models</h2>
    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message
        </script>
    @endif

    <table class="table table-bordered table-striped">
        <tr>
            <th id="table-header">
                Model Name
            </th>
            <th id="table-header">
                Year Of Release
            </th>
            <th id="table-header">
                Price
            </th>
            <th id="table-header">
                Body Style
            </th>
            <th id="table-header">Operations</th>

        </tr>

        @foreach ($allmodels as $model)
            <tr>
                <td id="table-header">
                    {{ $model->ModelName }}
                </td>

                <td id="table-header">
                    {{ $model->YearOfRelease }}
                </td>

                <td id="table-header">
                    {{ $model->Price }}
                </td>

                <td id="table-header">
                    {{ $model->bodytype->BodyTypeName }}
                </td>

                <td id="table-header">
                    {{--  <a href="{{ route('car.edit',$model->ModelID) }}">Edit</a>|  --}}
                    {{--  <a href="{{ route('car.show',$model->ModelID) }}">Details</a>  --}}
                </td>
            </tr>
        @endforeach
    </table>
    <div style="text-align: center">
        {{ $allmodels->links() }}
    </div>
@endsection