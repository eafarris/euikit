@props(['name', 'lefticon', 'righticon', 'badgeType' => 'info', 'badge'])
@php
    $slug = Str::slug($name);
@endphp

<a href="#" @click.prevent="tab = '{{ $slug }}'; window.location.hash = tab"
  class="group inline-flex items-center py-4 px-1 text-sm font-medium"
  :class="tab === '{{ $slug }}'
    ? 'text-slate-600 border-b-2 border-slate-600 dark:text-slate-200 dark:border-slate-200'
    : 'text-slate-400 hover:text-slate-500 border-b-2 border-transparent hover:border-slate-400 dark:text-slate-400 dark:hover:text-slate-300 dark:hover:border-slate-400'
">
    @isset($lefticon)
        @svg($lefticon, 'inline w-6 h-6 pr-1')
    @endisset
    <span>{{ $name }}</span>
    @isset($righticon)
        @svg($righticon, 'inline w-6 h-6 pl-1')
    @endisset
    @isset($badge)
        <x-euikit::tag type="{{ $badgeType }}">{{ $badge }}</x-euikit::tag>
    @endisset
</a>

<template x-teleport="select#tabs">
    <option value="{{ $slug }}">{{ $name }}</option>
</template>

<template x-teleport="div#tabs-content">
<div x-show="tab === '{{ $slug }}'"
    x-transition:enter="transition-opacity ease-out"
    x-transition:enter-start="opacity-0 h-0"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition-opacity ease-in"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 h-0"
>
    {{ $slot }}
</div>
</template>
