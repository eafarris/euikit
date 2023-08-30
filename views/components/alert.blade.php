@props(['type' => 'info'])

@php
switch ($type) {
    case 'warning':
        $color = 'yellow';
        break;
    case 'success':
        $color = 'green';
        break;
    case 'error':
        $color = 'red';
        break;
    case 'primary':
        $color = 'blue';
        break;
    default:
        $color = 'slate';
        break;
    }

$accent = "border-$color-400";
$background = "bg-$color-50";
$border = "border-$color-200";
$text = "text-$color-700";
@endphp

<div class="m-8 rounded-md shadow p-4 border {{ $border }} border-t-4 {{ $accent }} {{ $background }}">
    <div class="flex-shrink-0">
        <!-- icon will go here -->
    </div>
    <div class="ml-3 flex-1 md:flex md:justify-between">
    <p class="text-sm {{ $text }}">
        {{ $slot }}
    </p>
  </div>
</div><!-- EUIKit Alert Component -->
