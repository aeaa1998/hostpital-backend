@component('mail::message')
# Hostpital

Recipe:
*{{$recipe}}
Observations:
*{{$observations}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
