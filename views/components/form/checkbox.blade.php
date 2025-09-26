@props(['field', 'label' => '',
    'help' => '', 'helptype' => 'ghost',
])
@php
if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
    $field = $attributes->whereStartsWith('wire:model')->first();
}
@endphp
<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }} id="{{ $field }}">
    <label class="flex items-center gap-4 text-sm text-slate-500">
        <input type="checkbox" name="{{ $field }}"
            class="h-4 w-4 rounded-xs border-slate-300 text-slate-500 focus:ring-sky-300"
            {{ $attributes->whereStartsWith('wire') }}
        >
        {{ $label ?: ucfirst($field)}}
        @isset($help)
            <x-euikit::help type="{{ $helptype }}">{{ $help }}</x-euikit::help>
        @endisset
    </label>
</div>
