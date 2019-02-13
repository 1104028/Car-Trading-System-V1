<?Php 
    use App\Model\ClientInformation;
    $clientInformations = ClientInformation::where('Companyid',1)->first();

    use App\Model\CarModel; 
    $carmodels = CarModel::where('ModelID',$order_details->ModelID)->first();
?> 
@component('mail::layout') 
{{-- Header --}} 
@slot('header') 
@component('mail::header', ['url' => config('app.url')]) {{
$clientInformations->COmpanyName }} 
@endcomponent 
@endslot 
{{-- Body --}} 
<b>Model Name: {{ $carmodels->ModelName }}</b><br> 
<b>Customer Name: {{ $order_details->CustomerName }}</b><br> 
<b>Customer Email: {{ $order_details->CustomerEmail }}</b><br> 
<b>Customer Contact Number: {{ $order_details->CustomerContactNumber }}</b><br> 
<b>Customer Address: {{ $order_details->CustomerAddress }}</b><br> 
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