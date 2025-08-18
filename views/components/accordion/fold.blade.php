@props(['title', 'lefticon', 'righticon', 'badge_type' => 'info', 'badge'])
@php
    $slug = Str::slug($title);
@endphp
<a href="#" @click.prevent="fold = fold === '{{ $slug }}' ? '' : '{{ $slug }}'"
  class="block pt-4 text-slate-600 dark:text-slate-200"

>
    <div x-show="fold === '{{ $slug }}'" class="inline-block">
        @svg('heroicon-o-chevron-down', 'inline w-6 h-6 pr-1')
    </div>
    <div x-show="fold !== '{{ $slug }}'" class="inline-block">
        @svg('heroicon-o-chevron-right', 'inline w-6 h-6 pr-1')
    </div>
    <span
        :class="fold === '{{ $slug }}'
        ? 'text-slate-800 dark:text-slate-200 hover:dark:text-slate-50'
        : 'hover:text-slate-800 dark:text-slate-200 hover:dark:text-slate-50'"
    >{{ $title }}</span>
    @isset($righticon)
        @svg($righticon, 'inline w-6 h-6 pl-1')
    @endisset
    @isset($badge)
        <x-euikit::tag type="{{ $badge_type }}">{{ $badge }}</x-euikit::tag>
    @endisset
</a>
{{-- rollup code based on https://hussein-alhammad.com/blog/2023/03/alpine-slide-up-down-animation/ --}}
<div id="{{ $slug }}"
    class="h-0 pb-2 border-l-2 border-slate-400 dark:text-slate-200 opacity-0 transition-all duration-300 overflow-hidden"
    :class="fold === '{{ $slug }}' && 'opacity-100 pointer-events-none p-2 m-2 ml-8'"
    :style="fold === '{{ $slug }}' && {height: $el.scrollHeight+`px`}"
>
    {{ $slot }}
</div>
