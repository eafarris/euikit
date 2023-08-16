@php
$classes = 'p-2 pr-0 text-slate-500 hover:bg-slate-200';
if ($route == url()->current()) {
    $classes = 'p-2 pr-0 text-slate-500 bg-slate-200 text-slate-700';
}
@endphp

<a href="{{ $route }}" {{ $attributes->merge(['class' => $classes]) }}>
{{ $slot }}
</a>