@component('mail::message')
# One Last Step

We Just Need to Confirm Your Email Address to prove you are a human

@component('mail::button', ['url' => url('/register/confirm?token?' . $user->confirmation_token)])
Confirm Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
