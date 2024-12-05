@props(['type' => 'info', 'label' => '', 'lefticon' => '', 'righticon' => '',
    'value' => 0, 'stoplight' => FALSE, 'slgreen' => 75, 'slblue' => 50, 'slyellow' => 25
])
@php
if ($stoplight) {
    $slot = $value;
    if ($value > $slgreen) {
        $type="green";
    } elseif ($value > $slblue) {
        $type="blue";
    } elseif ($value > $slyellow) {
        $type="yellow";
    } else {
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
        $labelcoloring = 'bg-slate-500 border-slate-400 dark:bg-slate-700 dark:border-slate-600';
        $labeltextcoloring = 'text-slate-200 dark:text-slate-300';
        $metriccoloring = 'bg-slate-200 border-slate-400 dark:bg-slate-600 dark:border-slate-600';
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
        $iconcolor = 'text-green-600 dark:text-green-800';
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
        <p class="mt-1 text-2xl font-semibold tracking-tight {{ $metrictextcoloring }}">
            {{ $slot }}
        </p>
    </div>
</div><!-- EUIKit Metric Component -->
