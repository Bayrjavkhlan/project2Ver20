@component('mail::message')
    <p>Hello{{$user->name}}</p>
    {{-- @component('mail::button',['url'=>('verify/'.$user->remember_token)]) --}}
    @component('mail::button',['url'=>('verify')])
    Verify
@endcomponent

<p>Thanks</p><br>
{{config('app.name')}}
@endcomponent  