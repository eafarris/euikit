@props(['field', 'label' => '', 'value' => '', 'type' => 'radio'])

@php // "field" is optional if wire:model exists
if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
    $field = $attributes->whereStartsWith('wire:model')->first();
}
@endphp

<div @class(['field']) {{ $attributes->whereDoesntStartWith('wire') }}>
    @if ($type == 'radio')
        <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 bg-transparent">{{ $label == '' ? ucfirst($field) : $label }}</label>
        <div class="flex mt-1">
            <div class="flex items-center mb-4 mr-3">
                <input class="h-4 w-4 border-slate-300 focus:ring-2 focus:ring-sky-300" type="radio" name="{{ $field }}" id="{{ $field }}_yes" value="1" {{ $value ? 'checked' : '' }} {{ $attributes->whereStartsWith('wire') }}>
                <label for="{{ $field}}_yes" class="text-sm font-medium text-slate-500 ml-2 block">Yes</label>
            </div>
            <div class="flex items-center mb-4">
                <input class="h-4 w-4 border-slate-300 focus:ring-2 focus:ring-sky-300" type="radio" name="{{ $field }}" id="{{ $field }}_no" value="0" {{ $value ? '' : 'checked' }} {{ $attributes->whereStartsWith('wire')}}>
                <label for="{{ $field}}_no" class="text-sm font-medium text-slate-500 ml-2 block">No</label>
            </div>
        </div>
    @else
        <div class="p-4 block text-sm font-medium text-slate-500 bg-transparent">
        <input type="checkbox" name="{{ $field }}" 
            {{ $attributes->whereStartsWith('wire') }}
            class="h-6 w-6 rounded border-slate-300 text-slate-500 focus:ring-blue-600 mr-2"
        /> {{ $label == '' ? ucfirst($field) : $label }}
        </div>
    @endif
</div><!-- EUIKit Boolean field -->