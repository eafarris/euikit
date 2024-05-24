@props(['type' => 'info', 'inline' => FALSE, 'lefticon' => '', 'righticon' => '', 'border' => FALSE,
])
@php
$coloring = '';
switch ($type) {
    case 'light':
      $coloring = 'bg-slate-100 text-slate-400 border-slate-300';
      break;
    case 'dark':
      $coloring = 'bg-slate-500 text-slate-100 border-slate-600';
      break;
    case 'link':
      $coloring = 'bg-transparent text-blue-600 border-blue-400 underline underline-offset-2';
      break;
    case 'info':
      $coloring = 'bg-slate-100 text-slate-700 border-slate-400';
      break;
    case 'success':
    case 'green':
      $coloring = 'bg-green-100 text-green-700 border-green-500';
      break;
    case 'warning':
    case 'yellow':
      $coloring = 'bg-yellow-100 text-yellow-700 border-yellow-500';
      break;
    case 'danger':
    case 'delete':
    case 'error':
    case 'red':
      $coloring = 'bg-red-100 text-red-700 border-red-500';
      break;
    case 'primary':
    case 'blue':
      $coloring = 'bg-blue-100 text-blue-700 border-blue-500';
      break;
    case 'ghost':
      $coloring = 'bg-transparent text-slate-400 border-slate-200';
      break;
    default:
        $lefticon = $lefticon == 'none' ? '' : $lefticon;
        break;
  }
@endphp
<span @class([
    'inline-flex' => $inline,
    'flex' => !$inline,
    'gap-1 grow-0 shrink w-fit items-center px-1 py-1 text-sm rounded',
    'border-rounded-sm border-2' => $border,
    $coloring,
])>
    @if ($lefticon)
        @svg($lefticon, 'w-4 h-4')
    @endif
    {{ $slot }}
    @if ($righticon)
        @svg($righticon, 'w-4 h-4')
    @endif
</span>
