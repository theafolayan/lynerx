@component('mail::message')
# One More Step

Please confirm your Email address

@component('mail::button', ['url' => route('confirm-email').'?token='.$user->confirm_token])
Confirm your Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
