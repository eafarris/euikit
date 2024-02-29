@props(['label', 'field'])
@php
if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
    $field = $attributes->whereStartsWith('wire:model')->first();
}
@endphp
<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }} id="{{ $field }}">
    <input type="checkbox" name="{{ $field }}"
        class="h-4 w-4 rounded border-slate-300 text-slate-500 focus:ring-indigo-600"
        {{ $attributes->whereStartsWith('wire') }}
    >
    <span class="ml-2 text-sm text-slate-500">{{ $label }}</span>
</div>