@props(['route' => '', 'type' => 'info', 'title' => '', 'icon' => ''])
@php
    $button = 'p-2 bg-slate-300 text-slate-500 dark:bg-slate-500 dark:text-slate-700 transition scale-y-110';
    switch($type) {
        case 'success':
        case 'green':
            $hovercoloring = 'hover:bg-green-300 hover:text-green-800';
            break;
        case 'warning':
        case 'yellow':
            $hovercoloring = 'hover:bg-yellow-300 hover:text-yellow-800';
            break;
        case 'danger':
        case 'red':
            $hovercoloring = 'hover:bg-red-300 hover:text-red-800';
            break;
        case 'primary':
        case 'info':
        case 'blue':
            $hovercoloring = 'hover:bg-blue-300 hover:text-blue-800';
            break;
    }
@endphp
@if ($route)
    <a {{ $attributes->merge(['class' => $button . ' inline-block ' . $hovercoloring]) }} href="{{ $route }}" title="{{ $title }}">
@else
    <button title="{{ $title }}" {{ $attributes->merge(['class' => $button . ' ' . $hovercoloring]) }}>
@endif
    @svg($icon, 'w-4 h-4')
@if ($route)
    </a>
@else
    </button>
@endif
