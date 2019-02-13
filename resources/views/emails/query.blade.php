<?Php 
    use App\Model\ClientInformation;
    $clientInformations = ClientInformation::where('Companyid',1)->first();
?> 
@component('mail::layout') 
{{-- Header --}} 
@slot('header') 
@component('mail::header', ['url' => config('app.url')]) {{
$clientInformations->COmpanyName }} 
@endcomponent 
@endslot 
{{-- Body --}} 
A query has requested from this customer. <br>
<b>Subject: {{ $querydetails->Subject }}</b><br> 
<b>First Name: {{ $querydetails->FirstName }}</b><br> 
<b>Last Name: {{ $querydetails->LastName }}</b><br> 
<b>Email: {{ $querydetails->Email }}</b><br> 
<b>Contact Number: {{ $querydetails->Phone_number }}</b><br> 
<b>Message: {{ $querydetails->Message }}</b><br> 
<b>Thanks</b><br>
<b>{{ $clientInformations->COmpanyName }} Team</b> 
{{-- Subcopy --}} 
@isset($subcopy) 
@slot('subcopy') 
@component('mail::subcopy')
@endcomponent 
@endslot 
@endisset 
{{-- Footer --}} 
@slot('footer') 
@component('mail::footer') © {{ date('Y') }} {{ $clientInformations->COmpanyName
}} 
@endcomponent 
@endslot 
@endcomponent