@props(['field', 'type' => 'text', 'label' => '', 'value' => '', 'placeholder' => '',
    'lefticon' => '', 'righticon' => '', 'required' => FALSE, 'nolabel' => FALSE,
    'help' => '', 'helptype' => 'ghost',
])
@php

    if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
        $field = $attributes->whereStartsWith('wire:model')->first();
    }

    $common_classes = 'w-full min-h-8 rounded-xs shadow-2xs sm:text-sm border leading-tight appearance-none placeholder:italic pl-2';
    $color_classes = 'border-slate-300 text-slate-500 focus:border-sky-300 focus:ring-sky-300 placeholder:text-slate-400 ';
    $color_classes .= 'dark:bg-slate-700 dark:text-slate-300 dark:placeholder:text-slate-400';
    $error_classes = 'border-red-500 text-red-500';
@endphp

<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }} id="{{ $field }}">
    @unless($nolabel)
        <label for="{{ $field }}" class="block mb-2 text-sm font-medium text-slate-400 dark:text-slate-300 bg-transparent">
            {{ $label ?: ucfirst($field) }}
        </label>
    @endunless
    <div class="relative block min-w-fit">
        @if($lefticon)
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                @svg($lefticon, 'w-5 h-5 text-slate-400')
            </div>
        @endif
        @switch($type)
        @case('lookup')
            <input disabled type="text"
                id="{{ $field }}"
                name="{{ $field }}"
                value="{{ $value }}"
                @class([$common_classes,
                    $color_classes => ! $errors->has($field),
                    $error_classes => $errors->has($field),
                    'pl-10' => $lefticon,
                    'pr-10' => $righticon,
                ])
                {{ $attributes->whereStartsWith('wire') }}
            />
            @break
        @case('date')
        @case('datetime')
            <input disabled type="date"
                id="{{ $field }}"
                name="{{ $field }}"
                value="{{ $value }}"
                @class([$common_classes,
                    $error_classes => $errors->has($field),
                    $color_classes => !$errors->has($field),
                    'pl-10' => $lefticon,
                    'pr-10' => $righticon,
                ])
                {{ $attributes->whereStartsWith('wire') }}
            />
            @break
        @case('boolean')
            <input disabled type="text"
                id="{{ $field }}"
                name="{{ $field }}"
                value="{{ $value ? 'Yes' : 'No' }}"
                @class([$common_classes,
                    $error_classes => $errors->has($field),
                    $color_classes => !$errors->has($field),
                    'pl-10' => $lefticon,
                    'pr-10' => $righticon,
                ])
                {{ $attributes->whereStartsWith('wire') }}
            />
            @break
        @case('text')
        @default
            <input disabled type="text"
                id="{{ $field }}"
                name="{{ $field }}"
                value="{{ $value }}"
                @class([$common_classes,
                    $error_classes => $errors->has($field),
                    $color_classes => !$errors->has($field),
                    'pl-10' => $lefticon,
                    'pr-10' => $righticon,
                ])
                {{ $attributes->whereStartsWith('wire') }}
            />
        @endswitch

        @if($righticon)
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                @svg($righticon, 'w-5 h-5 text-slate-400')
            </div>
        @endif
    </div>

    @isset($help)
        <x-euikit::help type="{{ $helptype }}">{{ $help }}</x-euikit::help>
    @endisset
</div><!-- EUIKit Display Field component-->
