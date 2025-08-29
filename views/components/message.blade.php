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
      $iconcolor = 'text-slate-300 dark:text-slate-600';
      break;
    case 'dark':
      $coloring = 'bg-slate-500 text-slate-100 border-slate-600 ';
      $coloring .= 'dark:bg-slate-700 dark:text-slate-300 dark:border-slate-800';
      $iconcolor = 'text-slate-400 dark:text-slate-300';
      break;
    case 'link':
      $coloring = 'bg-transparent text-blue-600 border-blue-400 underline underline-offset-2 ';
      $coloring .= 'dark:text-slate-400 dark:text-blue-400 dark:border-transparent';
      $iconcolor = 'text-blue-400 dark:text-blue-100';
      break;
    case 'info':
      $coloring = 'bg-slate-100 text-slate-700 border-slate-400 ';
      $coloring .= 'dark:bg-slate-700 dark:text-slate-100 dark:border-slate-800';
      $iconcolor = 'text-slate-500 dark:text-slate-100';
      break;
    case 'success':
      $coloring = 'bg-green-100 text-green-700 border-green-500 ';
      $coloring .= 'dark:bg-green-800 dark:text-green-100 dark:border-green-900';
      $iconcolor = 'text-green-500 dark:text-green-300';
      break;
    case 'warning':
      $coloring = 'bg-yellow-100 text-yellow-700 border-yellow-500 ';
      $coloring .= 'dark:bg-yellow-800 dark:text-yellow-100 dark:border-yellow-900';
      $iconcolor = 'text-yellow-500 dark:text-yellow-300';
      break;
    case 'danger':
    case 'delete':
    case 'error':
      $coloring = 'bg-red-100 text-red-700 border-red-500 ';
      $coloring .= 'dark:bg-red-800 dark:text-red-100 dark:border-red-900';
      $iconcolor = 'text-red-500 dark:text-red-100';
      break;
    case 'primary':
      $coloring = 'bg-blue-100 text-blue-700 border-blue-500 ';
      $coloring .= 'dark:bg-blue-800 dark:text-blue-100 dark:border-blue-900';
      $iconcolor = 'text-blue-500 dark:text-blue-100';
      break;
    case 'ghost':
      $coloring = 'bg-transparent text-slate-400 border-slate-200 ';
      $coloring .= 'dark:text-slate-300 dark:border-slate-700';
      $iconcolor = 'text-slate-400 dark:text-slate-700';
      break;

