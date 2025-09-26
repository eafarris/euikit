@props(['type' => 'info', 'lefticon' => '', 'righticon' => ''])

@php
$alert = 'border border-t-4 rounded-md shadow-sm p-4 flex gap-4 items-center justify-items-center';
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
      $iconcolor = 'text-slate-400 dark:text-slate-300';
      break;
    case 'link':
      $coloring = 'bg-slate-50 border-slate-100 border-t-slate-200 text-blue-600 ';
      $coloring .= 'dark:text-slate-800 dark:text-blue-400 dark:hover:bg-blue-200';
      $iconcolor = 'text-blue-400 dark:text-blue-100';
      break;
    case 'info':
      $coloring = 'bg-slate-50 border-slate-200 border-t-slate-400 text-slate-500 ';
      $coloring .= 'dark:bg-slate-800 dark:border-slate-400 dark:border-t-slate-300 dark:text-slate-100';
      $iconcolor = 'text-slate-500 dark:text-slate-100';
      break;
    case 'success':
      $coloring = 'bg-green-50 border-green-200 border-t-green-400 text-green-700 ';
      $coloring .= 'dark:bg-green-800 dark:border-green-300 dark:border-t-green-100 dark:text-green-100';
      $iconcolor = 'text-green-500 dark:text-green-300';
      $lefticon = $lefticon == 'none' ? '' : ($lefticon ?: 'heroicon-o-check-circle');
      break;
    case 'warning':
      $coloring = 'bg-yellow-50 border-yellow-200 border-t-yellow-400 text-yellow-700 ';
      $coloring .= 'dark:bg-yellow-800 dark:border-yellow-300 dark:border-t-yellow-100 dark:text-yellow-100';
      $iconcolor = 'text-yellow-500 dark:text-yellow-300';
      $lefticon = $lefticon == 'none' ? '' : ($lefticon ?: 'heroicon-o-exclamation-triangle');
      break;
    case 'danger':
    case 'delete':
    case 'error':
      $coloring = 'bg-red-50 border-red-200 border-t-red-400 text-red-700 ';
      $coloring .= 'dark:bg-red-800 dark:border-red-300 dark:border-t-red-100 dark:text-red-100';
      $iconcolor = 'text-red-500 dark:text-red-100';
      $lefticon = $lefticon == 'none' ? '' : ($lefticon ?: 'heroicon-o-exclamation-circle');
      break;
    case 'primary':
      $coloring = 'bg-blue-50 border-blue-200 border-t-blue-400 text-blue-700 ';
      $coloring .= 'dark:bg-blue-800 dark:border-blue-300 dark:border-t-blue-100 dark:text-blue-100';
      $iconcolor = 'text-blue-500 dark:text-blue-100';
      break;
    case 'ghost':
      $coloring = 'bg-transparent text-slate-400 border-none shadow-none ';
      $coloring .= 'dark:text-slate-300';
      $iconcolor = 'text-slate-400 dark:text-slate-700';
      break;

