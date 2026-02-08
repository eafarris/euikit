@props(['header' => '', 'footer' => '', ])
<section {{ $attributes->merge(['class' =>
    'min-w-fit m-12 p-6 rounded-lg shadow-2xl border-2
    bg-linear-to-br via-10% to-80%
    border-slate-300 dark:border-slate-800
    from-slate-100/80 via-slate-200/80 to-slate-100/80
    dark:from-slate-500 dark:via-slate-800 dark:to-slate-700'
]) }}>


@if($header)
    @unless(is_string($header))
    <x-euikit::header
        {{ $attributes->merge([
            'lefticon' => $header->attributes['lefticon'],
            'righticon' => $header->attributes['righticon']
        ]) }}
    >
        {{ $header }}
    </x-euikit::header>
    @else
        <x-euikit::header> {{ $header }} </x-euikit::header>
    @endunless
@endif

<div class="text-lg text-slate-700 dark:text-slate-300">
    {{ $slot }}
</div>

@if($footer)
    @unless(is_string($footer))
        <x-euikit::footer
            {{ $attributes->merge([
                'lefticon' => $footer->attributes['lefticon'],
                'righticon' => $footer->attributes['righticon']
            ]) }}
        >
            {{ $footer }}
        </x-euikit::footer>
    @else
        <x-euikit::footer>{{ $footer }}</x-euikit::footer>
    @endunless
@endif
</section>
