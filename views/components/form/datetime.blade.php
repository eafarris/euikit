@props(['label' => '', 'field', 'value' => '', 'min' => '', 'max' => '', 'required' => false, 'nolabel' => false])

@php
$color_classes = 'border-slate-300 focus:border-indigo-500 focus:ring-indigo-500';
$error_classes = 'border-red-500 text-red-500';

if (!empty($value)) {
  $date = new \Carbon\Carbon($value); // convert retrieved db string to Carbon
  $value = $date->toDateString(); // back to the format HTML form date wants
}
@endphp


<div {{ $attributes->merge(['class' => 'field']) }} id="{{ $field }}"><!-- InsideUIKit Date input -->
    @unless($nolabel)
    <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 bg-transparent">{{ $label ?: ucfirst($field) }}</label>
    @endunless
    <div class="control mt-1">
        <input type="datetime-local"
            id="{{ $field }}"
            name="{{ $field }}"
            value="{{ @old($field, $value) }}"
            class="block w-full rounded-md shadow-sm sm:text-sm {{ $errors->has($field) ? $error_classes : $color_classes }} "
            @if ($required) required @endif
            @if ($min) min="{{ $min }}" @endif
            @if ($max) max="{{ $max }}" @endif
        />
    </div><!-- .control -->

    @error($field)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div><!-- InsideUIKit Date input -->