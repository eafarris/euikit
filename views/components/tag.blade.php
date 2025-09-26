@props(['type' => 'info',
    'route' => '',
    'lefticon' => '', 'righticon' => '',
    'color' => '',
])
@php
if ($color) {
    if ($color == 'random') {
        $type = collect(['red', 'orange', 'amber', 'yellow', 'lime', 'green', 'emerald', 'teal', 'cyan', 'sky', 'blue', 'indigo', 'violet', 'purple', 'fuchsia', 'pink', 'rose', 'slate', 'gray', 'zinc', 'neutral', 'stone'])->random();
        $color = '';
    }
    else { // arbitrary hex color specified
        // If an arbitrary color was specified, lighten or darken the text color
        // First, a sanity check on what was passed in
        $hexColor = ltrim($color, '#');

        if (strlen($hexColor) === 3) { // shortcut #xxx notation, expand
            $hexColor = str_repeat(substr($hexColor, 0, 1), 2)
                . str_repeat(substr($hexColor, 1, 1), 2)
                . str_repeat(substr($hexColor, 2, 1), 2);
        } // endif shortcut color notation
        if (strlen($hexColor) !== 6 | ! ctype_xdigit($hexColor)) { // invalid color code
            throw new \InvalidArgumentException('Received ' . $hexColor . ' instead of a 6-digit hexadecimal color code.');
        }
        // Here comes the math
        // Extract RGB components
        $red = hexdec(substr($hexColor, 0, 2));
        $green = hexdec(substr($hexColor, 2, 2));
        $blue = hexdec(substr($hexColor, 4, 2));
        // Normalize to values 0..1
        $nr = $red / 255;
        $ng = $green / 255;
        $nb  = $blue / 255;
        // Calculate Luminance
        $lum = 0.2126 * $nr + 0.7152 * $ng + 0.0722 * $nb;

        $shading = $lum > 0.5 ? 'rgba(0,0,0,0.6);' : 'rgba(255,255,255,0.6)';
    } // endifelse arbitrary color
} // endif color specified
@endphp

