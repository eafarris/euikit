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
        $labelcoloring = 'bg-slate-100 border-slate-300';
        $labeltextcoloring = 'text-slate-500';
        $metriccoloring = 'bg-slate-50 border-slate-300';
        $metrictextcoloring = 'text-slate-500';
        $iconcolor = 'text-slate-500';
        break;
    case 'dark':
        $labelcoloring = 'bg-slate-500 border-slate-400';
        $labeltextcoloring = 'text-slate-200';
        $metriccoloring = 'bg-slate-200 border-slate-400';
        $metrictextcoloring = 'text-slate-600';
        $iconcolor = 'text-slate-100';
        break;
    case 'link':
        $labelcoloring = 'bg-blue-100 border-blue-300';
        $labeltextcoloring = 'text-blue-500';
        $metriccoloring = 'bg-blue-50 border-blue-300';
        $metrictextcoloring = 'text-blue-500';
        $iconcolor = 'text-blue-400';
        break;
    case 'info':
        $labelcoloring = 'bg-slate-300 border-slate-600';
        $labeltextcoloring = 'text-slate-600';
        $metriccoloring = 'bg-slate-100 border-slate-600';
        $metrictextcoloring = 'text-slate-600';
        $iconcolor = 'text-slate-500';
        break;
    case 'success':
    case 'green':
        $labelcoloring = 'bg-green-300 border-green-600';
        $labeltextcoloring = 'text-green-600';
        $metriccoloring = 'bg-green-100 border-green-600';
        $metrictextcoloring = 'text-green-600';
        $iconcolor = 'text-green-600';
        break;
    case 'warning':
    case 'yellow':
        $labelcoloring = 'bg-yellow-300 border-yellow-600';
        $labeltextcoloring = 'text-yellow-600';
        $metriccoloring = 'bg-yellow-100 border-yellow-600';
        $metrictextcoloring = 'text-yellow-600';
        $iconcolor = 'text-yellow-600';
        break;
    case 'danger':
    case 'delete':
    case 'error':
    case 'red':
        $labelcoloring = 'bg-red-300 border-red-600';
        $labeltextcoloring = 'text-red-600';
        $metriccoloring = 'bg-red-100 border-red-600';
        $metrictextcoloring = 'text-red-600';
        $iconcolor = 'text-red-500';
        break;
    case 'primary':
    case 'blue':
        $labelcoloring = 'bg-blue-300 border-blue-600';
        $labeltextcoloring = 'text-blue-600';
        $metriccoloring = 'bg-blue-100 border-blue-600';
        $metrictextcoloring = 'text-blue-600';
        $iconcolor = 'text-blue-500';
        break;
    case 'ghost':
        $labelcoloring = 'bg-transparent border-none';
        $labeltextcoloring = 'text-slate-400';
        $metriccoloring = 'bg-transparent border-none';
        $metrictextcoloring = 'text-slate-400';
        $iconcolor = 'text-slate-400';
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