// TAILWINDCSS PALETTE

    case 'red':
        $coloring = 'bg-red-100 text-red-700 border-red-500 ';
        $coloring .= 'dark:bg-red-800 dark:text-red-100 dark:border-red-900';
      $iconcolor = 'text-red-500 dark:text-red-100';
        break;
    case 'orange':
        $coloring = 'bg-orange-100 text-orange-700 border-orange-500 ';
        $coloring .= 'dark:bg-orange-800 dark:text-orange-100 dark:border-orange-900';
        $iconcolor = 'text-orange-500 dark:text-orange-100';
        break;
    case 'amber':
        $coloring = 'bg-amber-100 text-amber-700 border-amber-500 ';
        $coloring .= 'dark:bg-amber-800 dark:text-amber-100 dark:border-amber-900';
        $iconcolor = 'text-amber-500 dark:text-amber-100';
        break;
    case 'yellow':
        $coloring = 'bg-yellow-100 text-yellow-700 border-yellow-500 ';
        $coloring .= 'dark:bg-yellow-800 dark:text-yellow-100 dark:border-yellow-900';
        $iconcolor = 'text-yellow-500 dark:text-yellow-300';
        break;
    case 'lime':
        $coloring = 'bg-lime-100 text-lime-700 border-lime-500 ';
        $coloring .= 'dark:bg-lime-800 dark:text-lime-100 dark:border-lime-900';
        $iconcolor = 'text-lime-500 dark:text-lime-100';
        break;
    case 'green':
        $coloring = 'bg-green-100 text-green-700 border-green-500 ';
        $coloring .= 'dark:bg-green-800 dark:text-green-100 dark:border-green-900';
        $iconcolor = 'text-green-500 dark:text-green-300';
        break;
    case 'emerald':
        $coloring = 'bg-emerald-100 text-emerald-700 border-emerald-500 ';
        $coloring .= 'dark:bg-emerald-800 dark:text-emerald-100 dark:border-emerald-900';
        $iconcolor = 'text-emerald-500 dark:text-emerald-100';
        break;
    case 'teal':
        $coloring = 'bg-teal-100 text-teal-700 border-teal-500 ';
        $coloring .= 'dark:bg-teal-800 dark:text-teal-100 dark:border-teal-900';
        $iconcolor = 'text-teal-500 dark:text-teal-100';
        break;
    case 'cyan':
        $coloring = 'bg-cyan-100 text-cyan-700 border-cyan-500 ';
        $coloring .= 'dark:bg-cyan-800 dark:text-cyan-100 dark:border-cyan-900';
        $iconcolor = 'text-cyan-500 dark:text-cyan-100';
        break;
    case 'sky':
        $coloring = 'bg-sky-100 text-sky-700 border-sky-500 ';
        $coloring .= 'dark:bg-sky-800 dark:text-sky-100 dark:border-sky-900';
        $iconcolor = 'text-sky-500 dark:text-sky-100';
        break;
    case 'blue':
        $coloring = 'bg-blue-100 text-blue-700 border-blue-500 ';
        $coloring .= 'dark:bg-blue-800 dark:text-blue-100 dark:border-blue-900';
        $iconcolor = 'text-blue-500 dark:text-blue-100';
        break;
    case 'indigo':
        $coloring = 'bg-indigo-100 text-indigo-700 border-indigo-500 ';
        $coloring .= 'dark:bg-indigo-800 dark:text-indigo-100 dark:border-indigo-900';
        $iconcolor = 'text-indigo-500 dark:text-indigo-100';
        break;
    case 'violet':
        $coloring = 'bg-violet-100 text-violet-700 border-violet-500 ';
        $coloring .= 'dark:bg-violet-800 dark:text-violet-100 dark:border-violet-900';
        $iconcolor = 'text-violet-500 dark:text-violet-100';
        break;
    case 'purple':
        $coloring = 'bg-purple-100 text-purple-700 border-purple-500 ';
        $coloring .= 'dark:bg-purple-800 dark:text-purple-100 dark:border-purple-900';
        $iconcolor = 'text-purple-500 dark:text-purple-100';
        break;
    case 'fuchsia':
        $coloring = 'bg-fuchsia-100 text-fuchsia-700 border-fuchsia-500 ';
        $coloring .= 'dark:bg-fuchsia-800 dark:text-fuchsia-100 dark:border-fuchsia-900';
        $iconcolor = 'text-fuchsia-500 dark:text-fuchsia-100';
        break;
    case 'pink':
        $coloring = 'bg-pink-100 text-pink-700 border-pink-500 ';
        $coloring .= 'dark:bg-pink-800 dark:text-pink-100 dark:border-pink-900';
        $iconcolor = 'text-pink-500 dark:text-pink-100';
        break;
    case 'rose':
        $coloring = 'bg-rose-100 text-rose-700 border-rose-500 ';
        $coloring .= 'dark:bg-rose-800 dark:text-rose-100 dark:border-rose-900';
        $iconcolor = 'text-rose-500 dark:text-rose-100';
        break;
    case 'slate':
        $coloring = 'bg-slate-100 text-slate-700 border-slate-500 ';
        $coloring .= 'dark:bg-slate-800 dark:text-slate-100 dark:border-slate-900';
        $iconcolor = 'text-slate-500 dark:text-slate-100';
        break;
    case 'gray':
        $coloring = 'bg-gray-100 text-gray-700 border-gray-500 ';
        $coloring .= 'dark:bg-gray-800 dark:text-gray-100 dark:border-gray-900';
        $iconcolor = 'text-gray-500 dark:text-gray-100';
        break;
    case 'zinc':
        $coloring = 'bg-zinc-100 text-zinc-700 border-zinc-500 ';
        $coloring .= 'dark:bg-zinc-800 dark:text-zinc-100 dark:border-zinc-900';
        $iconcolor = 'text-zinc-500 dark:text-zinc-100';
        break;
    case 'neutral':
        $coloring = 'bg-neutral-100 text-neutral-700 border-neutral-500 ';
        $coloring .= 'dark:bg-neutral-800 dark:text-neutral-100 dark:border-neutral-900';
        $iconcolor = 'text-neutral-500 dark:text-neutral-100';
        break;
    case 'stone':
        $coloring = 'bg-stone-100 text-stone-700 border-stone-500 ';
        $coloring .= 'dark:bg-stone-800 dark:text-stone-100 dark:border-stone-900';
        $iconcolor = 'text-stone-500 dark:text-stone-100';
        break;

