@props(['field', 'label' => '', 'value' => '',
    'help' => '', 'helptype' => 'ghost',
])

@php
    if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
        $field = $attributes->whereStartsWith('wire:model')->first();
    }

    $common_classes = 'h-4 w-4';
    $color_classes = 'text-slate-600 focus:ring-sky-300';
    $error_classes = 'text-red-500';
@endphp

<div {{ $attributes->whereDoesntStartWith('wire:model')->merge(['class' => 'field flex items-center p-2 rounded-lg bg-transparent']) }}">
    <div class="flex items-center gap-4">
        <input id="{{ $value }}" name="{{ $field }}" type="radio" value="{{ $value }}"
            {{ $attributes->whereStartsWith('wire') }}
            @class([$common_classes,
                $color_classes => ! $errors->has($field),
                $error_classes => $errors->has($field),
            ])
        >

        <label for="{{ $value }}" class="block text-sm mb-2 font-medium text-slate-500 bg-transparent">{{ $label ?: ucfirst($field) }}</label>
        @isset($help)
            <x-e::help>{{ $help }}</x-e::help>
        @endisset
    </div>
</div>
