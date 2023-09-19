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

@endphp

{{-- Yeah, this is not optimal. But the colors need to be hard-coded for vite to pick them up. --}}
<div @class([
    'bg-yellow-50 border-yellow-200 border-t-yellow-400 text-yellow-700' => $type == 'warning',

    'bg-green-50 border-green-200 border-t-green-400 text-green-700' => $type == 'success',

    'bg-red-50 border-red-200 border-t-red-400 text-red-700' => $type == 'error',

    'bg-blue-50 border-blue-200 border-t-blue-400 text-blue-700' => $type == 'primary',

    'bg-slate-50 border-slate-200 border-t-slate-400 text-slate-700' => $type == 'info',

    'border border-t-4 flex gap-4 items-center m-8 rounded-md shadow p-4'
])>

    <div class="shrink-1">
        @if ($icon)
            @svg($icon, 'w-8 h-8')
        @endif
    </div>
    <p class="text-sm">
        {{ $slot }}
    </p>
</div><!-- EUIKit Alert Component -->
