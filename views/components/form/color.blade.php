@props(['field', 'label' => '', 'value' => '', 'min' => '', 'max' => '', 'required' => FALSE, 'nolabel' => FALSE,
    'help' => '', 'helptype' => 'ghost',
])

@php
    if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
        $field = $attributes->whereStartsWith('wire:model')->first();
    }

    $common_classes = 'block w-1/6 min-w-[200px] rounded-sm shadow-xs sm:text-sm border leading-tight appearance-none placeholder:italic';
@endphp

<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }} id="{{ $field }}">
@unless($nolabel)
    <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 dark:text-slate-300 bg-transparent">
        {{ $label ?: ucfirst($field) }}
    </label>
@endunless
    <div class="relative">
        <input type="color"
            id="{{ $field }}"
            name="{{ $field }}"
            value="{{ @old($field, $value) }}"
            @class([$common_classes,
            ])
            @if ($required) required @endif
            @if ($min) min="{{ $min }}" @endif
            @if ($max) max="{{ $max }}" @endif
            {{ $attributes->merge(['list' => '']) }}
        />
        @isset($help)
            <x-e::help type="{{ $helptype }}">{{ $help }}</x-e::help>
        @endisset
    </div>

    @error($field)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div><!-- EUIKit Date input -->
