@extends('layouts.admin') 

@section('content')
@if(session()->has('message'))
<script>
    alert('{{ session()->get('message') }}'); // display string message
</script>
@endif
@endsection