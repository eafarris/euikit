@props(['name'])
@php
    $slug = Str::slug($name);
@endphp

<a href="#" @click.prevent="tab = '{{ $slug }}'; window.location.hash = tab"
  class="border-transparent group inline-flex items-center py-4 px-1 text-sm font-medium"
  :class="tab === '{{ $slug }}'
    ? 'text-slate-600 border-b-2 border-slate-600'
    : 'text-slate-400 hover:text-slate-500 hover:border-b-2 hover:border-slate-500'
">
    <span>{{ $name }}</span>
</a>

<template x-teleport="select#tabs">
    <option value="{{ $slug }}">{{ $name }}</option>
</template>

<template x-teleport="div#tabs-content">
<div x-show="tab === '{{ $slug }}'">
    {{ $slot }}
</div>
</template>