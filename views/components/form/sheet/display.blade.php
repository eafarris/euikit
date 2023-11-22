@props(['value' => ''])
<div {{ $attributes->merge(['class' => 'p-2 text-base self-baseline tabular-nums border-slate-200 bg-slate-50 dark:text-slate-700 dark:bg-slate-400 border']) }} >
    {{ $value }}
</div>