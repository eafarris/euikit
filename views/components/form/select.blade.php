@props(['field', 'label' => '', 'nolabel' => FALSE, 'value' => '', 'noplaceholder' => FALSE, 'placeholder' => '', 'multi' => FALSE,
    'any' => FALSE, 'anyvalue' => 0, 'none' => FALSE, 'nonevalue' => 0,
    'help' => '', 'helptype' => 'ghost',
])
@php
    // "field" is optional if wire:model exists
    if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
        $field = $attributes->whereStartsWith('wire:model')->first();
    }

    $common_classes = 'block p-2 pr-8 w-full rounded-xs shadow-2xs sm:text-sm border leading-tight appearance-none';
    $color_classes = 'border-slate-300 text-slate-500 bg-transparent focus:border-sky-300 focus:ring-sky-300 placeholder:text-slate-400 ';
    $color_classes .= 'dark:border-slate-400 dark:bg-slate-700 dark:text-slate-300 dark:placeholder:text-slate-400 dark:focus:border-sky-600 dark:focus:ring-sky-600';
    $error_classes = 'border-red-500 text-red-900';
@endphp

<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }}>
    @unless($nolabel)
        <label for="{{ $field }}" class="block text-sm mb-2 font-medium text-slate-500 dark:text-slate-300 bg-transparent">
            {{ $label ?: ucfirst($field) }}
        </label>
    @endunless
    <div class="relative mt-1">
        <div class="select">
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
                @svg('heroicon-o-chevron-down', 'w-5 h-5 text-slate-400')
            </div>
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
            @unless ($noplaceholder)
            <option disabled value="">@if ($placeholder) {{ $placeholder }} @else Select {{ $label ?: ucfirst($field) }} @endif
                @endunless
                @endunless
                @if($any)
                <option value="{{ $anyvalue }}">Any</option>
                @endif
                @if($none)
                <option value="{{ $nonevalue }}">None</option>
                @endif
                {{ $slot }}
            </select>
        </div>
        @isset($help)
            <x-euikit::help>{{ $help }}</x-euikit::help>
        @endisset
    </div>
    @error($field)
        <p class="mt-2 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror
</div><!-- EUIKit select input -->
