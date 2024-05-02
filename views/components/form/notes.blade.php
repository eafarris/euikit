@props(['model' => '', 'label' => '', 'help' => ''])

@php
    $common_classes = 'resize-none appearance-none block border rounded py-3 px-4 mb-3 leading-tight';
    $color_classes = 'text-slate-700 dark:bg-slate-400 dark:text-slate-700 border-slate-200 focus:bg-white focus:ring-sky-300 focus:outline-sky-300';
    $error_classes = 'text-red-500 border-red-500';
@endphp

<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field']) }}>
    <label for="notes" class="block text-sm font-medium text-slate-500 dark:text-slate-300 bg-transparent">
        @empty($label)
            Notes <span class="italic">(<a href="https://www.markdownguide.org/cheat-sheet/" class="underline-offset-2 underline">Markdown</a> supported)</span>
        @else
            {{ $label }}
        @endempty
    </label>
    <div class="mt-1">
    @if (!$attributes->whereStartsWith('wire'))
<textarea
    @class([$common_classes,
        $color_classes => ! $errors->has('notes'),
        $error_classes => $errors->has('notes'),
    ])
    cols="60" rows="10" name="notes" id="notes"
>
{{ $model == '' ?: $model->notes }}
</textarea>
@else
<textarea
    @class([$common_classes,
        $color_classes => ! $errors->has('notes'),
        $error_classes => $errors->has('notes'),
    ])
    cols="60" rows="10" name="notes" id="notes"
    {{ $attributes->whereStartsWith('wire') }}
>
</textarea>
@endif
    </div>
    @isset($help)
        <x-e::help>{{ $help }}</x-e::help>
    @endisset
    @error('notes')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p><!-- .mt-2 text-sm text-red-600 -->
    @enderror
</div><!-- EUIKit Notes field -->
