<?Php 
    use App\Model\ClientInformation;
    $clientInformations = ClientInformation::where('Companyid',1)->first();
?>

@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ $clientInformations->COmpanyName }}
        @endcomponent
    @endslot
    {{-- Body --}}
    Your car trading system email verification code is <b>{{ $verification_code }}</b><br>
    If it is not you please ignore it <br>
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
        @component('mail::footer')
            © {{ date('Y') }} {{ $clientInformations->COmpanyName }}
        @endcomponent
    @endslot
@endcomponent