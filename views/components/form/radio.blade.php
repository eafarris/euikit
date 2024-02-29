@props(['label', 'field', 'value'])

@php
    if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
        $field = $attributes->whereStartsWith('wire:model')->first();
    }
@endphp

<div {{ $attributes->whereDoesntStartWith('wire:model')->merge(['class' => 'field flex items-center p-2 rounded-lg bg-transparent']) }}">
    <input id="{{ $value }}" name="{{ $field }}" type="radio" value="{{ $value }}"
        {{ $attributes->whereStartsWith('wire') }}
        class="h-4 w-4 border-slate-300 text-slate-600 focus:ring-indigo-600"
    >

    <label for="{{ $value }}" class="ml-3 block text-slate-600">{{ $label }}</label>
</div>