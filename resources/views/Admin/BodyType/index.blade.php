@extends('layouts.admin')

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
                Body Type Name
            </th>

            <th id="table-header">Operations</th>

        </tr>

        @foreach ($allbodytypes as $bodytype)
            <tr>
                <td id="table-header">
                    {{ $bodytype->BodyTypeName }}
                </td>

                <td id="table-header">
                    <a href="{{ route('bodytype.edit',$bodytype->BodyTypeID) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="text-align: center">
        {{ $allbodytypes->links() }}
    </div>
@endsection