@props(['field', 'label' => '', 'value' => '', 'min' => '', 'max' => '', 'required' => FALSE, 'nolabel' => FALSE,
    'help' => '', 'helptype' => 'ghost',
])

@php
if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
    $field = $attributes->whereStartsWith('wire:model')->first();
}

$common_classes = 'block w-1/6 min-w-[200px] rounded shadow-sm sm:text-sm border leading-tight appearance-none placeholder:italic';
$color_classes = 'border-slate-300 text-slate-500 bg-transparent focus:border-sky-300 focus:ring-sky-300 placeholder:text-slate-400 ';
$color_classes .= 'dark:border-slate-400 dark:bg-slate-700 dark:text-slate-300 dark:placeholder:text-slate-400 dark:focus:border-sky-600 dark:focus:ring-sky-600';
$error_classes = 'border-red-500 text-red-500';

if (!empty($value)) {
  $date = new \Carbon\Carbon($value); // convert retrieved db string to Carbon
  $value = $date->toDateString(); // back to the format HTML form date wants
}
@endphp


<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }} id="{{ $field }}">
@unless($nolabel)
    <label for="{{ $field }}" class="block text-sm mb-2 font-medium text-slate-500 dark:text-slate-300 bg-transparent">
        {{ $label ?: ucfirst($field) }}
    </label>
@endunless
    <div class="relative">
        <input type="date"
            id="{{ $field }}"
            name="{{ $field }}"
            value="{{ @old($field, $value) }}"
            @class([$common_classes,
                $color_classes => ! $errors->has($field),
                $error_classes => $errors->has($field),
            ])
            {{ $attributes->whereStartsWith('wire') }}
            @if ($required) required @endif
            @if ($min) min="{{ $min }}" @endif
            @if ($max) max="{{ $max }}" @endif
        />
        @isset($help)
            <x-e::help type="{{ $helptype }}">{{ $help }}</x-e::help>
        @endisset
    </div>

    @error($field)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div><!-- EUIKit Date input -->
