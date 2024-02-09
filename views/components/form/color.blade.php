@props(['label' => '', 'field', 'value' => '', 'min' => '', 'max' => '', 'required' => FALSE])

<div {{ $attributes->merge(['class' => 'field']) }} id="{{ $field }}">
    <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 bg-transparent">{{ $label ?: ucfirst($field) }}</label>
    <div class="control mt-1">
        <input type="color"
            id="{{ $field }}"
            name="{{ $field }}"
            value="{{ @old($field, $value) }}"
            class="block w-full rounded-md shadow-sm sm:text-sm"
            @if ($required) required @endif
            @if ($min) min="{{ $min }}" @endif
            @if ($max) max="{{ $max }}" @endif
            {{ $attributes->merge(['list' => '']) }}
        />
    </div>

    @error($field)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div><!-- EUIKit Date input -->