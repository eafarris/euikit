@props(['type' => 'info', 'title' => '', 'icon' => ''])
@php
    switch($type) {
        case 'warning':
        case 'error':
            $icon = $icon == 'none' ? '' : 'heroicon-o-exclamation-circle';
            break;
        case 'success':
            $icon = $icon == 'none' ? '' : 'heroicon-o-check-circle';
            break;
        default:
            $icon = $icon == 'none' ? '' : $icon;
            break;
    }

$coloring = '';
if ($type) {
    switch ($type) {
        case 'warning':
            $topcoloring = 'bg-yellow-200 border-yellow-400';
            $bottomcoloring = 'bg-yellow-50 border-yellow-400';
            $textcoloring = 'text-yellow-500';
            break;
        case 'success':
            $topcoloring = 'bg-green-200 border-green-400';
            $bottomcoloring = 'bg-green-50 border-green-400';
            $textcoloring = 'text-green-500';
            break;
        case 'error':
            $topcoloring = 'bg-red-200 border-red-400';
            $bottomcoloring = 'bg-red-50 border-red-400';
            $textcoloring = 'text-red-500';
            break;
        case 'primary':
            $topcoloring = 'bg-blue-200 border-blue-400';
            $bottomcoloring = 'bg-blue-50 border-blue-400';
            $textcoloring = 'text-blue-500';
            break;
        case 'info':
            $topcoloring = 'bg-slate-200 border-slate-400';
            $bottomcoloring = 'bg-slate-50 border-slate-400';
            $textcoloring = 'text-slate-500';
            break;
    }
}
@endphp
<div {{ $attributes->merge(['class' => 'bg-transparent'])}}>
@if ($title)
    <div class="p-4 rounded-t-xl border {{ $topcoloring }}">
        <p class="{{ $textcoloring }} font-bold tracking-wide">
        @if ($icon)
            <span>
                @svg($icon, 'w-8 h-8 inline')
            </span>
        @endif
            <span class="align-text-top">
                {{ $title }}
            </span>
        </p>
    </div>
@endif
    <div @class([
        'p-4 rounded-t-xl border-t' => !$title,
        'pl-4 pb-4 pt-2 rounded-b-xl border-b border-l border-r ' . $bottomcoloring,
        ])
    >
        <p class="mt-1 font-normal align-text-top {{ $textcoloring }}">
            {{ $slot }}
        </p>
    </div>
</div><!-- EUIKit Message Component -->