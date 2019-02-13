<?Php 
    use App\Model\ClientInformation;
    $clientInformations = ClientInformation::where('Companyid',1)->first();
    use App\DataLayer\CarTradingDBAccess;
    $DBAAccess = new CarTradingDBAccess();
?> 

@component('mail::layout') 
{{-- Header --}} 
@slot('header') 
@component('mail::header', ['url' => config('app.url')]) {{
$clientInformations->COmpanyName 
}} 
@endcomponent 
@endslot 
{{-- Body --}} 
<h1 style="text-align:center">Nirapod.Bangla Solutions Limited</h1>
<b>Thanks</b><br>
<b>{{ $clientInformations->COmpanyName }} Team</b> 
{{-- Subcopy --}} 
@isset($subcopy) 
@slot('subcopy') 
@component('mail::subcopy')
@endcomponent 
@endslot 
@endisset {{-- Footer --}} 
@slot('footer') 
@component('mail::footer') © {{ date('Y') }} 
{{ $clientInformations->COmpanyName
}}
@endcomponent 
@endslot 
@endcomponent