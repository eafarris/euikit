@php
    $classes = 'border ';
    $classes .= 'border-slate-200 bg-transparent text-slate-700 focus:focus-0 focus:ring-transparent ';
    $classes .= 'dark:bg-slate-700 dark:text-slate-300 dark:border-slate-500 dark:focus:ring-slate-300';
@endphp
<input {{ $attributes->merge(['class' => $classes]) }} type="text" /''>
