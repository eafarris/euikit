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
// EXTENDED PALETTE
    case "plum":
      $coloring = 'bg-plum-100 text-plum-700 border-plum-400 ';
      $coloring .= 'dark:text-plum-300 dark:border-plum-700';
      break;
    case "mulberry":
      $coloring = 'bg-mulberry-100 text-mulberry-700 border-mulberry-400 ';
      $coloring .= 'dark:text-mulberry-300 dark:border-mulberry-700';
      break;
    case "coral":
      $coloring = 'bg-coral-100 text-coral-700 border-coral-400 ';
      $coloring .= 'dark:text-coral-300 dark:border-coral-700';
      break;
    case "tangerine":
      $coloring = 'bg-tangerine-100 text-tangerine-700 border-tangerine-400 ';
      $coloring .= 'dark:text-tangerine-300 dark:border-tangerine-700';
      break;
    case "sunflower":
      $coloring = 'bg-sunflower-100 text-sunflower-700 border-sunflower-500 ';
      $coloring .= 'dark:text-sunflower-300 dark:border-sunflower-700';
      break;
    case "grass":
      $coloring = 'bg-grass-100 text-grass-700 border-grass-400 ';
      $coloring .= 'dark:text-grass-300 dark:border-grass-700';
      break;
    case "jade":
      $coloring = 'bg-jade-100 text-jade-700 border-jade-400 ';
      $coloring .= 'dark:text-jade-300 dark:border-jade-700';
      break;
    case "turquoise":
      $coloring = 'bg-turquoise-100 text-turquoise-700 border-turquoise-400 ';
      $coloring .= 'dark:text-turquoise-300 dark:border-turquoise-700';
      break;
    case "electric":
      $coloring = 'bg-electric-100 text-electric-700 border-electric-400 ';
      $coloring .= 'dark:text-electric-300 dark:border-electric-700';
      break;
    case "cerulean":
      $coloring = 'bg-cerulean-100 text-cerulean-700 border-cerulean-400 ';
      $coloring .= 'dark:text-cerulean-300 dark:border-cerulean-700';
      break;
    case "sapphire":
      $coloring = 'bg-sapphire-100 text-sapphire-700 border-sapphire-400 ';
      $coloring .= 'dark:text-sapphire-300 dark:border-sapphire-700';
      break;
    case "amethyst":
      $coloring = 'bg-amethyst-100 text-amethyst-700 border-amethyst-400 ';
      $coloring .= 'dark:text-amethyst-300 dark:border-amethyst-700';
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
    'border-rounded-xs border-2' => $border,
    $coloring,
])
href="{{ $route }}"
>
@else
<span {{ $attributes->class([
    'inline-flex' => $inline,
    'flex' => !$inline,
    'gap-1 grow-0 shrink w-fit items-center px-1 py-1 text-sm rounded',
    'border-rounded-xs border-2' => $border,
    $coloring,
]) }} >
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
