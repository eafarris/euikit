@props(['action' => '', "method" => 'POST', "footer" => ''])

<form action="{{ $action }}" method="POST" class="space-y-6">
@unless ($method == 'POST')
@method($method)
@endunless

@if ($errors->any())
<x-euikit::alert type="error" class="mt-4">
    Your changes were not submitted due to errors in the form. Please correct the appropriate fields
    below.
</x-euikit::alert>
@endif


@csrf

{{ $slot }}

@if ($footer)
    @unless(is_string($footer))
        <x-e::footer
            {{ $attributes->merge([
                'lefticon' => $footer->attributes['lefticon'],
                'righticon' => $footer->attributes['righticon']
            ]) }}
        >
            {{ $footer }}
        </x-e::footer>
    @else
        <x-e::footer>{{ $footer }}</x-e::footer>
    @endunless
@endif

</form><!-- EUIKit Form Component -->