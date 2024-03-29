@props(['type' => '', 'label' => '', 'field', 'value' => '', 'placeholder' => '',
    'lefticon' => '', 'righticon' => '',
    'required' => FALSE, 'nolabel' => FALSE, 'noplaceholder' => FALSE])

@php
    
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

if ($type == 'search' && $lefticon == '') {
    $lefticon = 'heroicon-o-magnifying-glass';
}

$color_classes = 'border-slate-300 dark:bg-slate-400 dark:text-slate-700 focus:border-indigo-500 focus:ring-indigo-500';
$error_classes = 'border-red-500 text-red-900';
@endphp

<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }} id="{{ $field }}">
@unless ($nolabel)
    <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 dark:text-slate-300 bg-transparent">
    {{ $label ?: ucfirst($field) }}
    </label>
@endunless
    <div class="relative mt-1">
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
            @class(["block w-full rounded-md shadow-sm sm:text-sm",
                "placeholder:italic placeholder:text-slate-400",
                $errors->has($field) ? $error_classes : $color_classes,
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

    @error($field)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div><!-- EUIKit text input-->
