@props(['type' => 'info'])

@php
// FIXME
// I'd much rather do it this way. But, for postCSS to find these styles, they 
// can't be programmatically assigned — they've got to be in an HTML class attribute. Lame.
// Leaving this code in just in case I can figure out how to do in this much-more-correct fashion.

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
$text = "text-$color-700";

@endphp

@switch($type)
  @case('warning')
    <div class="m-8 rounded-md p-4 border-t-4 border-t-yellow-400 bg-yellow-50">
  @break
  @case('success')
    <div class="m-8 rounded-md p-4 border-t-4 border-t-green-400 bg-green-50">
  @break
  @case('error')
    <div class="m-8 rounded-md p-4 border-t-4 border-t-red-400 bg-red-50">
  @break
  @case('primary')
    <div class="m-8 rounded-md p-4 border-t-4 border-t-blue-400 bg-blue-50">
  @break
  @default
    <div class="m-8 rounded-md p-4 border-t-4 border-t-slate-400 bg-slate-50">
@endswitch

  <div class="flex">
    <div class="flex-shrink-0">
        <!-- icon will go here -->
    </div>
    <div class="ml-3 flex-1 md:flex md:justify-between">
@switch($type)
  @case('warning')
    <p class="text-sm text-yellow-700">
  @break
  @case('success')
    <p class="text-sm text-green-700">
  @break
  @case('error')
    <p class="text-sm text-red-700">
  @break
  @case('primary')
    <p class="text-sm text-blue-700">
  @break
  @default
    <p class="text-sm text-slate-700">
@endswitch
        {{ $slot }}
    </p>
  </div>
</div>
</div><!-- EUIKit Alert Component -->
