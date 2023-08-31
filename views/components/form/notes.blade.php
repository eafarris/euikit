@props(['model' => ''])
<div {{ $attributes->merge(['class' => 'field']) }}>
    <label for="notes" class="block text-sm font-medium text-slate-500 bg-transparent">
        Notes
    </label>
    <div class="mt-1">
        <textarea 
        class="appearance-none block text-slate-700 border border-slate-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-slate-500 {{ $errors->has('notes') ? 'is-danger' : ''}} "
        cols="60" rows="10" name="notes" id="notes">
{{ $model == '' ? '' : $model->notes }}
        </textarea>
    </div>
</div><!-- EUIKit Notes field -->