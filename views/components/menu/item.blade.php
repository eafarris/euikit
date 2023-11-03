@props(['icon' => '', 'route' => ''])
@php
$classes = 'shrink-1 flex items-center p-2 pr-0 text-slate-500 dark:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-700 hover:rounded-tl-lg hover:rounded-bl-lg';
if ($route == url()->current()) {
    $classes = 'shrink-1 flex items-center p-2 pr-0 text-slate-500 bg-slate-50 dark:text-slate-300 dark:bg-slate-800 rounded-tl-lg rounded-bl-lg';
}
@endphp

<a href="{{ $route }}" {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        @svg($icon, 'w-6 h-6 pr-1 inline')
    @endif
{{ $slot }}
</a>