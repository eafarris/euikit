@php
    $classes = 'border border-transparent bg-transparent ';
    $classes .= 'dark:border-slate-500 dark:bg-slate-700 dark:text-slate-300'

@endphp
<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
