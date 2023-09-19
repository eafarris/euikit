@props(['type' => 'info', 'icon' => ''])

@php
// ICONS
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

// COLORS
// yeah, I don't like this either. But I can't use a "$color" variable and expect vite to pick up the colors.
@endphp

<div @class([
    'bg-yellow-50'        => $type == 'warning',
    'border-yellow-200'   => $type == 'warning',
    'border-t-yellow-400' => $type == 'warning',
    'text-yellow-700'     => $type == 'warning',

    'bg-green-50'  => $type == 'success',
    'border-green-200' => $type == 'success',
    'border-t-green-400' => $type == 'success',
    'text-green-700'     => $type == 'success',

    'bg-red-50' => $type == 'error',
    'border-red-200' => $type == 'error',
    'border-t-red-400' => $type == 'error',
    'text-red-700'     => $type == 'error',

    'bg-blue-50' => $type == 'primary',
    'border-blue-200' => $type == 'primary',
    'border-t-blue-400' => $type == 'primary',
    'text-blue-700'     => $type == 'primary',

    'bg-slate-50' => $type == 'info',
    'border-slate-200' => $type == 'info',
    'border-t-slate-400' => $type == 'info',
    'text-slate-700'     => $type == 'info',

    'border', 'border-t-4', 'flex', 'gap-4', 'items-center', 'm-8', 'rounded-md', 'shadow', 'p-4'
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
