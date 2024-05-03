@props(['nolabel' => FALSE, 'lefticon' => '', 'righticon' => '',
    'help' => '', 'helptype' => 'ghost',
])
@php
    $common_classes = 'rounded shadow-sm sm:text-sm border leading-tight appearance-none placeholder:italic';
    $color_classes = 'border-slate-300 dark:bg-slate-400 dark:text-slate-700 focus:border-sky-300 focus:ring-sky-300 placeholder:text-slate-400';
    $error_classes = 'border-red-500 text-red-500';
@endphp

<div>
    @unless($nolabel)
        <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 dark:text-slate-300 bg-transparent">
            {{ $label ?: ucfirst($field) }}
        </label>
    @endunless
    @foreach ($items as $index => $item)
    <div class="relative">
        <input type="text" disabled value="{{ $item }}"
            class="rounded-md shadow-sm sm:text-sm border-slate-300 "
        />
        <button wire:click.prevent="remove({{ $index }})">
            @svg('heroicon-o-minus', 'w-6 h-6 text-slate-400')
        </button>
    </div>
    @endforeach
    <div class="mt-1 flex items-center" id="{{ $field}}">
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
    </div><!-- field -->
    @isset($help)
        <x-e::help type="{{ $helptype }}">{{ $help }}</x-e::help>
    @endisset
</div><!-- EUIKit Textlist component -->
