@props(['type' => '', 'label' => '', 'field', 'value' => '', 'placeholder' => '', 'icon' => '', 'required' => false])

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

$color_classes = 'border-slate-300 focus:border-indigo-500 focus:ring-indigo-500';
$error_classes = 'border-red-500 text-red-900';
@endphp

<div class="field" id="{{ $field }}">
    <label for="{{ $field }}" class="block text-sm font-medium text-gray-700 bg-transparent">
    {{ $label ?: ucfirst($field) }}
    </label>
    <div class="mt-1">
        <input type="{{ $type }}" 
            id="{{ $field }}"   
            name="{{ $field }}"
            value="{{ @old($field, $value) }}"
            placeholder="{{ $placeholder ?: $label ?: ucfirst($field) }}"
            class="block w-full rounded-md shadow-sm sm:text-sm {{ $errors->has($field) ? $error_classes : $color_classes }} "
            @if ($required) required @endif 
        />
        @if ($icon)
            @svg($icon, ['class' => 'icon is-left', 'style' => 'top: inherit; padding: 5px'])
        @endif
    </div>

    @error($field)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div><!-- EUIKit text input-->