@props(['name', 'header'])
<template x-teleport="body">
<div id="{{ $name }}" wire:ignore.self
    x-data="{ show: false, name: '{{ $name }}' }"
    x-show="show"
    x-cloak
    @keydown.escape.window="show=false"
    @modal.window="
        show = ($event.detail === name);
    "
>
    <div class="fixed inset-0 backdrop-blur-xs backdrop-brightness-75 m-auto"
        @click="show = false"
    >
    </div><!-- backdrop -->
    <div {{ $attributes->merge(['class' =>
        'z-10 fixed inset-0 shadow-2xl p-4 m-auto w-1/2 h-fit rounded-2xl
        border-slate-300 border-2
        bg-linear-to-br to-80%
        from-slate-50/60 via-slate-200 to-slate-100/60
        dark:border-slate-900 dark:from-slate-600/70 dark:to-slate-700/60 dark:text-slate-300
        ']) }} >
        <div class="flex flex-col size-fit justify-between w-full">
            @unless(empty($header))
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
                    <x-euikit::header>{{ $header }}</x-euikit::header>
                @endunless
            @endunless
            <div class="p-2">
                {{ $slot }}
            </div>
            @unless(empty($footer))
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
            @endunless
        </div>
    </div>
</div>
</template>
