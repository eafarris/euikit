@props(['type' => 'info', 'inline' => FALSE, 'lefticon' => '', 'righticon' => '',
])
@php
$coloring = '';
switch ($type) {
    case 'light':
      $coloring = 'bg-slate-100 text-slate-500 ';
      break;
    case 'dark':
      $coloring = 'bg-slate-500 text-slate-100';
      break;
    case 'link':
      $coloring = 'bg-transparent text-blue-600';
      break;
    case 'info':
      $coloring = 'bg-slate-100 text-slate-700';
      break;
    case 'success':
    case 'green':
      $coloring = 'bg-green-100 text-green-700';
      break;
    case 'warning':
    case 'yellow':
      $coloring = 'bg-yellow-100 text-yellow-700';
      break;
    case 'danger':
    case 'delete':
    case 'error':
    case 'red':
      $coloring = 'bg-red-100 text-red-700';
      break;
    case 'primary':
    case 'blue':
      $coloring = 'bg-blue-100 text-blue-700';
      break;
    case 'ghost':
      $coloring = 'bg-transparent text-slate-400';
      break;
    default:
        $lefticon = $lefticon == 'none' ? '' : $icon;
        break;
  }
@endphp
<span @class([
    'inline-flex' => $inline,
    'flex' => !$inline,
    'gap-1 grow-0 shrink w-fit px-1 py-1 text-sm rounded',
    $coloring,
])>
    {{ $slot }}
</span>