// TAILWINDCSS PALETTE

    case 'red':
      $coloring = 'bg-red-50 border-red-200 border-t-red-400 text-red-700 ';
      $coloring .= 'dark:bg-red-800 dark:border-red-300 dark:border-t-red-100 dark:text-red-100';
      $iconcolor = 'text-red-500 dark:text-red-100';
      break;
    case 'orange':
        $coloring = 'bg-orange-50 border-orange-200 border-t-orange-400 text-orange-700 ';
        $coloring .= 'dark:bg-orange-800 dark:border-orange-300 dark:border-t-orange-100 dark:text-orange-100';
        $iconcolor = 'text-orange-500 dark:text-orange-100';
        break;
    case 'amber':
        $coloring = 'bg-amber-50 border-amber-200 border-t-amber-400 text-amber-700 ';
        $coloring .= 'dark:bg-amber-800 dark:border-amber-300 dark:border-t-amber-100 dark:text-amber-100';
        $iconcolor = 'text-amber-500 dark:text-amber-100';
        break;
    case 'yellow':
        $coloring = 'bg-yellow-50 border-yellow-200 border-t-yellow-400 text-yellow-700 ';
        $coloring .= 'dark:bg-yellow-800 dark:border-yellow-300 dark:border-t-yellow-100 dark:text-yellow-100';
        $iconcolor = 'text-yellow-500 dark:text-yellow-300';
      break;
    case 'lime':
        $coloring = 'bg-lime-50 border-lime-200 border-t-lime-400 text-lime-700 ';
        $coloring .= 'dark:bg-lime-800 dark:border-lime-300 dark;border-t-lime-100 dark;text-lime-100';
        $iconcolor = 'text-lime-500 dark:text-lime-100';
        break;
    case 'green':
        $coloring = 'bg-green-50 border-green-200 border-t-green-400 text-green-700 ';
        $coloring .= 'dark:bg-green-800 dark:border-green-300 dark:border-t-green-100 dark:text-green-100';
        $iconcolor = 'text-green-500 dark:text-green-300';
      break;
    case 'emerald':
        $coloring = 'bg-emerald-50 border-emerald-200 border-t-emerald-400 text-emerald-700 ';
        $coloring .= 'dark:bg-emerald-800 dark:border-emerald-300 dark;border-t-emerald-100 dark;text-emerald-100';
        $iconcolor = 'text-emerald-500 dark:text-emerald-100';
        break;
    case 'teal':
        $coloring = 'bg-teal-50 border-teal-200 border-t-teal-400 text-teal-700 ';
        $coloring .= 'dark:bg-teal-800 dark:border-teal-300 dark;border-t-teal-100 dark;text-teal-100';
        $iconcolor = 'text-teal-500 dark:text-teal-100';
        break;
    case 'cyan':
        $coloring = 'bg-cyan-50 border-cyan-200 border-t-cyan-400 text-cyan-700 ';
        $coloring .= 'dark:bg-cyan-800 dark:border-cyan-300 dark;border-t-cyan-100 dark;text-cyan-100';
        $iconcolor = 'text-cyan-500 dark:text-cyan-100';
        break;
    case 'sky':
        $coloring = 'bg-sky-50 border-sky-200 border-t-sky-400 text-sky-700 ';
        $coloring .= 'dark:bg-sky-800 dark:border-sky-300 dark;border-t-sky-100 dark;text-sky-100';
        $iconcolor = 'text-sky-500 dark:text-sky-100';
        break;
    case 'blue':
        $coloring = 'bg-blue-50 border-blue-200 border-t-blue-400 text-blue-700 ';
        $coloring .= 'dark:bg-blue-800 dark:border-blue-300 dark:border-t-blue-100 dark:text-blue-100';
        $iconcolor = 'text-blue-500 dark:text-blue-100';
        break;
    case 'indigo':
        $coloring = 'bg-indigo-50 border-indigo-200 border-t-indigo-400 text-indigo-700 ';
        $coloring .= 'dark:bg-indigo-800 dark:border-indigo-300 dark;border-t-indigo-100 dark;text-indigo-100';
        $iconcolor = 'text-indigo-500 dark:text-indigo-100';
        break;
    case 'violet':
        $coloring = 'bg-violet-50 border-violet-200 border-t-violet-400 text-violet-700 ';
        $coloring .= 'dark:bg-violet-800 dark:border-violet-300 dark;border-t-violet-100 dark;text-violet-100';
        $iconcolor = 'text-violet-500 dark:text-violet-100';
        break;
    case 'purple':
        $coloring = 'bg-purple-50 border-purple-200 border-t-purple-400 text-purple-700 ';
        $coloring .= 'dark:bg-purple-800 dark:border-purple-300 dark;border-t-purple-100 dark;text-purple-100';
        $iconcolor = 'text-purple-500 dark:text-purple-100';
        break;
    case 'fuchsia':
        $coloring = 'bg-fuchsia-50 border-fuchsia-200 border-t-fuchsia-400 text-fuchsia-700 ';
        $coloring .= 'dark:bg-fuchsia-800 dark:border-fuchsia-300 dark;border-t-fuchsia-100 dark;text-fuchsia-100';
        $iconcolor = 'text-fuchsia-500 dark:text-fuchsia-100';
        break;
    case 'pink':
        $coloring = 'bg-pink-50 border-pink-200 border-t-pink-400 text-pink-700 ';
        $coloring .= 'dark:bg-pink-800 dark:border-pink-300 dark;border-t-pink-100 dark;text-pink-100';
        $iconcolor = 'text-pink-500 dark:text-pink-100';
        break;
    case 'rose':
        $coloring = 'bg-rose-50 border-rose-200 border-t-rose-400 text-rose-700 ';
        $coloring .= 'dark:bg-rose-800 dark:border-rose-300 dark;border-t-rose-100 dark;text-rose-100';
        $iconcolor = 'text-rose-500 dark:text-rose-100';
        break;
    case 'slate':
        $coloring = 'bg-slate-50 border-slate-200 border-t-slate-400 text-slate-700 ';
        $coloring .= 'dark:bg-slate-800 dark:border-slate-300 dark;border-t-slate-100 dark;text-slate-100';
        $iconcolor = 'text-slate-500 dark:text-slate-100';
        break;
    case 'gray':
        $coloring = 'bg-gray-50 border-gray-200 border-t-gray-400 text-gray-700 ';
        $coloring .= 'dark:bg-gray-800 dark:border-gray-300 dark;border-t-gray-100 dark;text-gray-100';
        $iconcolor = 'text-gray-500 dark:text-gray-100';
        break;
    case 'zinc':
        $coloring = 'bg-zinc-50 border-zinc-200 border-t-zinc-400 text-zinc-700 ';
        $coloring .= 'dark:bg-zinc-800 dark:border-zinc-300 dark;border-t-zinc-100 dark;text-zinc-100';
        $iconcolor = 'text-zinc-500 dark:text-zinc-100';
        break;
    case 'neutral':
        $coloring = 'bg-neutral-50 border-neutral-200 border-t-neutral-400 text-neutral-700 ';
        $coloring .= 'dark:bg-neutral-800 dark:border-neutral-300 dark;border-t-neutral-100 dark;text-neutral-100';
        $iconcolor = 'text-neutral-500 dark:text-neutral-100';
        break;
    case 'stone':
        $coloring = 'bg-stone-50 border-stone-200 border-t-stone-400 text-stone-700 ';
        $coloring .= 'dark:bg-stone-800 dark:border-stone-300 dark;border-t-stone-100 dark;text-stone-100';
        $iconcolor = 'text-stone-500 dark:text-stone-100';
        break;

