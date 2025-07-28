@props(['type' => 'info',
    'route' => '',
    'lefticon' => '', 'righticon' => '',
    'color' => '',
])
@php
if ($color) {
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
} // endif calculating color
@endphp

@php
    $tag = 'inline-flex gap-1 grow-0 shrink items-center justify-items-center text-xs uppercase font-semibold px-2 py-1 rounded-md mx-1';

    $coloring = '';
    switch ($type) {
        case 'light':
            $coloring = 'bg-slate-100 text-slate-500 ';
            $coloring .= 'dark:bg-slate-300 text-slate-600';
            break;
        case 'dark':
            $coloring = 'bg-slate-500 text-slate-100 ';
            $coloring .= 'dark:bg-slate-800 dark:text-slate-300';
            break;
        case 'link':
            $coloring = 'bg-transparent text-blue-600 underline underline-offset-2 ';
            $coloring .= 'dark:text-slate-400';
            break;
        case 'info':
            $coloring = 'bg-slate-300 text-slate-900 ';
            $coloring .= 'dark:bg-slate-800 dark:text-slate-300';
            break;
        case 'success':
        case 'green':
            $coloring = 'bg-green-300 text-green-900 ';
            $coloring .= 'dark:bg-green-800 dark:text-green-200';
            break;
        case 'warning':
        case 'yellow':
            $coloring = 'bg-yellow-300 text-yellow-900 ';
            $coloring .= 'dark:bg-yellow-800 dark:text-yellow-200';
            break;
        case 'danger':
        case 'delete':
        case 'error':
        case 'red':
            $coloring = 'bg-red-300 text-red-900 ';
            $coloring .= 'dark:bg-red-800 dark:text-red-200';
            break;
        case 'primary':
        case 'blue':
            $coloring = 'bg-blue-300 text-blue-900 ';
            $coloring .= 'dark:bg-blue-800 dark:text-blue-200';
            break;
        case 'ghost':
            $coloring = 'bg-transparent text-slate-400 ';
            $coloring .= 'dark:text-slate-200';
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
        @svg($lefticon, 'w-3 h-3 mr-1')
    @endif
{{ $slot }}
@if ($righticon)
    @svg($righticon, 'w-3 h-3 ml-1')
@endif
@if ($route)
</a>
@else
</span>
@endif

