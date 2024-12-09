@props(['field', 'type' => '', 'label' => '', 'value' => '', 'placeholder' => '',
    'lefticon' => '', 'righticon' => '',
    'required' => FALSE, 'nolabel' => FALSE, 'noplaceholder' => FALSE,
    'help' => '', 'helptype' => 'ghost',
])

@php
    // "field" is optional if wire:model exists
    if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
        $field = $attributes->whereStartsWith('wire:model')->first();
    }
switch ($field) {
    case 'pass':
    case 'password':
        $autotype = 'password';
        break;
    case 'email':
        $autotype = 'email';
        break;
    case 'url':
        $autotype = 'url';
        break;
    case 'search':
    case 'q':
        $autotype = 'search';
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

if ($type == 'search') {
    $lefticon = $lefticon ?: 'heroicon-o-magnifying-glass' ;
    if ($lefticon == 'none') {
        $lefticon ='';
    }
}

$common_classes = 'w-full rounded shadow-sm sm:text-sm border leading-tight appearance-none placeholder:italic';
$color_classes = 'border-slate-300 text-slate-500 bg-transparent focus:border-sky-300 focus:ring-sky-300 placeholder:text-slate-400 ';
$color_classes .= 'dark:border-slate-400 dark:bg-slate-700 dark:text-slate-300 dark:placeholder:text-slate-400 dark:focus:border-sky-600 dark:focus:ring-sky-600';
$error_classes = 'border-red-500 text-red-500';
@endphp

<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }} id="{{ $field }}">
@unless ($nolabel)
    <label for="{{ $field }}" class="block mb-2 text-sm font-medium text-slate-500 dark:text-slate-300 bg-transparent">
        {{ $label ?: ucfirst($field) }}
    </label>
@endunless
    <div class="relative block">
        @if ($lefticon)
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                @svg($lefticon, 'w-5 h-5 text-slate-400')
            </div>
        @endif
        <input type="{{ $type }}"
            id="{{ $field }}"
            name="{{ $field }}"
            value="{{ @old($field, $value) }}"
            @unless ($noplaceholder)
            placeholder="{{ $placeholder ?: $label ?: ucfirst($field) }}"
            @endunless
            @class([$common_classes,
                $color_classes => ! $errors->has($field),
                $error_classes => $errors->has($field),
                "pl-10" => $lefticon,
                "pr-10" => $righticon,
            ])
            @if ($required) required @endif
            {{ $attributes->whereStartsWith('wire') }}
            {{ $attributes->merge(['list' => '']) }}
        />
        @if ($righticon)
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                @svg($righticon, 'w-5 h-5 text-slate-400')
            </div>
        @endif
    </div>

    @isset($help)
        <x-e::help type="{{ $helptype }}">{{ $help }}</x-e::help>
    @endisset

    @error($field)
        <x-e::message type="error">{{ $message }}</x-e::message>
    @enderror
</div><!-- EUIKit text input-->
