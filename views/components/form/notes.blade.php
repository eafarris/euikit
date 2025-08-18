@props(['model' => '', 'label' => '',
    'help' => '', 'helptype' => 'ghost',
])

@php
    $common_classes = 'resize-none appearance-none block border rounded-sm py-3 p-4 mb-3 leading-tight';
    $color_classes = 'border-slate-300 text-slate-500 bg-white/50 focus:border-sky-300 focus:ring-sky-300 placeholder:text-slate-400 ';
    $color_classes .= 'dark:border-slate-400 dark:bg-slate-700 dark:text-slate-300 dark:placeholder:text-slate-400 dark:focus:border-sky-600 dark:focus:ring-sky-600';
    $error_classes = 'border-red-500 text-red-900';
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
        <x-euikit::help type="{{ $helptype }}">{{ $help }}</x-euikit::help>
    @endisset
    @error('notes')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p><!-- .mt-2 text-sm text-red-600 -->
    @enderror
</div><!-- EUIKit Notes field -->
