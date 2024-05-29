@props(['field', 'label' => '', 'nolabel' => FALSE, 'value' => '', 'any' => FALSE, 'none' => FALSE, 'models', 'optionvalue' => '', 'optionfield' => '',
    'help' => '', 'helptype' => 'ghost',
])

@php
    $common_classes = 'block rounded shadow-sm sm:text-sm border leading-tight appearance-none';
    $color_classes = 'bg-white text-slate-500 dark:text-slate-700 dark:bg-slate-400 border-slate-200 dark:border-slate-700 focus:ring-sky-300 focus:border-sky-300 focus:outline-none';
    $error_classes = 'border-red-500 text-red-500;'
@endphp
<div {{ $attributes->merge(['class' => 'field']) }}>
    @unless($nolabel)
        <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 dark:text-slate-300 bg-transparent">
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
                <option value="any">Any</option>
            @endif
            @if($none)
                <option value="none">None</option>
            @endif
            @foreach ($models as $model)
                <option value="{{ $model->$optionvalue }}" {{ $value == $model->$optionvalue ? "selected" : "" }}>{{ $model->$optionfield }}</option>
            @endforeach
            </select>
        </div>
        @isset($help)
            <x-e::help>{{ $help }}</x-e::help>
        @endisset
    </div>
</div><!-- EUIKit Form Lookup component -->
