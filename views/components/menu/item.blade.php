@props(['route' => '#', 'icon' => '', 'badge' => '', 'badgeType' => ''])
@php
    // Laravel's URL() function never takes hashes into account
    $part_of_url = \Str::before(url()->current(), '#') == \Str::before($route, '#') ||
        url()->current() === url($route);
@endphp
<a href="{{ $route }}"
    @class(['border-l-2 border-r-0 border-t-2 border-b-2
        rounded-l-lg
        shrink-1 flex items-center p-1 pr-0 pl-0
        text-slate-500 dark:text-slate-200
        hover:bg-slate-200 dark:hover:bg-slate-700 hover:rounded-tl-lg hover:rounded-bl-lg',

        'dark:text-slate-400
        border-transparent
        hover:bg-slate-200 dark:hover:bg-slate-700
        hover:rounded-tl-lg hover:roundedl-bl-lg' => !$part_of_url,

        'border-l-2 border-r-0 border-t-2 border-b-2
        border-slate-100
        bg-gradient-to-r from-white to-slate-50 to-90%
        dark:from-slate-700 dark:to-slate-800 dark:to-90%
        dark:border-slate-800 dark:text-slate-300' => $part_of_url,
    ])
>
    @if($icon)
        @svg($icon, 'w-6 h-6 pr-1 inline')
    @else
        <div class="w-6 h-6 pr-1"></div>
    @endif
{{ $slot }}
    @isset($badge)
        @unless($badge == '' || $badge == 0)
        <x-e::tag type="{{ $badgeType }}">{{ $badge }}</x-e::tag>
        @endunless
    @endisset
</a>
