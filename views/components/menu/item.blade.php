@props(['route', 'icon' => '', 'badge' => '', 'badgeStyle' => ''])
@php
    // Laravel's URL() function never takes hashes into account
    $part_of_url = \Str::before(url()->current(), '#') == \Str::before($route, '#') ||
        url()->current() === url($route);
@endphp
<a href="{{ $route }}"
    @class([
        'shrink-1 flex items-center p-2 pr-0 text-slate-500 dark:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-700 hover:rounded-tl-lg hover:rounded-bl-lg',
        'dark:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-700 hover:rounded-tl-lg hover:roundedl-bl-lg' => !$part_of_url,
        'bg-slate-50 dark:text-slate-300 dark:bg-slate-800' => $part_of_url,
    ])
>
    @if($icon)
        @svg($icon, 'w-6 h-6 pr-1 inline')
    @endif
{{ $slot }}
    @isset($badge)
        @unless($badge == '' || $badge == 0)
        <x-e::tag type="{{ $badgeStyle }}">{{ $badge }}</x-e::tag>
        @endunless
    @endisset
</a>
