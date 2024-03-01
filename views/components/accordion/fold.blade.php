@props(['title', 'lefticon', 'righticon', 'badge_type' => 'info', 'badge'])
@php
    $slug = Str::slug($title);
@endphp
<a href="#" @click.prevent="fold = fold === '{{ $slug }}' ? '' : '{{ $slug }}'"
  class="block p-4 text-slate-600"

>
    <div x-show="fold === '{{ $slug }}'" class="inline-block">
        @svg('heroicon-o-chevron-down', 'inline w-6 h-6 pr-1')
    </div>
    <div x-show="fold !== '{{ $slug }}'" class="inline-block">
        @svg('heroicon-o-chevron-right', 'inline w-6 h-6 pr-1')
    </div>
    <span
        :class="fold === '{{ $slug }}'
        ? 'text-slate-800'
        : 'hover:text-slate-800'"
    >{{ $title }}</span>
    @isset($righticon)
        @svg($righticon, 'inline w-6 h-6 pl-1')
    @endisset
    @isset($badge)
        <x-e::tag type="{{ $badge_type }}">{{ $badge }}</x-e::tag>
    @endisset
</a>

<div id="{{ $slug }}" x-show="fold ==='{{ $slug }}'" x-cloak
    class="p-2 m-2 ml-8 border-l-2 border-slate-400"
>
    {{ $slot }}
</div>
