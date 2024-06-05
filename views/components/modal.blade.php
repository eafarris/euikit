@props(['name'])
<template x-teleport="body">
<div id="{{ $name }}"
    x-data="{ show: false, name: '{{ $name }}' }"
    x-show="show"
    x-cloak
    @keydown.escape.window="show=false"
    @modal.window="
        show = ($event.detail === name);
    "
>
    <div class="fixed inset-0 backdrop-blur-sm backdrop-brightness-75 m-auto"
        @click="show = false"
    >
    </div><!-- backdrop -->
    <div {{ $attributes->merge(['class' =>
        'z-50 fixed inset-0 shadow-2xl p-4 m-auto w-1/2 h-fit rounded-2xl
        border-slate-300 border-2
        bg-gradient-to-br to-80%
        from-slate-50/60 via-slate-200 to-slate-100/60
        dark:border-slate-900 dark:from-slate-600 dark:to-slate-700
        ']) }} >
        <div class="flex flex-col size-fit justify-between w-full">
            @if($header)
                @unless(is_string($header))
                <x-e::header
                    {{ $attributes->merge([
                        'lefticon' => $header->attributes['lefticon'],
                        'righticon' => $header->attributes['righticon']
                    ]) }}
                >
                    {{ $header }}
                </x-e::header>
                @else
                    <x-e::header>{{ $header }}</x-e::header>
                @endunless
            @endif
            <div class="py-8">
                {{ $slot }}
            </div>
            @if($footer)
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
        </div>
    </div>
</div>
</template>
