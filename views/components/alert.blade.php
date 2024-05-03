@props(['type' => 'info', 'lefticon' => '', 'righticon' => ''])

@php
$alert = 'border border-t-4 flex gap-4 items-center justify-items-center rounded-md shadow p-4';
$coloring = '';
  switch ($type) {
    case 'light':
      $coloring = 'bg-slate-50 border-slate-100 border-t-slate-100 text-slate-500 ';
      $iconcolor = 'text-slate-300';
      break;
    case 'dark':
      $coloring = 'bg-slate-500 border-slate-600 border-t-slate-800 text-slate-200';
      $iconcolor = 'text-slate-100';
      break;
    case 'link':
      $coloring = 'bg-slate-50 border-slate-100 border-t-slate-200 text-blue-600';
      $iconcolor = 'text-blue-400';
      break;
    case 'info':
      $coloring = 'bg-slate-50 border-slate-200 border-t-slate-400 text-slate-700';
      $iconcolor = 'text-slate-500';
      break;
    case 'success':
    case 'green':
      $coloring = 'bg-green-50 border-green-200 border-t-green-400 text-green-700';
      $iconcolor = 'text-green-500';
      $lefticon = $lefticon == 'none' ? '' : 'heroicon-o-check-circle';
      break;
    case 'warning':
    case 'yellow':
      $coloring = 'bg-yellow-50 border-yellow-200 border-t-yellow-400 text-yellow-700';
      $iconcolor = 'text-yellow-500';
      $lefticon = $lefticon == 'none' ? '' : 'heroicon-o-exclamation-triangle';
      break;
    case 'danger':
    case 'delete':
    case 'error':
    case 'red':
      $coloring = 'bg-red-50 border-red-200 border-t-red-400 text-red-700';
      $iconcolor = 'text-red-500';
      $lefticon = $lefticon == 'none' ? '' : 'heroicon-o-exclamation-circle';
      break;
    case 'primary':
    case 'blue':
      $coloring = 'bg-blue-50 border-blue-200 border-t-blue-400 text-blue-700';
      $iconcolor = 'text-blue-500';
      break;
    case 'ghost':
      $coloring = 'bg-transparent text-slate-400 border-none shadow-none';
      $iconcolor = 'text-slate-200';
      break;
    default:
        $lefticon = $lefticon == 'none' ? '' : $icon;
        break;
  }

@endphp

<div {{ $attributes->merge(['class' => $alert . ' ' . $coloring]) }}>
    <div class="">
        @if ($lefticon)
            @svg($lefticon, 'w-8 h-8 inline ' . $iconcolor)
        @endif
    </div>
    <p class="text-sm">
        {{ $slot }}
    </p>
    <div class="w-fit flex grow justify-end">
        @if($righticon)
            @svg($righticon, 'w-8 h-8 inline' . $iconcolor)
        @endif
    </div>
</div><!-- EUIKit Alert Component -->
