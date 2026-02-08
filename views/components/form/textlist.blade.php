@props(['field', 'nolabel' => FALSE, 'lefticon' => '', 'righticon' => '',
    'help' => '', 'helptype' => 'ghost',
])

@php
    // "field" is optional if wire:model exists
    if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
        $field = $attributes->whereStartsWith('wire:model')->first();
    }
@endphp


@php
    $common_classes = 'w-full min-h-8 rounded-xs shadow-2xs sm:text-sm border leading-tight appearance-none placeholder:italic pl-2';
    $color_classes = 'border-slate-300 text-slate-600 bg-transparent focus:border-sky-300 focus:ring-sky-300 placeholder:text-slate-300';
    $color_classes .= 'dark:border-slate-400 dark:bg-slate-700 dark:text-slate-300 dark:placeholder:text-slate-400 dark:focus:border-sky-600 dark:focus:ring-sky-600';
    $error_classes = 'border-red-500 text-red-500';
@endphp

<div {{ $attributes->merge(['class' => 'field']) }}
    {{ $attributes->whereDoesntStartWith('wire') }}
>
    @unless($nolabel)
        <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 dark:text-slate-300 bg-transparent">
            {{ $label ?: ucfirst($field) }}
        </label>
    @endunless
    <div class="flex flex-col gap-2"><!-- items -->
        @foreach ($items as $index => $item)
        <div class="flex flex-row gap-2">
            <input type="text" disabled value="{{ $item }}"
                class="p-2 ml-2 rounded-xs shadow-2xs sm:text-sm border-slate-300 "
            />
            <button wire:click.prevent="remove({{ $index }})">
                @svg('heroicon-o-minus', 'w-6 h-6 text-slate-400')
            </button>
        </div><!-- existing entry -->
        @endforeach
        <div class="mt-1 flex items-center gap-2 " id="{{ $field}}">
            @if ($lefticon)
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    @svg($lefticon, 'w-5 h-5 text-slate-400')
                </div>
            @endif
            <input type="text"
                @class([$common_classes,
                    $color_classes => ! $errors->has($field),
                    $error_classes => $errors->has($field),
                    'pl-10' => $lefticon,
                    'pr-10' => $righticon,
                ])
                placeholder="{{ $placeholder ?: $label ?: ucfirst($field) }}"
                wire:model.debounce.10ms="newitem"
                wire:keydown.prevent.enter="add()"
                @if ($required)
                    required
                @endif
            />
            @if ($righticon)
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                    @svg($righticon, 'w-5 h-5 text-slate-400')
                </div>
            @endif
            <button wire:click.prevent="add('{{ $newitem }}')" class="button is-primary">
                @svg('heroicon-o-plus', 'w-6 h-6 text-slate-400')
            </button>
        </div><!-- text input for new entry -->
    </div><!-- items -->
    @isset($help)
        <x-euikit::help type="{{ $helptype }}">{{ $help }}</x-euikit::help>
    @endisset
</div><!-- EUIKit Textlist component -->
