@component('mail::message')
# Your Sucksess was up voted

{{$liker->name}} enjoys your Sucksess.

@component('mail::button', ['url' => route('viewads.show', $ad)])
Viewed your Sucksess
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
