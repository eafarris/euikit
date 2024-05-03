@props(['field', 'label' => '', 'nolabel' => FALSE, 'value' => '', 'any' => FALSE, 'none' => FALSE, 'placeholder' => '', 'multi' => FALSE,
    'help' => '', 'helptype' => 'ghost',
])
@php
    $common_classes = 'block w-1/6 min-w-[200px] rounded shadow-sm sm:text-sm border leading-tight appearance-none';
    $color_classes = 'bg-white text-slate-500 dark:text-slate-700 dark:bg-slate-400 border-slate-200 dark:border-slate-700 focus:ring-sky-300 focus:border-sky-300 focus:border-sky-300 focus:outline-none';
    $error_classes = 'border-red-500 text-red-900';
@endphp

<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }}>
    @unless($nolabel)
        <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 dark:text-slate-300 bg-transparent">
            {{ $label ?: ucfirst($field) }}
        </label>
    @endunless
    <div class="relative mt-1">
        <div class="select">
            <select
                {{ $attributes->whereStartsWith('wire') }}
                @if ($multi) multiple @endif
              name="{{ $field }}"
              @class([$common_classes,
                $color_classes => ! $errors->has($field),
                $error_classes => $errors->has($field),
              ])
            >
                @unless ($multi)
                    <option value="">@if ($placeholder) {{ $placeholder }} @else Select {{ $label ?: ucfirst($field) }} @endif
                @endunless
                @if($any)
                    <option value="any">Any</option>
                @endif
                @if($none)
                    <option value="none">None</option>
                @endif
                {{ $slot }}
            </select>
        </div>
        @isset($help)
            <x-e::help>{{ $help }}</x-e::help>
        @endisset
    </div>
    @error($field)
        <p class="mt-2 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror
</div><!-- EUIKit select input -->
