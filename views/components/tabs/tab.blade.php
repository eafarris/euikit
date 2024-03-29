@props(['name', 'lefticon', 'righticon', 'badge_type' => 'info', 'badge'])
@php
    $slug = Str::slug($name);
@endphp

<a href="#" @click.prevent="tab = '{{ $slug }}'; window.location.hash = tab"
  class="group inline-flex items-center py-4 px-1 text-sm font-medium"
  :class="tab === '{{ $slug }}'
    ? 'text-slate-600 border-b-2 border-slate-600'
    : 'text-slate-400 hover:text-slate-500 border-b-2 border-transparent hover:border-slate-400'
">
    @isset($lefticon)
        @svg($lefticon, 'inline w-6 h-6 pr-1')
    @endisset
    <span>{{ $name }}</span>
    @isset($righticon)
        @svg($righticon, 'inline w-6 h-6 pl-1')
    @endisset
    @isset($badge)
        <x-e::tag type="{{ $badge_type }}">{{ $badge }}</x-e::tag>
    @endisset
</a>

<template x-teleport="select#tabs">
    <option value="{{ $slug }}">{{ $name }}</option>
</template>

<template x-teleport="div#tabs-content">
<div x-show="tab === '{{ $slug }}'">
    {{ $slot }}
</div>
</template>