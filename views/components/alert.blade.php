@props(['type' => 'info', 'icon' => ''])

@php
switch ($type) {
    case 'warning':
        $color = 'yellow';
        $icon = $icon == 'none' ? '' : 'heroicon-o-exclamation-circle';
        break;
    case 'success':
        $color = 'green';
        $icon = $icon == 'none' ? '' : 'heroicon-o-check-circle';
        break;
    case 'error':
        $color = 'red';
        $icon = $icon == 'none' ? '' : 'heroicon-o-exclamation-circle';
        break;
    case 'primary':
        $color = 'blue';
        $icon = $icon == 'none' ? '' : $icon;
        break;
    default:
        $color = 'slate';
        $icon = $icon == 'none' ? '' : $icon;
        break;
    }

$accent = "border-$color-400";
$background = "bg-$color-50";
$border = "border-$color-200";
$text = "text-$color-700";
@endphp

<div class="flex gap-4 items-center m-8 rounded-md shadow p-4 border {{ $border }} border-t-4 {{ $accent }} {{ $background }}">
    <div class="shrink-1 {{ $text }}">
      @if ($icon)
        @svg($icon, 'w-8 h-8')
      @endif
    </div>
    <p class="text-sm {{ $text }} ">
        {{ $slot }}
    </p>
</div><!-- EUIKit Alert Component -->
