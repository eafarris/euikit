@php
    $color_classes = 'border-slate-300 focus:border-indigo-500 focus:ring-indigo-500';
    $error_classes = 'border-red-500 text-red-500';

@endphp
<div>
    @unless($nolabel)
        <label for="{{ $field }}" class="block text-sm font-medium text-slate-700 bg-transparent {{ $errors->has($field) ? 'has-text-danger' : ''}}">
            {{ $label ?: ucfirst($field) }}
        </label>
    @endunless
    @foreach ($items as $index => $item)
    <div class="block">
        <input type="hidden" value="{{ $item }}" name="{{ $field }}[{{ $index }}]" />
        <input type="text" class="input" disabled value="{{ $item }}" name="{{ $field}}[{{ $index }}]" />
        <button wire:click.prevent="remove()">
            @svg('heroicon-o-minus', 'w-6 h-6')
        </button>
    </div>
    @endforeach
    <div class="mt-1 id="{{ $field}}">
        <input type="text"
        class="{{ $errors->has($field) ? 'is-danger' : ''}}"
        placeholder="{{ $placeholder ?: $label ?: ucfirst($field) }}"
        wire:model.debounce.10ms="newitem"
        wire:keydown.prevent.enter="add('{{ $newitem }}')"
        @if ($required) required @endif
        />
        <button wire:click.prevent="add('{{ $newitem }}')" class="button is-primary">
            @svg('heroicon-o-plus', 'w-6 h-6')
        </button>
    </div><!-- field -->
    <pre>@php print_r($items) @endphp</pre>
</div><!-- EUIKit Textlist component -->
