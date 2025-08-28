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
      $iconcolor = 'text-blue-500 dark:text-blue-100';
      break;
    case 'ghost':
      $coloring = 'bg-transparent text-slate-400 border-none shadow-none ';
      $coloring .= 'dark:text-slate-300';
      $iconcolor = 'text-slate-400 dark:text-slate-700';
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
      $iconcolor = 'text-sunflower-500 dark:text-sunflower-100';
      break;
    case 'lime':
      $coloring = 'bg-lime-50 border-lime-200 border-t-lime-400 text-lime-700 ';
      $coloring .= 'dark:bg-lime-800 dark:border-lime-300 dark:border-t-lime-100 dark:text-lime-100';
      $iconcolor = 'text-lime-500 dark:text-lime-100';
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
    case 'cyan':
      $coloring = 'bg-cyan-50 border-cyan-200 border-t-cyan-400 text-cyan-700 ';
      $coloring .= 'dark:bg-cyan-800 dark:border-cyan-300 dark:border-t-cyan-100 dark:text-cyan-100';
      $iconcolor = 'text-cyan-500 dark:text-cyan-100';
      break;
    case 'azure':
      $coloring = 'bg-azure-50 border-azure-200 border-t-azure-400 text-azure-700 ';
      $coloring .= 'dark:bg-azure-800 dark:border-azure-300 dark:border-t-azure-100 dark:text-azure-100';
      $iconcolor = 'text-azure-500 dark:text-azure-100';
      break;
    case 'sapphire':
      $coloring = 'bg-sapphire-50 border-sapphire-200 border-t-sapphire-400 text-sapphire-700 ';
      $coloring .= 'dark:bg-sapphire-800 dark:border-sapphire-300 dark:border-t-sapphire-100 dark:text-sapphire-100';
      $iconcolor = 'text-sapphire-500 dark:text-sapphire-100';
      break;
    case 'indigo':
      $coloring = 'bg-indigo-50 border-indigo-200 border-t-indigo-400 text-indigo-700 ';
      $coloring .= 'dark:bg-indigo-800 dark:border-indigo-300 dark:border-t-indigo-100 dark:text-indigo-100';
      $iconcolor = 'text-indigo-500 dark:text-indigo-100';
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
