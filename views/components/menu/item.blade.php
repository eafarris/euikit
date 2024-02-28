@props(['icon', 'route', 'badge', 'badge_style'])
@php
$classes = 'shrink-1 flex items-center p-2 pr-0 text-slate-500 dark:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-700 hover:rounded-tl-lg hover:rounded-bl-lg';
if ($route == url()->current()) {
    $classes = 'shrink-1 flex items-center p-2 pr-0 text-slate-500 bg-slate-50 dark:text-slate-300 dark:bg-slate-800 rounded-tl-lg rounded-bl-lg';
}
@endphp

<a href="{{ $route }}" {{ $attributes->merge(['class' => $classes]) }}>
    @isset($icon)
        @svg($icon, 'w-6 h-6 pr-1 inline')
    @endisset
{{ $slot }}
    @if($badge != 0)
    <x-e::tag type="{{ $badge_style }}">{{ $badge }}</x-e::tag>
    @endif
</a>