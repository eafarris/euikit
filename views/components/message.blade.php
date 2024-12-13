@props(['type' => 'info', 'inline' => FALSE, 'border' => FALSE,
    'route' => '',
    'lefticon' => '', 'righticon' => '',
])
@php
$coloring = '';
switch ($type) {
    case 'light':
      $coloring = 'bg-slate-100 text-slate-400 border-slate-300 ';
      $coloring .= 'dark:bg-slate-300 dark:text-slate-600 dark:border-slate-600';
      break;
    case 'dark':
      $coloring = 'bg-slate-500 text-slate-100 border-slate-600 ';
      $coloring .= 'dark:bg-slate-700 dark:text-slate-300 dark:border-slate-800';
      break;
    case 'link':
      $coloring = 'bg-transparent text-blue-600 border-blue-400 underline underline-offset-2 ';
      $coloring .= 'dark:text-slate-400 dark:text-blue-400 dark:border-transparent';
      break;
    case 'info':
      $coloring = 'bg-slate-100 text-slate-700 border-slate-400 ';
      $coloring .= 'dark:bg-slate-700 dark:text-slate-100 dark:border-slate-800';
      break;
    case 'success':
    case 'green':
      $coloring = 'bg-green-100 text-green-700 border-green-500 ';
      $coloring .= 'dark:bg-green-800 dark:text-green-100 dark:border-green-900';
      break;
    case 'warning':
    case 'yellow':
      $coloring = 'bg-yellow-100 text-yellow-700 border-yellow-500 ';
      $coloring .= 'dark:bg-yellow-800 dark:text-yellow-100 dark:border-yellow-900';
      break;
    case 'danger':
    case 'delete':
    case 'error':
    case 'red':
      $coloring = 'bg-red-100 text-red-700 border-red-500 ';
      $coloring .= 'dark:bg-red-800 dark:text-red-100 dark:border-red-900';
      break;
    case 'primary':
    case 'blue':
      $coloring = 'bg-blue-100 text-blue-700 border-blue-500 ';
      $coloring .= 'dark:bg-blue-800 dark:text-blue-100 dark:border-blue-900';
      break;
    case 'ghost':
      $coloring = 'bg-transparent text-slate-400 border-slate-200 ';
      $coloring .= 'dark:text-slate-300 dark:border-slate-700';
      break;
    default:
        $lefticon = $lefticon == 'none' ? '' : $lefticon;
        break;
  }
@endphp
@if ($route)
<a @class([
    'inline-flex' => $inline,
    'flex' => !$inline,
    'gap-1 grow-0 shrink w-fit items-center px-1 py-1 text-sm rounded',
    'border-rounded-sm border-2' => $border,
    $coloring,
])
href="{{ $route }}"
>
@else
<span @class([
    'inline-flex' => $inline,
    'flex' => !$inline,
    'gap-1 grow-0 shrink w-fit items-center px-1 py-1 text-sm rounded',
    'border-rounded-sm border-2' => $border,
    $coloring,
])>
@endif
    @if ($lefticon)
        @svg($lefticon, 'w-4 h-4')
    @endif
    {{ $slot }}
    @if ($righticon)
        @svg($righticon, 'w-4 h-4')
    @endif
@if ($route)
</a>
@else
</span>
@endif
