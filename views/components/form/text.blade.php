@props(['type' => '', 'label' => '', 'field', 'value' => '',
    'placeholder' => '', 'icon' => '', 'required' => FALSE, 'inline' => FALSE])

@php
switch ($field) {
    case 'pass':
    case 'password':
        $autotype = 'password';
        break;
    case 'email':
        $autotype = 'email';
        break;
    case 'phone':
    case 'telephone':
    case 'tel':
        $autotype = 'tel';
        break;
    default:
        $autotype = 'text';
        break;
}
$type = $type ?: $autotype;

$color_classes = 'border-slate-300 dark:bg-slate-400 dark:text-slate-700 focus:border-indigo-500 focus:ring-indigo-500';
$error_classes = 'border-red-500 text-red-900';
@endphp

<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }} id="{{ $field }}">
@if (!$inline)
    <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 dark:text-slate-300 bg-transparent">
    {{ $label ?: ucfirst($field) }}
    </label>
@endif
    <div class="mt-1">
        <input type="{{ $type }}" 
            id="{{ $field }}"   
            name="{{ $field }}"
            value="{{ @old($field, $value) }}"
            placeholder="{{ $placeholder ?: $label ?: ucfirst($field) }}"
            class="block w-full rounded-md shadow-sm sm:text-sm placeholder:italic placeholder:text-slate-400 {{ $errors->has($field) ? $error_classes : $color_classes }} "
            @if ($required) required @endif 
            {{ $attributes->whereStartsWith('wire') }}
            {{ $attributes->merge(['list' => '']) }}
        />
        @if ($icon)
            @svg($icon, ['class' => 'icon is-left', 'style' => 'top: inherit; padding: 5px'])
        @endif
    </div>

    @error($field)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div><!-- EUIKit text input-->
