@props(['type' => 'info', 'icon' => ''])

@php
switch ($type) {
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

$alert = 'border border-t-4 flex gap-4 items-center rounded-md shadow p-4';
$coloring = '';
if ($type) {
    switch ($type) {
        case 'warning':
            $coloring = 'bg-yellow-50 border-yellow-200 border-t-yellow-400 text-yellow-700';
            $iconcolor = 'text-yellow-500';
            break;
        case 'success':
            $coloring = 'bg-green-50 border-green-200 border-t-green-400 text-green-700';
            $iconcolor = 'text-green-500';
            break;
        case 'error':
            $coloring = 'bg-red-50 border-red-200 border-t-red-400 text-red-700';
            $iconcolor = 'text-red-500';
            break;
        case 'primary':
            $coloring = 'bg-blue-50 border-blue-200 border-t-blue-400 text-blue-700';
            $iconcolor = 'text-blue-500';
            break;
        case 'info':
            $coloring = 'bg-slate-50 border-slate-200 border-t-slate-400 text-slate-700';
            $iconcolor = 'text-slate-500';
            break;
    }
}

@endphp

<div {{ $attributes->merge(['class' => $alert . ' ' . $coloring]) }}>
    <div class="shrink-1">
        @if ($icon)
            @svg($icon, 'w-8 h-8 inline ' . $iconcolor)
        @endif
    </div>
    <p class="text-sm">
        {{ $slot }}
    </p>
</div><!-- EUIKit Alert Component -->
