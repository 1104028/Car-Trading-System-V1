@extends('layouts.admin')

@section('content')

    @if(session()->has('message'))
        <script>
            alert('{{ session()->get('message') }}'); // display string message
        </script>
    @endif

    <h2 style="text-align:center">All Messages from Customers</h2>

    <table class="table table-bordered table-striped">
        <tr>
            <th id="table-header">
                    First Name
            </th>
            <th id="table-header">
                    Last Name
            </th>
            <th id="table-header">
                    Subject
            </th>
            <th id="table-header">
                    Email
            </th>
            <th id="table-header">
                    Phone Number
            </th>
            <th id="table-header">
                    Message
            </th>
            <th id="table-header">Operations</th>

        </tr>

        @foreach ($allcontacts as $contact)
            <tr>
                <td id="table-header">
                    {{ $contact->FirstName }}
                </td>

                <td id="table-header">
                    {{ $contact->LastName }}
                </td>

                <td id="table-header">
                        {{ $contact->Subject }}
                    </td>
    
                    <td id="table-header">
                        {{ $contact->Email }}
                    </td>

                    <td id="table-header">
                            {{ $contact->Phone_number }}
                        </td>
        
                        <td id="table-header">
                            {{ $contact->Message }}
                        </td>

                <td id="table-header">
                        <form action="{{route('contacts.destroy',$contact->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit">Delete</button>
                        </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="text-align: center">
        {{ $allcontacts->links() }}
    </div>
@endsection