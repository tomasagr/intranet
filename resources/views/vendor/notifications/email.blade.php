@component('mail::layout')
@slot('header')
@component('mail::header', ['url' => config('app.url')])
    Somos Summit
@endcomponent
@endslot
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hola!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@if (isset($actionText))
<?php
switch ($level) {
    case 'success':
    $color = 'green';
    break;
    case 'error':
    $color = 'red';
    break;
    default:
    $color = 'blue';
}
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endif

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

<!-- Salutation -->
@if (! empty($salutation))
{{ $salutation }}
@else
Saludos,<br> Somos Summit
@endif
@slot('footer')
@component('mail::footer')
    Que tenga un buen día :)
@endcomponent
@endslot
@endcomponent
