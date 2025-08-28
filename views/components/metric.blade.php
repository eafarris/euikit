@props(['type' => 'info', 'label' => '', 'lefticon' => '', 'righticon' => '',
    'value' => 0, 'stoplight' => FALSE, 'slgreen' => 75, 'slblue' => 50, 'slyellow' => 25
])
@php
if ($stoplight) {
    if(is_numeric($slot->toHtml())) { // slot needs to contain _ONLY_ a number
        $value = $slot->toHtml();
        if ($value > $slgreen) {
            $type="green";
        } elseif ($value > $slblue) {
            $type="blue";
        } elseif ($value > $slyellow) {
            $type="yellow";
        } else {
            $type="red";
        }
    } else {
        $value = 0;
        $type="red";
    }

}
switch ($type) {
    case 'light':
        $labelcoloring = 'bg-slate-100 border-slate-300 dark:bg-slate-100 dark:border-slate-500';
        $labeltextcoloring = 'text-slate-500 dark:text-slate-700';
        $metriccoloring = 'bg-slate-50 border-slate-300 dark:bg-slate-200 dark:border-slate-500';
        $metrictextcoloring = 'text-slate-500 dark:text-slate-800';
        $iconcolor = 'text-slate-500 dark:text-slate-100';
        break;
    case 'dark':
        $labelcoloring = 'bg-slate-500 border-slate-400 dark:bg-slate-700 dark:border-slate-500';
        $labeltextcoloring = 'text-slate-200 dark:text-slate-300';
        $metriccoloring = 'bg-slate-200 border-slate-400 dark:bg-slate-600 dark:border-slate-500';
        $metrictextcoloring = 'text-slate-600 dark:text-slate-400';
        $iconcolor = 'text-slate-100';
        break;
    case 'link':
        $labelcoloring = 'bg-blue-100 border-blue-300 dark:bg-blue-700 dark:border-blue-200';
        $labeltextcoloring = 'text-blue-500 dark:text-blue-200';
        $metriccoloring = 'bg-blue-50 border-blue-300 dark:bg-blue-500 dark:border-blue-200';
        $metrictextcoloring = 'text-blue-500 dark:text-blue-900';
        $iconcolor = 'text-blue-400 dark:text-blue-200';
        break;
    case 'info':
        $labelcoloring = 'bg-slate-300 border-slate-600 dark:bg-slate-500 dark:border-slate-900';
        $labeltextcoloring = 'text-slate-600 dark:text-slate-100';
        $metriccoloring = 'bg-slate-100 border-slate-600 dark:bg-slate-300 dark:border-slate-900';
        $metrictextcoloring = 'text-slate-600 dark:text-slate-900';
        $iconcolor = 'text-slate-500 dark:text-slate-200';
        break;
    case 'success':
    case 'green':
        $labelcoloring = 'bg-green-300 border-green-600 dark:bg-green-700 dark:border-green-100';
        $labeltextcoloring = 'text-green-600 dark:text-green-300';
        $metriccoloring = 'bg-green-100 border-green-600 dark:bg-green-300 dark:border-green-100';
        $metrictextcoloring = 'text-green-600 dark:text-green-900';
        $iconcolor = 'text-green-600 dark:text-green-300';
        break;
    case 'warning':
    case 'yellow':
        $labelcoloring = 'bg-yellow-300 border-yellow-600 dark:bg-yellow-700 dark:border-yellow-100';
        $labeltextcoloring = 'text-yellow-600 dark:text-yellow-300';
        $metriccoloring = 'bg-yellow-100 border-yellow-600 dark:bg-yellow-100 dark:border-yellow-100 ';
        $metrictextcoloring = 'text-yellow-600 dark:text-yellow-900';
        $iconcolor = 'text-yellow-600 dark:text-yellow-100';
        break;
    case 'danger':
    case 'delete':
    case 'error':
    case 'red':
        $labelcoloring = 'bg-red-300 border-red-600 dark:bg-red-700 dark:border-red-100';
        $labeltextcoloring = 'text-red-600 dark:text-red-300';
        $metriccoloring = 'bg-red-100 border-red-600 dark:bg-red-100 dark:border-red-100';
        $metrictextcoloring = 'text-red-600 dark:text-red-900';
        $iconcolor = 'text-red-500 dark:text-red-100';
        break;
    case 'primary':
    case 'blue':
        $labelcoloring = 'bg-blue-300 border-blue-600 dark:bg-blue-700 dark:border-blue-100';
        $labeltextcoloring = 'text-blue-600 dark:text-blue-300';
        $metriccoloring = 'bg-blue-100 border-blue-600 dark:bg-blue-100 dark:border-red-100';
        $metrictextcoloring = 'text-blue-600 dark:text-blue-900';
        $iconcolor = 'text-blue-500 dark:text-blue-100';
        break;
    case 'ghost':
        $labelcoloring = 'bg-transparent border-transparent dark:border-slate-400';
        $labeltextcoloring = 'text-slate-400 dark:text-slate-300';
        $metriccoloring = 'bg-transparent border-transparent dark:border-slate-400';
        $metrictextcoloring = 'text-slate-400 dark:text-slate-300';
        $iconcolor = 'text-slate-400 dark"text-slate-300';
        break;

// EXTENDED PALETTE

    case 'plum':
        $labelcoloring = 'bg-plum-300 border-plum-600 dark:bg-plum-700 dark:border-plum-100';
        $labeltextcoloring = 'text-plum-600 dark:text-plum-300';
        $metriccoloring = 'bg-plum-100 border-plum-600 dark:bg-plum-100 dark:border-red-100';
        $metrictextcoloring = 'text-plum-600 dark:text-plum-900';
        $iconcolor = 'text-plum-500 dark:text-plum-100';
        break;
    case 'mulberry':
        $labelcoloring = 'bg-mulberry-300 border-mulberry-600 dark:bg-mulberry-700 dark:border-mulberry-100';
        $labeltextcoloring = 'text-mulberry-600 dark:text-mulberry-300';
        $metriccoloring = 'bg-mulberry-100 border-mulberry-600 dark:bg-mulberry-100 dark:border-red-100';
        $metrictextcoloring = 'text-mulberry-600 dark:text-mulberry-900';
        $iconcolor = 'text-mulberry-500 dark:text-mulberry-100';
        break;
    case 'coral':
        $labelcoloring = 'bg-coral-300 border-coral-600 dark:bg-coral-700 dark:border-coral-100';
        $labeltextcoloring = 'text-coral-600 dark:text-coral-300';
        $metriccoloring = 'bg-coral-100 border-coral-600 dark:bg-coral-100 dark:border-red-100';
        $metrictextcoloring = 'text-coral-600 dark:text-coral-900';
        $iconcolor = 'text-coral-500 dark:text-coral-100';
        break;
    case 'tangerine':
        $labelcoloring = 'bg-tangerine-300 border-tangerine-600 dark:bg-tangerine-700 dark:border-tangerine-100';
        $labeltextcoloring = 'text-tangerine-600 dark:text-tangerine-300';
        $metriccoloring = 'bg-tangerine-100 border-tangerine-600 dark:bg-tangerine-100 dark:border-red-100';
        $metrictextcoloring = 'text-tangerine-600 dark:text-tangerine-900';
        $iconcolor = 'text-tangerine-500 dark:text-tangerine-100';
        break;
    case 'sunflower':
        $labelcoloring = 'bg-sunflower-300 border-sunflower-600 dark:bg-sunflower-700 dark:border-sunflower-100';
        $labeltextcoloring = 'text-sunflower-600 dark:text-sunflower-300';
        $metriccoloring = 'bg-sunflower-100 border-sunflower-600 dark:bg-sunflower-100 dark:border-red-100';
        $metrictextcoloring = 'text-sunflower-600 dark:text-sunflower-900';
        $iconcolor = 'text-sunflower-500 dark:text-sunflower-100';
        break;
    case 'grass':
        $labelcoloring = 'bg-grass-300 border-grass-600 dark:bg-grass-700 dark:border-grass-100';
        $labeltextcoloring = 'text-grass-600 dark:text-grass-300';
        $metriccoloring = 'bg-grass-100 border-grass-600 dark:bg-grass-100 dark:border-red-100';
        $metrictextcoloring = 'text-grass-600 dark:text-grass-900';
        $iconcolor = 'text-grass-500 dark:text-grass-100';
        break;
    case 'jade':
        $labelcoloring = 'bg-jade-300 border-jade-600 dark:bg-jade-700 dark:border-jade-100';
        $labeltextcoloring = 'text-jade-600 dark:text-jade-300';
        $metriccoloring = 'bg-jade-100 border-jade-600 dark:bg-jade-100 dark:border-red-100';
        $metrictextcoloring = 'text-jade-600 dark:text-jade-900';
        $iconcolor = 'text-jade-500 dark:text-jade-100';
        break;
    case 'turquoise':
        $labelcoloring = 'bg-turquoise-300 border-turquoise-600 dark:bg-turquoise-700 dark:border-turquoise-100';
        $labeltextcoloring = 'text-turquoise-600 dark:text-turquoise-300';
        $metriccoloring = 'bg-turquoise-100 border-turquoise-600 dark:bg-turquoise-100 dark:border-red-100';
        $metrictextcoloring = 'text-turquoise-600 dark:text-turquoise-900';
        $iconcolor = 'text-turquoise-500 dark:text-turquoise-100';
        break;
    case 'electric':
        $labelcoloring = 'bg-electric-300 border-electric-600 dark:bg-electric-700 dark:border-electric-100';
        $labeltextcoloring = 'text-electric-600 dark:text-electric-300';
        $metriccoloring = 'bg-electric-100 border-electric-600 dark:bg-electric-100 dark:border-red-100';
        $metrictextcoloring = 'text-electric-600 dark:text-electric-900';
        $iconcolor = 'text-electric-500 dark:text-electric-100';
        break;
    case 'cerulean':
        $labelcoloring = 'bg-cerulean-300 border-cerulean-600 dark:bg-cerulean-700 dark:border-cerulean-100';
        $labeltextcoloring = 'text-cerulean-600 dark:text-cerulean-300';
        $metriccoloring = 'bg-cerulean-100 border-cerulean-600 dark:bg-cerulean-100 dark:border-red-100';
        $metrictextcoloring = 'text-cerulean-600 dark:text-cerulean-900';
        $iconcolor = 'text-cerulean-500 dark:text-cerulean-100';
        break;
    case 'sapphire':
        $labelcoloring = 'bg-sapphire-300 border-sapphire-600 dark:bg-sapphire-700 dark:border-sapphire-100';
        $labeltextcoloring = 'text-sapphire-600 dark:text-sapphire-300';
        $metriccoloring = 'bg-sapphire-100 border-sapphire-600 dark:bg-sapphire-100 dark:border-red-100';
        $metrictextcoloring = 'text-sapphire-600 dark:text-sapphire-900';
        $iconcolor = 'text-sapphire-500 dark:text-sapphire-100';
        break;
    case 'amethyst':
        $labelcoloring = 'bg-amethyst-300 border-amethyst-600 dark:bg-amethyst-700 dark:border-amethyst-100';
        $labeltextcoloring = 'text-amethyst-600 dark:text-amethyst-300';
        $metriccoloring = 'bg-amethyst-100 border-amethyst-600 dark:bg-amethyst-100 dark:border-red-100';
        $metrictextcoloring = 'text-amethyst-600 dark:text-amethyst-900';
        $iconcolor = 'text-amethyst-500 dark:text-amethyst-100';
        break;

}
@endphp
<div {{ $attributes->merge(['class' => 'bg-transparent min-w-[96px]'])}}>
    @if($label)
        <div class="flex place-content-center p-4 rounded-t-xl border {{ $labelcoloring }}">
            <p class="text-sm font-medium flex gap-2 {{ $labeltextcoloring }}">
            @if ($lefticon)
                @svg($lefticon, 'w-6 h-6 inline ' . $iconcolor)
            @endif
                {{ $label }}
            @if ($righticon)
                @svg($righticon, 'w-6 h-6 inline ' . $iconcolor)
            @endif
            </p>
        </div>
        <div class="flex place-content-center pb-4 pt-2 rounded-b-xl border-b border-l border-r {{ $metriccoloring }}">
    @else
        <div class="flex place-content-center pb-4 pt-2 rounded-xl border {{ $metriccoloring}}">
    @endif
        <p class="mt-1 px-2 text-2xl font-semibold tracking-tight {{ $metrictextcoloring }}">
            {{ $slot }}
        </p>
    </div>
</div><!-- EUIKit Metric Component -->
