@props([
    'type' => 'text', 'label' => '', 'field', 'value' => '',
    'placeholder' => '', 'icon' => '', 'required' => FALSE, 'inline' => FALSE
])
@php
    $color_classes = 'border-slate-300 dark:bg-slate-400 dark:text-slate-700 focus:border-indigo-500 focus:ring-indigo-500';
    $error_classes = 'border-red-500 text-red-900';
@endphp
<div {{ $attributes->merge(['class' => 'field']) }} id="{{ $field }}">
    @if (!$inline)
        <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 dark:text-slate-300 bg-transparent">
            {{ $label ?: ucfirst($field) }}
        </label>
    @endif
    <div class="mt-1 border-none">
        @switch($type)
        @case('lookup') 
            <input disabled type="text"
                id="{{ $field }}"
                name="{{ $field }}"
                value="{{ $value }}"
                class="block w-full rounded-md shadow-sm sm:text-sm placeholder:italic placeholder:text-slate-400 {{ $errors->has($field) ? $error_classes : $color_classes }} "
                @if ($required) required @endif
                {{ $attributes->merge(['list' => '']) }}
            />
            @break
        @case('date')
            <input disabled type="date"
                id="{{ $field }}"
                name="{{ $field }}"
                value="{{ $value }}"
                class="text-slate-700 block w-full rounded-md border border-slate-300 sm:text-sm {{ $errors->has($field) ? 'is-danger' : ''}} "
            />
            @break
        @case('boolean')
            <input disabled type="text"
                id="{{ $field }}"
                name="{{ $field }}"
                value="{{ $field ? 'Yes' : 'No' }}"
                class="text-slate-700 block w-full rounded-md border border-slate-300 sm:text-sm {{ $errors->has($field) ? ' is-danger' : '' }}"
            />
            @break
        @case('text')
        @default
            <input disabled type="text" 
                id="{{ $field }}"   
                name="{{ $field }}"
                value="{{ $value }}"
                class="text-slate-700 block w-full rounded-md border border-slate-300 sm:text-sm {{ $errors->has($field) ? 'is-danger' : ''}} "
            />
        @endswitch
    </div>
</div><!-- EUIKit Display Field component-->