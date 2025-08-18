@props(['field', 'label' => '', 'nolabel' => FALSE, 'value' => '',
    'any' => FALSE, 'none' => FALSE, 'models', 'optionvalue' => 'id', 'optionfield' => '',
    'help' => '', 'helptype' => 'ghost', 'nonevalue' => 0, 'anyvalue' => 'any',
])

@php
    $common_classes = 'block min-h-8 w-full pl-2 rounded-sm shadow-xs sm:text-sm border leading-tight appearance-none';
    $color_classes = 'bg-white text-slate-500 dark:text-slate-700 dark:bg-slate-400 border-slate-200 dark:border-slate-700 focus:ring-sky-300 focus:border-sky-300 focus:outline-hidden';
    $error_classes = 'border-red-500 text-red-500;'
@endphp
<div {{ $attributes->merge(['class' => 'field']) }}>
    @unless($nolabel)
        <label for="{{ $field }}" class="block text-sm mb-2 font-medium text-slate-500 dark:text-slate-300 bg-transparent">
            {{ $label ?: ucfirst($field) }}
        </label>
    @endunless
    <div class="relative mt-1">
        <div class="select">
            <select
              name="{{ $field }}"
              {{ \Arr::except($attributes, 'class') }}
              @class([$common_classes,
                $color_classes => ! $errors->has($field),
                $error_classes => $errors->has($field),
              ])
            >
            <option disabled value="">Select {{ $label ?: ucfirst($field) }}</option>
            @if($any)
                <option value="{{ $anyvalue }}">Any</option>
            @endif
            @if($none)
                <option value="{{ $nonevalue }}">None</option>
            @endif
            @foreach ($models as $model)
                <option value="{{ $model->$optionvalue }}" {{ $value == $model->$optionvalue ? "selected" : "" }}>{{ $model->$optionfield }}</option>
            @endforeach
            </select>
        </div>
        @isset($help)
            <x-euikit::help>{{ $help }}</x-euikit::help>
        @endisset
    </div>
</div><!-- EUIKit Form Lookup component -->
