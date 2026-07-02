@props(['field', 'label' => '', 'value' => '', 'required' => FALSE,
    'help' => '', 'helptype' => 'ghost',
])
@php
if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
    $field = $attributes->whereStartsWith('wire:model')->first();
}
@endphp
<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }} id="{{ $field }}">
    <label class="flex flex-col items-start gap-4 p-4
        text-sm text-slate-500 dark:text-slate-300
        bg-transparent rounded-lg border border-transparent
        has-checked:bg-sky-50 has-checked:border-sky-500 has-checked:text-sky-700
    ">
        <div class="flex items-center gap-4">
        <input type="checkbox" name="{{ $field }}" @if($required) required @endif
            class="h-4 w-4 rounded-xs border-slate-300 text-slate-500 focus:ring-sky-300"
            {{ $attributes->whereStartsWith('wire') }}
            value="{{ $value ?? 1 }}"
        >
        {{ $label ?: ucfirst($field)}}
        </div>
        @isset($help)
            <x-euikit::help type="{{ $helptype }}">{{ $help }}</x-euikit::help>
        @endisset
        @error($field)
            <p class="place-self-start">
                <x-euikit::message type="error">{{ $message }}</x-euikit::message>
            </p>
        @enderror
    </label>
</div>