// Extended Palette

    case 'plum':
      $coloring = 'bg-plum-50 border-plum-200 border-t-plum-400 text-plum-700 ';
      $coloring .= 'dark:bg-plum-800 dark:border-plum-300 dark:border-t-plum-100 dark:text-plum-100';
      $iconcolor = 'text-plum-500 dark:text-plum-100';
      break;
    case 'mulberry':
      $coloring = 'bg-mulberry-50 border-mulberry-200 border-t-mulberry-400 text-mulberry-700 ';
      $coloring .= 'dark:bg-mulberry-800 dark:border-mulberry-300 dark:border-t-mulberry-100 dark:text-mulberry-100';
      $iconcolor = 'text-mulberry-500 dark:text-mulberry-100';
      break;
    case 'coral':
      $coloring = 'bg-coral-50 border-coral-200 border-t-coral-400 text-coral-700 ';
      $coloring .= 'dark:bg-coral-800 dark:border-coral-300 dark:border-t-coral-100 dark:text-coral-100';
      $iconcolor = 'text-coral-500 dark:text-coral-100';
      break;
    case 'tangerine':
      $coloring = 'bg-tangerine-50 border-tangerine-200 border-t-tangerine-400 text-tangerine-700 ';
      $coloring .= 'dark:bg-tangerine-800 dark:border-tangerine-300 dark:border-t-tangerine-100 dark:text-tangerine-100';
      $iconcolor = 'text-tangerine-500 dark:text-tangerine-100';
      break;
    case 'sunflower':
      $coloring = 'bg-sunflower-50 border-sunflower-200 border-t-sunflower-400 text-sunflower-700 ';
      $coloring .= 'dark:bg-sunflower-800 dark:border-sunflower-300 dark:border-t-sunflower-100 dark:text-sunflower-100';
      $iconcolor = 'text-sunflower-600 dark:text-sunflower-100';
      break;
    case 'grass':
      $coloring = 'bg-grass-50 border-grass-200 border-t-grass-400 text-grass-700 ';
      $coloring .= 'dark:bg-grass-800 dark:border-grass-300 dark:border-t-grass-100 dark:text-grass-100';
      $iconcolor = 'text-grass-500 dark:text-grass-100';
      break;
    case 'jade':
      $coloring = 'bg-jade-50 border-jade-200 border-t-jade-400 text-jade-700 ';
      $coloring .= 'dark:bg-jade-800 dark:border-jade-300 dark:border-t-jade-100 dark:text-jade-100';
      $iconcolor = 'text-jade-500 dark:text-jade-100';
      break;
    case 'turquoise':
      $coloring = 'bg-turquoise-50 border-turquoise-200 border-t-turquoise-400 text-turquoise-700 ';
      $coloring .= 'dark:bg-turquoise-800 dark:border-turquoise-300 dark:border-t-turquoise-100 dark:text-turquoise-100';
      $iconcolor = 'text-turquoise-500 dark:text-turquoise-100';
      break;
    case 'electric':
      $coloring = 'bg-electric-50 border-electric-200 border-t-electric-400 text-electric-700 ';
      $coloring .= 'dark:bg-electric-800 dark:border-electric-300 dark:border-t-electric-100 dark:text-electric-100';
      $iconcolor = 'text-electric-500 dark:text-electric-100';
      break;
    case 'cerulean':
      $coloring = 'bg-cerulean-50 border-cerulean-200 border-t-cerulean-400 text-cerulean-700 ';
      $coloring .= 'dark:bg-cerulean-800 dark:border-cerulean-300 dark:border-t-cerulean-100 dark:text-cerulean-100';
      $iconcolor = 'text-cerulean-500 dark:text-cerulean-100';
      break;
    case 'sapphire':
      $coloring = 'bg-sapphire-50 border-sapphire-200 border-t-sapphire-400 text-sapphire-700 ';
      $coloring .= 'dark:bg-sapphire-800 dark:border-sapphire-300 dark:border-t-sapphire-100 dark:text-sapphire-100';
      $iconcolor = 'text-sapphire-500 dark:text-sapphire-100';
      break;
    case 'amethyst':
      $coloring = 'bg-amethyst-50 border-amethyst-200 border-t-amethyst-400 text-amethyst-700 ';
      $coloring .= 'dark:bg-amethyst-800 dark:border-amethyst-300 dark:border-t-amethyst-100 dark:text-amethyst-100';
      $iconcolor = 'text-amethyst-500 dark:text-amethyst-100';
      break;

    default:
      $coloring = 'bg-slate-50 border-slate-200 border-t-slate-400 text-slate-500 ';
      $coloring .= 'dark:bg-slate-800 dark:border-slate-400 dark:border-t-slate-300 dark:text-slate-100';
      $iconcolor = 'text-slate-500 dark:text-slate-100';
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
