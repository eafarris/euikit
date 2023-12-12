@props(['field', 'label' => '', 'placeholder' => '', 'multi' => false])
@php
    $color_classes = 'text-slate-700 border-slate-200';
    $error_classes = 'border-red-500 text-red-900';
@endphp
<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }}>
    <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 bg-transparent">{{ $label ?: ucfirst($field) }}</label>
    <div class="control mt-1">
        <div class="select">
            <select 
                {{ $attributes->whereStartsWith('wire') }}
                @if ($multi) multiple @endif
              name="{{ $field }}"
              class="appearance-none block border rounded leading-tight focus:outline-none focus:bg-white focus:border-slate-500 w-full {{ $errors->has($field) ? $error_classes : $color_classes }}"
            >
            @unless ($multi)
            <option value="">@if ($placeholder) {{ $placeholder }} @else Select {{ $label ?: ucfirst($field) }} @endif
            @endunless
                {{ $slot }}
            </select>
        </div>
    </div>
    @error($field)
        <p class="mt-2 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror
</div><!-- EUIKit select input -->