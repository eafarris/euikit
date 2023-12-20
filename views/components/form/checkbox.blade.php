@props(['label', 'name'])
<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }}>
    <input type="checkbox" name="{{ $name }}"
        {{ $attributes->whereStartsWith('wire') }}
    >
    <span class="ml-2 text-sm text-slate-500">{{ $label }}</span>
</div>