@props(['type' => 'info',
    'route' => '',
    'lefticon' => '', 'righticon' => '',
])
@php
    $tag = 'inline-flex gap-1 grow-0 shrink items-center justify-items-center text-xs uppercase font-semibold px-2 py-1 rounded-md mx-1';

    $coloring = '';
    switch ($type) {
        case 'light':
            $coloring = 'bg-slate-100 text-slate-500';
            break;
        case 'dark':
            $coloring = 'bg-slate-500 text-slate-100';
            break;
        case 'link':
            $coloring = 'bg-transparent text-blue-600 underline underline-offset-2';
            break;
        case 'info':
            $coloring = 'bg-slate-300 text-slate-900';
            break;
        case 'success':
        case 'green':
            $coloring = 'bg-green-300 text-green-900';
            break;
        case 'warning':
        case 'yellow':
            $coloring = 'bg-yellow-300 text-yellow-900';
            break;
        case 'danger':
        case 'delete':
        case 'error':
        case 'red':
            $coloring = 'bg-red-300 text-red-900';
            break;
        case 'primary':
        case 'blue':
            $coloring = 'bg-blue-300 text-blue-900';
            break;
        case 'ghost':
            $coloring = 'bg-transparent text-slate-400';
            break;
    } // endswitch
@endphp
@if ($route)
    <a href="{{ $route }}" {{ $attributes->merge(['class' => $tag . ' ' . $coloring]) }}>
@else
<span {{ $attributes->merge(['class' => $tag . ' ' . $coloring]) }}>
@endif
    @if ($lefticon)
        @svg($lefticon, 'w-3 h-3 mr-1')
    @endif
{{ $slot }}
@if ($righticon)
    @svg($righticon, 'w-3 h-3 ml-1')
@endif
@if ($route)
</a>
@else
</span>
@endif

