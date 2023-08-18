@php
$classes = 'p-2 pr-0 text-slate-500 hover:bg-slate-200 hover:rounded-tl-lg hover:rounded-bl-lg';
if ($route == url()->current()) {
    $classes = 'p-2 pr-0 text-slate-500 bg-white text-slate-500 rounded-tl-lg rounded-bl-lg';
}
@endphp

<a href="{{ $route }}" {{ $attributes->merge(['class' => $classes]) }}>
{{ $slot }}
</a>