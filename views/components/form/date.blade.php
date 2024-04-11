@props(['label' => '', 'field', 'value' => '', 'min' => '', 'max' => '', 'required' => FALSE])

@php
if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
    $field = $attributes->whereStartsWith('wire:model')->first();
}

$color_classes = 'border-slate-300 focus:border-sky-300 focus:ring-sky-300';
$error_classes = 'border-red-500 text-red-500';

if (!empty($value)) {
  $date = new \Carbon\Carbon($value); // convert retrieved db string to Carbon
  $value = $date->toDateString(); // back to the format HTML form date wants
}
@endphp


<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }} id="{{ $field }}">
    <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 bg-transparent">{{ $label ?: ucfirst($field) }}</label>
    <div class="control mt-1">
        <input type="date"
            id="{{ $field }}"
            name="{{ $field }}"
            value="{{ @old($field, $value) }}"
            class="block w-full rounded-md shadow-sm sm:text-sm {{ $errors->has($field) ? $error_classes : $color_classes }} "
            {{ $attributes->whereStartsWith('wire') }}
            @if ($required) required @endif
            @if ($min) min="{{ $min }}" @endif
            @if ($max) max="{{ $max }}" @endif
        />
    </div>

    @error($field)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div><!-- EUIKit Date input -->