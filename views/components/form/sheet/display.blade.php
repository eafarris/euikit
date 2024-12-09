@props(['value' => ''])
@php
  $classes = 'p-2 text-base self-baseline tabular-nums border line-clamp-1 hover:line-clamp-none';
  $classes .= 'border-slate-200 bg-slate-50 ';
  $classes .= 'dark:border-slate-500 dark:bg-slate-800 dark:text-slate-300';
@endphp
<div {{ $attributes->merge(['class' => $classes]) }} >
    {{ $value }}
</div>
