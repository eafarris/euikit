@props(['type' => 'info', 'title' => '', 'icon' => '', 'route' => ''])
@php
    $button = 'p-2 first:rounded-l-md last:rounded-r-md relative inline-flex items-center bg-slate-300 text-slate-500 transition hover:scale-y-110';
    switch($type) {
        case 'light':
            $hovercoloring = 'hover:bg-slate-200 hover:text-slate-600';
            break;
        case 'dark':
            $hovercoloring = 'hover:bg-slate-800 hover:text-slate-200';
            break;
        case 'link':
            $hovercoloring = 'hover:bg-blue-200 hover:text-slate-800';
            break;
        case 'info':
            $hovercoloring = 'hover:bg-slate-600 hover:text-white';
            break;
        case 'success':
        case 'green':
            $hovercoloring = 'hover:bg-green-600 hover:text-white';
            break;
        case 'warning':
        case 'yellow':
            $hovercoloring = 'hover:bg-yellow-500 hover:text-slate-100';
            break;
        case 'danger':
        case 'delete':
        case 'error':
        case 'red':
            $hovercoloring = 'hover:bg-red-500 hover:text-slate-100';
            break;
        case 'primary':
        case 'blue':
            $hovercoloring = 'hover:bg-blue-400 hover:text-slate-100';
            break;
        case 'ghost':
            $hovercoloring = 'hover:bg-slate-100 hover:text-slate-400';
            break;
    }
@endphp
@if ($route)
<a {{ $attributes->merge(['class' => $button . ' ' . $hovercoloring]) }} href="{{ $route }}" title="{{ $title }}">
@else
<button title="{{ $title }}" {{ $attributes->merge(['class' => $button . ' ' . $hovercoloring]) }}>
@endif
    @svg($icon, 'w-4 h-4')
@if ($route)
</a>
@else
</button>
@endif