@php
    $tag = 'inline-flex gap-1 grow-0 shrink items-center justify-items-center text-xs uppercase font-semibold px-2 py-1 rounded-md mx-1';

    $coloring = '';
    switch ($type) {
        case 'light':
            $coloring = 'bg-slate-100 text-slate-500 ';
            $coloring .= 'dark:bg-slate-300 text-slate-600';
            $iconcolor = 'text-slate-300 dark:text-slate-600';
            break;
        case 'dark':
            $coloring = 'bg-slate-500 text-slate-100 ';
            $coloring .= 'dark:bg-slate-800 dark:text-slate-300';
            $iconcolor = 'text-slate-400 dark:text-slate-300';
            break;
        case 'link':
            $coloring = 'bg-transparent text-blue-600 underline underline-offset-2 ';
            $coloring .= 'dark:text-slate-400';
            $iconcolor = 'text-blue-400 dark:text-blue-100';
            break;
        case 'info':
            $coloring = 'bg-slate-300 text-slate-900 ';
            $coloring .= 'dark:bg-slate-800 dark:text-slate-300';
            $iconcolor = 'text-slate-500 dark:text-slate-100';
            break;
        case 'success':
            $coloring = 'bg-green-300 text-green-900 ';
            $coloring .= 'dark:bg-green-800 dark:text-green-200';
            $iconcolor = 'text-green-500 dark:text-green-300';
            break;
        case 'warning':
            $coloring = 'bg-yellow-300 text-yellow-900 ';
            $coloring .= 'dark:bg-yellow-800 dark:text-yellow-200';
            $iconcolor = 'text-yellow-500 dark:text-yellow-300';
            break;
        case 'danger':
        case 'delete':
        case 'error':
            $coloring = 'bg-red-300 text-red-900 ';
            $coloring .= 'dark:bg-red-800 dark:text-red-200';
            $iconcolor = 'text-red-500 dark:text-red-100';
            break;
        case 'primary':
            $coloring = 'bg-blue-300 text-blue-900 ';
            $coloring .= 'dark:bg-blue-800 dark:text-blue-200';
            $iconcolor = 'text-blue-500 dark:text-blue-100';
            break;
        case 'ghost':
            $coloring = 'bg-transparent text-slate-400 ';
            $coloring .= 'dark:text-slate-200';
            $iconcolor = 'text-slate-400 dark:text-slate-700';
            break;

// TAILWINDCSS PALETTE

        case 'red':
            $coloring = 'bg-red-300 text-red-900 ';
            $coloring .= 'dark:bg-red-800 dark:text-red-200';
            $iconcolor = 'text-red-500 dark:text-red-100';
            break;
        case 'orange':
            $coloring = 'bg-orange-300 text-orange-900 ';
            $coloring .= 'dark:bg-orange-800 dark:text-orange-200';
                $iconcolor = 'text-orange-500 dark:text-orange-100';
            break;
        case 'amber':
            $coloring = 'bg-amber-300 text-amber-900 ';
            $coloring .= 'dark:bg-amber-800 dark:text-amber-200';
                $iconcolor = 'text-amber-500 dark:text-amber-100';
            break;
        case 'yellow':
            $coloring = 'bg-yellow-300 text-yellow-900 ';
            $coloring .= 'dark:bg-yellow-800 dark:text-yellow-200';
                $iconcolor = 'text-yellow-500 dark:text-yellow-300';
            break;
        case 'lime':
            $coloring = 'bg-lime-300 text-lime-900 ';
            $coloring .= 'dark:bg-lime-800 dark:text-lime-200';
                $iconcolor = 'text-lime-500 dark:text-lime-100';
            break;
        case 'green':
            $coloring = 'bg-green-300 text-green-900 ';
            $coloring .= 'dark:bg-green-800 dark:text-green-200';
                $iconcolor = 'text-green-500 dark:text-green-300';
            break;
        case 'emerald':
            $coloring = 'bg-emerald-300 text-emerald-900 ';
            $coloring .= 'dark:bg-emerald-800 dark:text-emerald-200';
                $iconcolor = 'text-emerald-500 dark:text-emerald-100';
            break;
        case 'teal':
            $coloring = 'bg-teal-300 text-teal-900 ';
            $coloring .= 'dark:bg-teal-800 dark:text-teal-200';
                $iconcolor = 'text-teal-500 dark:text-teal-100';
            break;
        case 'cyan':
            $coloring = 'bg-cyan-300 text-cyan-900 ';
            $coloring .= 'dark:bg-cyan-800 dark:text-cyan-200';
                $iconcolor = 'text-cyan-500 dark:text-cyan-100';
            break;
        case 'sky':
            $coloring = 'bg-sky-300 text-sky-900 ';
            $coloring .= 'dark:bg-sky-800 dark:text-sky-200';
                $iconcolor = 'text-sky-500 dark:text-sky-100';
            break;
        case 'blue':
            $coloring = 'bg-blue-300 text-blue-900 ';
            $coloring .= 'dark:bg-blue-800 dark:text-blue-200';
                $iconcolor = 'text-blue-500 dark:text-blue-100';
            break;
        case 'indigo':
            $coloring = 'bg-indigo-300 text-indigo-900 ';
            $coloring .= 'dark:bg-indigo-800 dark:text-indigo-200';
                $iconcolor = 'text-indigo-500 dark:text-indigo-100';
            break;
        case 'violet':
            $coloring = 'bg-violet-300 text-violet-900 ';
            $coloring .= 'dark:bg-violet-800 dark:text-violet-200';
                $iconcolor = 'text-violet-500 dark:text-violet-100';
            break;
        case 'purple':
            $coloring = 'bg-purple-300 text-purple-900 ';
            $coloring .= 'dark:bg-purple-800 dark:text-purple-200';
                $iconcolor = 'text-purple-500 dark:text-purple-100';
            break;
        case 'fuchsia':
            $coloring = 'bg-fuchsia-300 text-fuchsia-900 ';
            $coloring .= 'dark:bg-fuchsia-800 dark:text-fuchsia-200';
                $iconcolor = 'text-fuchsia-500 dark:text-fuchsia-100';
            break;
        case 'pink':
            $coloring = 'bg-pink-300 text-pink-900 ';
            $coloring .= 'dark:bg-pink-800 dark:text-pink-200';
                $iconcolor = 'text-pink-500 dark:text-pink-100';
        case 'rose':
            $coloring = 'bg-rose-300 text-rose-900 ';
            $coloring .= 'dark:bg-rose-800 dark:text-rose-200';
                $iconcolor = 'text-rose-500 dark:text-rose-100';
            break;
        case 'slate':
            $coloring = 'bg-slate-300 text-slate-900 ';
            $coloring .= 'dark:bg-slate-800 dark:text-slate-200';
                $iconcolor = 'text-slate-500 dark:text-slate-100';
            break;
        case 'gray':
            $coloring = 'bg-gray-300 text-gray-900 ';
            $coloring .= 'dark:bg-gray-800 dark:text-gray-200';
                $iconcolor = 'text-gray-500 dark:text-gray-100';
            break;
        case 'zinc':
            $coloring = 'bg-zinc-300 text-zinc-900 ';
            $coloring .= 'dark:bg-zinc-800 dark:text-zinc-200';
                $iconcolor = 'text-zinc-500 dark:text-zinc-100';
            break;
        case 'neutral':
            $coloring = 'bg-neutral-300 text-neutral-900 ';
            $coloring .= 'dark:bg-neutral-800 dark:text-neutral-200';
                $iconcolor = 'text-neutral-500 dark:text-neutral-100';
            break;
        case 'stone':
            $coloring = 'bg-stone-300 text-stone-900 ';
            $coloring .= 'dark:bg-stone-800 dark:text-stone-200';
                $iconcolor = 'text-stone-500 dark:text-stone-100';
            break;

// EXTENDED PALETTE

        case 'plum':
            $coloring = 'bg-plum-300 text-plum-900 ';
            $coloring .= 'dark:text-plum-200';
            $iconcolor = 'text-plum-500 dark:text-plum-100';
            break;
        case 'mulberry':
            $coloring = 'bg-mulberry-100 text-mulberry-700 ';
            $coloring .= 'dark:text-mulberry-200';
            $iconcolor = 'text-mulberry-500 dark:text-mulberry-100';
            break;
        case 'coral':
            $coloring = 'bg-coral-200 text-coral-800 ';
            $coloring .= 'dark:text-coral-200 ';
            $iconcolor = 'text-coral-500 dark:text-coral-100';
            break;
        case 'tangerine':
            $coloring = 'bg-tangerine-200 text-tangerine-700 ';
            $coloring .= 'dark:text-tangerine-200 ';
            $iconcolor = 'text-tangerine-500 dark:text-tangerine-100';
            break;
        case 'sunflower':
            $coloring = 'bg-sunflower-200 text-sunflower-700 ';
            $coloring .= 'dark:text-sunflower-200 ';
            $iconcolor = 'text-sunflower-600 dark:text-sunflower-100';
            break;
        case 'grass':
            $coloring = 'bg-grass-300 text-grass-900 ';
            $coloring .= 'dark:text-grass-200 ';
            $iconcolor = 'text-grass-500 dark:text-grass-100';
            break;
        case 'jade':
            $coloring = 'bg-jade-300 text-jade-900 ';
            $coloring .= 'dark:text-jade-200 ';
            $iconcolor = 'text-jade-500 dark:text-jade-100';
            break;
        case 'turquoise':
            $coloring = 'bg-turquoise-200 text-turquoise-900 ';
            $coloring .= 'dark:text-turquoise-200 ';
            $iconcolor = 'text-turquoise-500 dark:text-turquoise-100';
            break;
        case 'electric':
            $coloring = 'bg-electric-300 text-electric-900 ';
            $coloring .= 'dark:text-electric-200 ';
            $iconcolor = 'text-electric-500 dark:text-electric-100';
            break;
        case 'cerulean':
            $coloring = 'bg-cerulean-300 text-cerulean-900 ';
            $coloring .= 'dark:text-cerulean-200 ';
            $iconcolor = 'text-cerulean-500 dark:text-cerulean-100';
            break;
        case 'sapphire':
            $coloring = 'bg-sapphire-200 text-sapphire-900 ';
            $coloring .= 'dark:text-sapphire-200 ';
            $iconcolor = 'text-sapphire-500 dark:text-sapphire-100';
            break;
        case 'amethyst':
            $coloring = 'bg-amethyst-200 text-amethyst-900 ';
            $coloring .= 'dark:text-amethyst-200 ';
            $iconcolor = 'text-amethyst-500 dark:text-amethyst-100';
            break;

        default:
            $coloring = 'bg-slate-300 text-slate-900 ';
            $coloring .= 'dark:bg-slate-800 dark:text-slate-300';
            break;
    } // endswitch
@endphp
@if ($route)
    <a href="{{ $route }}" {{ $attributes->merge(['class' => $tag . ' ' . $coloring]) }}
        @if ($color)
            style="background: {{ $color }}; color: {{ $shading }}"
        @endif
    >
@else
<span {{ $attributes->merge(['class' => $tag . ' ' . $coloring]) }}
    @if ($color)
        style="background: {{ $color }}; color: {{ $shading }};"
    @endif
>
@endif
    @if ($lefticon)
        @svg($lefticon, 'w-3 h-3 mr-1 inline' . $iconcolor)
    @endif
{{ $slot }}
@if ($righticon)
    @svg($righticon, 'w-3 h-3 ml-1 inline' . $iconcolor)
@endif
@if ($route)
</a>
@else
</span>
@endif