// EXTENDED PALETTE

    case "plum":
      $coloring = 'bg-plum-100 text-plum-700 border-plum-400 ';
      $coloring .= 'dark:text-plum-300 dark:border-plum-700';
      $iconcolor = 'text-plum-500 dark:text-plum-100';
      break;
    case "mulberry":
      $coloring = 'bg-mulberry-100 text-mulberry-700 border-mulberry-400 ';
      $coloring .= 'dark:text-mulberry-300 dark:border-mulberry-700';
      $iconcolor = 'text-mulberry-500 dark:text-mulberry-100';
      break;
    case "coral":
      $coloring = 'bg-coral-100 text-coral-700 border-coral-400 ';
      $coloring .= 'dark:text-coral-300 dark:border-coral-700';
      $iconcolor = 'text-coral-500 dark:text-coral-100';
      break;
    case "tangerine":
      $coloring = 'bg-tangerine-100 text-tangerine-700 border-tangerine-400 ';
      $coloring .= 'dark:text-tangerine-300 dark:border-tangerine-700';
      $iconcolor = 'text-tangerine-500 dark:text-tangerine-100';
      break;
    case "sunflower":
      $coloring = 'bg-sunflower-100 text-sunflower-700 border-sunflower-500 ';
      $coloring .= 'dark:text-sunflower-300 dark:border-sunflower-700';
      $iconcolor = 'text-sunflower-600 dark:text-sunflower-100';
      break;
    case "grass":
      $coloring = 'bg-grass-100 text-grass-700 border-grass-400 ';
      $coloring .= 'dark:text-grass-300 dark:border-grass-700';
      $iconcolor = 'text-grass-500 dark:text-grass-100';
      break;
    case "jade":
      $coloring = 'bg-jade-100 text-jade-700 border-jade-400 ';
      $coloring .= 'dark:text-jade-300 dark:border-jade-700';
      $iconcolor = 'text-jade-500 dark:text-jade-100';
      break;
    case "turquoise":
      $coloring = 'bg-turquoise-100 text-turquoise-700 border-turquoise-400 ';
      $coloring .= 'dark:text-turquoise-300 dark:border-turquoise-700';
      $iconcolor = 'text-turquoise-500 dark:text-turquoise-100';
      break;
    case "electric":
      $coloring = 'bg-electric-100 text-electric-700 border-electric-400 ';
      $coloring .= 'dark:text-electric-300 dark:border-electric-700';
      $iconcolor = 'text-electric-500 dark:text-electric-100';
      break;
    case "cerulean":
      $coloring = 'bg-cerulean-100 text-cerulean-700 border-cerulean-400 ';
      $coloring .= 'dark:text-cerulean-300 dark:border-cerulean-700';
      $iconcolor = 'text-cerulean-500 dark:text-cerulean-100';
      break;
    case "sapphire":
      $coloring = 'bg-sapphire-100 text-sapphire-700 border-sapphire-400 ';
      $coloring .= 'dark:text-sapphire-300 dark:border-sapphire-700';
      $iconcolor = 'text-sapphire-500 dark:text-sapphire-100';
      break;
    case "amethyst":
      $coloring = 'bg-amethyst-100 text-amethyst-700 border-amethyst-400 ';
      $coloring .= 'dark:text-amethyst-300 dark:border-amethyst-700';
      $iconcolor = 'text-amethyst-500 dark:text-amethyst-100';
      break;

    default:
        $lefticon = $lefticon == 'none' ? '' : $lefticon;
        break;
  } // endswitch type
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
        @svg($lefticon, 'w-4 h-4 inline' . $iconcolor)
    @endif
    {{ $slot }}
    @if ($righticon)
        @svg($righticon, 'w-4 h-4 inline' . $iconcolor)
    @endif
@if ($route)
</a>
@else
</span>
@endif
