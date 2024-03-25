@props(['model' => '', 'label' => ''])

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
    class="resize-none appearance-none block text-slate-700 dark:bg-slate-400 dark:text-slate-700 border border-slate-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-slate-500 {{ $errors->has('notes') ? 'is-danger' : ''}} "
    cols="60" rows="10" name="notes" id="notes"
>
{{ $model == '' ?: $model->notes }}
</textarea>
@else
<textarea 
    class="resize-none appearance-none block text-slate-700 dark:bg-slate-400 dark:text-slate-700 border border-slate-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-slate-500 {{ $errors->has('notes') ? 'is-danger' : ''}} "
    cols="60" rows="10" name="notes" id="notes"
    {{ $attributes->whereStartsWith('wire') }}
>
</textarea>
@endif
    </div>
    @error('notes')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p><!-- .mt-2 text-sm text-red-600 -->
    @enderror
</div><!-- EUIKit Notes field -->