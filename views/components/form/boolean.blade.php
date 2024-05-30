@props(['field', 'label' => '', 'value' => '', 'type' => 'radio',
    'help' => '', 'helptype' => 'ghost',
])

@php // "field" is optional if wire:model exists
if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
    $field = $attributes->whereStartsWith('wire:model')->first();
}
@endphp

<div @class(['field', 'p-4', 'flex items-center gap-4']) {{ $attributes->whereDoesntStartWith('wire') }}>
    @if ($type == 'radio')
        <label for="{{ $field }}" class="block text-sm mb-2 font-medium text-slate-500 bg-transparent">{{ $label == '' ? ucfirst($field) : $label }}</label>
        <div class="flex items-center gap-4">
            <div class="flex">
                <input class="h-4 w-4 border-slate-300 text-slate-500 focus:ring-2 focus:ring-sky-300" type="radio" name="{{ $field }}" id="{{ $field }}_yes" value="1" {{ $value ? 'checked' : '' }} {{ $attributes->whereStartsWith('wire') }}>
                <label for="{{ $field}}_yes" class="text-sm font-medium text-slate-500 ml-2 block">Yes</label>
            </div>
            <div class="flex">
                <input class="h-4 w-4 border-slate-300 text-slate-500 focus:ring-2 focus:ring-sky-300" type="radio" name="{{ $field }}" id="{{ $field }}_no" value="0" {{ $value ? '' : 'checked' }} {{ $attributes->whereStartsWith('wire')}}>
                <label for="{ $field}}_no" class="text-sm font-medium text-slate-500 ml-2 block">No</label>
            </div>
        </div>
    @else
        <div class="p-4 block text-sm font-medium text-slate-500 bg-transparent">
        <input type="checkbox" name="{{ $field }}"
            {{ $attributes->whereStartsWith('wire') }}
            class="h-6 w-6 rounded border-slate-300 text-slate-500 focus:ring-sky-300 mr-2"
            @if ($value) checked @endif
        /> {{ $label == '' ? ucfirst($field) : $label }}
        </div>
    @endif
    @isset($help)
        <x-e::help type="{{ $helptype }}">{{ $help }}</x-e::help>
    @endisset
</div><!-- EUIKit Boolean field -->
