@props(['label', 'field'])
<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }} id="{{ $field }}">
    <input type="checkbox" name="{{ $field }}"
        {{ $attributes->whereStartsWith('wire') }}
    >
    <span class="ml-2 text-sm text-slate-500">{{ $label }}</span>
</div>