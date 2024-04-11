@props(['label' => '', 'field', 'value' => '', 'icon' => '', 'required' => FALSE, 'inline' => FALSE])

@php
    $color_classes = 'border-slate-300 dark:bg-slate-400 dark:text-slate-700 focus:border-sky-300 focus:ring-sky-300';
    $error_classes = 'border-red-500 text-red-900';

    // support for wire:model instead of field
    if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
        $field = $attributes->whereStartswith('wire:model')->first();
    }
@endphp

<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }} id="{{ $field }}">
@unless ($inline)
    <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 dark:text-slate-300 bg-transparent">
        {{ $label ?: ucfirst($field) }}
    </label>
@endunless
    <div class="mt-1">
<textarea
    class="resize-none appearance-none block border rounded py-3 px-4 mb-3 leading-tight 
    focus:outline-none focus:bg-white focus:border-slate-500
    {{ $errors->has($field) ? $error_classes : $color_classes }}"
    cols="40" rows="10" name="{{ $field }}" id="{{ $field }}"
    {{ $attributes->whereStartsWith('wire') }}
>
</textarea>
@error($field)
<p class="mt-2 text-sm text-red-600 italic">{{ $message }}</p>
@enderror
    </div>
</div>