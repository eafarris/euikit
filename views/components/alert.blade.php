@props(['type' => 'info', 'lefticon' => '', 'righticon' => ''])

@php
$alert = 'border border-t-4 rounded-md shadow p-4 flex gap-4 items-center justify-items-center';
$coloring = '';
  switch ($type) {
    case 'light':
      $coloring = 'bg-slate-50 border-slate-100 border-t-slate-100 text-slate-500 ';
      $coloring .= 'dark:bg-slate-300 dark:text-slate-600 dark:hover:bg-slate-400';
      $iconcolor = 'text-slate-300 dark:text-slate-600';
      break;
    case 'dark':
      $coloring = 'bg-slate-500 border-slate-600 border-t-slate-800 text-slate-200 ';
      $coloring .= 'dark:bg-slate-700 dark:test-slate-300 dark:hover:bg-slate-600';
      $iconcolor = 'text-slate-100 dark:text-slate-300';
      break;
    case 'link':
      $coloring = 'bg-slate-50 border-slate-100 border-t-slate-200 text-blue-600 ';
      $coloring .= 'dark:text-slate-800 dark:text-blue-400 dark:hover:bg-blue-200';
      $iconcolor = 'text-blue-400';
      break;
    case 'info':
      $coloring = 'bg-slate-50 border-slate-200 border-t-slate-400 text-slate-500 ';
      $coloring .= 'dark:bg-slate-800 dark:border-slate-400 dark:border-t-slate-300 dark:text-slate-100';
      $iconcolor = 'text-slate-100';
      break;
    case 'success':
    case 'green':
      $coloring = 'bg-green-50 border-green-200 border-t-green-400 text-green-700 ';
      $coloring .= 'dark:bg-green-800 dark:border-green-300 dark:border-t-green-100 dark:text-green-100';
      $iconcolor = 'text-green-500 dark:text-green-300';
      $lefticon = $lefticon == 'none' ? '' : ($lefticon ?: 'heroicon-o-check-circle');
      break;
    case 'warning':
    case 'yellow':
      $coloring = 'bg-yellow-50 border-yellow-200 border-t-yellow-400 text-yellow-700 ';
      $coloring .= 'dark:bg-yellow-800 dark:border-yellow-300 dark:border-t-yellow-100 dark:text-yellow-100';
      $iconcolor = 'text-yellow-500 dark:text-yellow-300';
      $lefticon = $lefticon == 'none' ? '' : ($lefticon ?: 'heroicon-o-exclamation-triangle');
      break;
    case 'danger':
    case 'delete':
    case 'error':
    case 'red':
      $coloring = 'bg-red-50 border-red-200 border-t-red-400 text-red-700 ';
      $coloring .= 'dark:bg-red-800 dark:border-red-300 dark:border-t-red-100 dark:text-red-100';
      $iconcolor = 'text-red-500 dark:text-red-100';
      $lefticon = $lefticon == 'none' ? '' : ($lefticon ?: 'heroicon-o-exclamation-circle');
      break;
    case 'primary':
    case 'blue':
      $coloring = 'bg-blue-50 border-blue-200 border-t-blue-400 text-blue-700 ';
      $coloring .= 'dark:bg-blue-800 dark:border-blue-300 dark:border-t-blue-100 dark:text-blue-100';
      $iconcolor = 'text-blue-100';
      break;
    case 'ghost':
      $coloring = 'bg-transparent text-slate-400 border-none shadow-none ';
      $coloring .= 'dark:text-slate-300';
      $iconcolor = 'text-slate-400 dark:text-slate-700';
      break;
    default:
        $lefticon = $lefticon == 'none' ? '' : $lefticon;
        break;
  }

@endphp

<div {{ $attributes->merge(['class' => $alert . ' ' . $coloring]) }}>
    <div class="flex flex-none">
        @if ($lefticon)
            @svg($lefticon, 'w-8 h-8 inline ' . $iconcolor)
        @endif
    </div>
    <p class="">
        {{ $slot }}
    </p>
    <div class="w-fit flex grow justify-end">
        @if($righticon)
            @svg($righticon, 'w-8 h-8 inline ' . $iconcolor)
        @endif
    </div>
</div><!-- EUIKit Alert Component -->
