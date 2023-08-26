@php
$classes = 'p-2 pr-0 text-slate-500 dark:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-700 hover:rounded-tl-lg hover:rounded-bl-lg';
if ($route == url()->current()) {
    $classes = 'p-2 pr-0 text-slate-500 bg-white dark:text-slate-300 dark:bg-slate-800 rounded-tl-lg rounded-bl-lg';
}
@endphp

<a href="{{ $route }}" {{ $attributes->merge(['class' => $classes]) }}>
{{ $slot }}
</a>