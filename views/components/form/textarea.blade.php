@props(['field', 'label' => '', 'value' => '', 'required' => FALSE, 'nolabel' => FALSE,
    'help' => '', 'helptype' => 'ghost',
])

@php
    $common_classes = 'resize-none appearance-none block border rounded py-3 p-4 mb-3 leading-tight';
    $color_classes = 'text-slate-700 dark:bg-slate-400 dark:text-slate-700 border-slate-200 focus:bg-white focus:ring-sky-300 focus:outline-sky-300';
    $error_classes = 'border-red-500 text-red-900';

    // support for wire:model instead of field
    if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
        $field = $attributes->whereStartswith('wire:model')->first();
    }
@endphp

<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }} id="{{ $field }}">
@unless ($nolabel)
    <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 dark:text-slate-300 bg-transparent">
        {{ $label ?: ucfirst($field) }}
    </label>
@endunless
    <div class="mt-1">
<textarea
    @class([$common_classes,
        $color_classes => ! $errors->has($field),
        $error_classes => $errors->has($field),
    ])
    cols="40" rows="10" name="{{ $field }}" id="{{ $field }}"
    {{ $attributes->whereStartsWith('wire') }}
>
</textarea>
</div>
    @isset($help)
        <x-e::help>{{ $help }}</x-e::help>
    @endisset
    @error($field)
        <p class="mt-2 text-sm text-red-600 italic">{{ $message }}</p>
    @enderror
</div>
