@props(['field', 'label' => '', 'value' => '', 'type' => 'radio',
    'choices' => 'yn', 'choicetrue' => '', 'choicefalse' => '',
    'help' => '', 'helptype' => 'ghost',
])

@php // "field" is optional if wire:model exists
if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
    $field = $attributes->whereStartsWith('wire:model')->first();
}

if ($choices) {
    switch ($choices) {
        case 'yn':
            $choicetrue = 'Yes';
            $choicefalse = 'No';
            break;
        case 'oo':
           $choicetrue = 'On';
            $choicefalse = 'Off';
            break;
        case 'tf':
            $choicetrue = 'True';
            $choicefalse = 'False';
            break;
    } // endswitch choices
}

$label_colors = 'bg-transparent text-slate-500 dark:text-slate-300 rounded-lg border border-transparent ';
$label_colors .= 'has-checked:bg-sky-50 has-checked:border-sky-500 has-checked:text-sky-700';
$choice_classes = 'text-sm font-medium ml-2 block ' . $label_colors;
$radio_classes = 'peer appearance-none col-start-1 row-start-1 size-4 rounded-full border-1 outline-1';
$radio_classes .= 'border-slate-400 bg-transparent ';
$radio_classes .= 'hover:border-slate-500 hover:bg-slate-100 ';
$radio_classes .= 'dark:border-slate-700 dark:text-slate-700';
$checked_classes = 'col-start-1 row-start-1 flex items-center rounded-full hidden peer-checked:block text-slate-400';
$error_classes = 'border-red-500 text-red-500'

@endphp

<div {{ $attributes->merge(['class' => 'field', 'p-4', 'flex items-center gap-4']) }} {{ $attributes->whereDoesntStartWith('wire') }}>
    @if ($type == 'radio')
        <label for="{{ $field }}" class="block text-sm mb-2 font-medium {{ $label_colors }}">{{ $label == '' ? ucfirst($field) : $label }}</label>
        <div class="flex items-center gap-4">
            <div class="flex items-center">
                <div class="grid place-items-center">
                    <input class="{{ $radio_classes }}"
                        type="radio" name="{{ $field }}" id="{{ $field }}_yes" value="1" {{ $value ? 'checked' : '' }} {{ $attributes->whereStartsWith('wire') }}>
                <div class="{{ $checked_classes }}">@svg('heroicon-s-check-circle', 'size-6')</div>
                </div>
                <label for="{{ $field}}_yes" class="{{ $choice_classes }}">{{ $choicetrue }}</label>
            </div>
            <div class="flex items-center">
                <div class="grid place-items-center">
                    <input class="{{ $radio_classes }}"
                        type="radio" name="{{ $field }}" id="{{ $field }}_no" value="0" {{ $value ? '' : 'checked' }} {{ $attributes->whereStartsWith('wire')}}>
                    <div class="{{ $checked_classes }}">@svg('heroicon-s-check-circle', 'size-6')</div>
                </div>
                <label for="{ $field}}_no" class="{{ $choice_classes }}">{{ $choicefalse }}</label>
            </div>
        </div>
    @else
        <label class="p-4 flex items-center text-sm font-medium {{ $label_colors }}">
            <input type="checkbox" name="{{ $field }}"
                {{ $attributes->whereStartsWith('wire') }}
                class="h-6 w-6 rounded-xs border-slate-300 text-slate-500 focus:ring-sky-300 mr-2"
                @if ($value) checked @endif
                @unless ($attributes->whereStartsWith('wire'))
                @endunless
            />
            {{ $label }}
        </label>
    @endif
    @isset($help)
        <x-euikit::help type="{{ $helptype }}">{{ $help }}</x-euikit::help>
    @endisset
    @error($field)
        <x-euikit::message type="error">{{ $message }}</x-euikit::message>
    @enderror

</div><!-- EUIKit Boolean field -->
