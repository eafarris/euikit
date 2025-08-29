@props(['type' => 'info', 'title' => '', 'icon' => '', 'route' => ''])
@php
    $button = 'p-2 first:rounded-l-md last:rounded-r-md relative inline-flex items-center bg-slate-300 dark:bg-slate-500 text-slate-500 dark:text-slate-300 transition hover:scale-y-110';
    switch($type) {
        case 'light':
            $hovercoloring = 'hover:bg-slate-200 hover:text-slate-600';
            break;
        case 'dark':
            $hovercoloring = 'hover:bg-slate-800 hover:text-slate-200';
            break;
        case 'link':
            $hovercoloring = 'hover:bg-blue-200 hover:text-slate-800';
            break;
        case 'info':
            $hovercoloring = 'hover:bg-slate-600 hover:text-white';
            break;
        case 'success':
            $hovercoloring = 'hover:bg-green-600 hover:text-white';
            break;
        case 'warning':
            $hovercoloring = 'hover:bg-yellow-500 hover:text-slate-100';
            break;
        case 'danger':
        case 'delete':
        case 'error':
            $hovercoloring = 'hover:bg-red-500 hover:text-slate-100';
            break;
        case 'primary':
            $hovercoloring = 'hover:bg-blue-400 hover:text-slate-100';
            break;
        case 'ghost':
            $hovercoloring = 'hover:bg-slate-100 hover:text-slate-400';
            break;

// TAILWIND PALETTE

    case 'red':
        $hovercoloring = 'hover:bg-red-600 hover:text-white';
        break;
    case 'orange':
        $hovercoloring = 'hover:bg-orange-600 hover:text-white';
        break;
    case 'amber':
        $hovercoloring = 'hover:bg-amber-600 hover:text-white';
        break;
    case 'yellow':
        $hovercoloring = 'hover:bg-yellow-600 hover:text-white';
        break;
    case 'lime':
        $hovercoloring = 'hover:bg-lime-600 hover:text-white';
        break;
    case 'green':
        $hovercoloring = 'hover:bg-green-600 hover:text-white';
        break;
    case 'emerald':
        $hovercoloring = 'hover:bg-emerald-600 hover:text-white';
        break;
    case 'teal':
        $hovercoloring = 'hover:bg-teal-600 hover:text-white';
        break;
    case 'cyan':
        $hovercoloring = 'hover:bg-cyan-600 hover:text-white';
        break;
    case 'sky':
        $hovercoloring = 'hover:bg-sky-600 hover:text-white';
        break;
    case 'blue':
        $hovercoloring = 'hover:bg-blue-600 hover:text-white';
        break;
    case 'indigo':
        $hovercoloring = 'hover:bg-indigo-600 hover:text-white';
        break;
    case 'violet':
        $hovercoloring = 'hover:bg-violet-600 hover:text-white';
        break;
    case 'purple':
        $hovercoloring = 'hover:bg-purple-600 hover:text-white';
        break;
    case 'fuchsia':
        $hovercoloring = 'hover:bg-fuchsia-600 hover:text-white';
        break;
    case 'pink':
        $hovercoloring = 'hover:bg-pink-600 hover:text-white';
        break;
    case 'rose':
        $hovercoloring = 'hover:bg-rose-600 hover:text-white';
        break;
    case 'slate':
        $hovercoloring = 'hover:bg-slate-600 hover:text-white';
        break;
    case 'gray':
        $hovercoloring = 'hover:bg-gray-600 hover:text-white';
        break;
    case 'zinc':
        $hovercoloring = 'hover:bg-zinc-600 hover:text-white';
        break;
    case 'neutral':
        $hovercoloring = 'hover:bg-neutral-600 hover:text-white';
        break;
    case 'stone':
        $hovercoloring = 'hover:bg-stone-600 hover:text-white';
        break;

// EXTENDED PALETTE

    case 'plum':
        $hovercoloring = 'hover:bg-plum-600 hover:text-white';
        break;
    case 'mulberry':
        $hovercoloring = 'hover:bg-mulberry-600 hover:text-white';
        break;
    case 'coral':
        $hovercoloring = 'hover:bg-coral-600 hover:text-white';
        break;
    case 'tangerine':
        $hovercoloring = 'hover:bg-tangerine-600 hover:text-white';
        break;
    case 'sunflower':
        $hovercoloring = 'hover:bg-sunflower-600 hover:text-white';
        break;
    case 'grass':
        $hovercoloring = 'hover:bg-grass-600 hover:text-white';
        break;
    case 'jade':
        $hovercoloring = 'hover:bg-jade-600 hover:text-white';
        break;
    case 'turquoise':
        $hovercoloring = 'hover:bg-turquoise-600 hover:text-white';
        break;
    case 'electric':
        $hovercoloring = 'hover:bg-electric-600 hover:text-white';
        break;
    case 'cerulean':
        $hovercoloring = 'hover:bg-cerulean-600 hover:text-white';
        break;
    case 'sapphire':
        $hovercoloring = 'hover:bg-sapphire-600 hover:text-white';
        break;
    case 'amethyst':
        $hovercoloring = 'hover:bg-amethyst-600 hover:text-white';
        break;

        default:
            $hovercoloring = 'hover:bg-slate-600 hover:text-white';
            break;
    } // endswitch colors
@endphp
@if ($route)
<a {{ $attributes->merge(['class' => $button . ' ' . $hovercoloring]) }} href="{{ $route }}" title="{{ $title }}">
@else
<button title="{{ $title }}" {{ $attributes->merge(['class' => $button . ' ' . $hovercoloring]) }}>
@endif
    @svg($icon, 'w-4 h-4')
@if ($route)
</a>
@else
</button>
@endif
