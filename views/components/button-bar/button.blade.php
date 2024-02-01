@props(['type' => 'info', 'title' => '', 'icon' => '', 'route' => ''])
@php
    $button = 'p-2 first:rounded-l-md last:rounded-r-md relative inline-flex items-center bg-slate-300 text-slate-500 transition hover:scale-y-110';
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
<a {{ $attributes->merge(['class' => $button . $hovercoloring]) }} href="{{ $route }}" title="{{ $title }}">
@else
<button title="{{ $title }}" {{ $attributes->merge(['class' => $button . ' ' . $hovercoloring]) }}>
@endif
    @svg($icon, 'w-4 h-4')
@if ($route)
</a>
@else
</button>
@endif