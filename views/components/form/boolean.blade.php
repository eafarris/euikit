@props(['field', 'label' => '', 'value' => ''])

<div class="field">
    <label for="{{ $field }}" class="block text-sm font-medium text-gray-700 bg-transparent">{{ $label == '' ? ucfirst($field) : $label }}</label>
    <div class="flex mt-1">
        <div class="flex items-center mb-4 mr-3">
            <input class="h-4 w-4 border-slate-300 focus:ring-2 focus:ring-indigo-500" type="radio" name="{{ $field }}" id="{{ $field }}_yes" value="1" {{ $value ? 'checked' : '' }}>
            <label for="{{ $field}}_yes" class="text-sm font-medium text-slate-900 ml-2 block">Yes</label>
        </div>
        <div class="flex items-center mb-4">
            <input class="h-4 w-4 border-slate-300 focus:ring-2 focus:ring-indigo-500" type="radio" name="{{ $field }}" id="{{ $field }}_no" value="0" {{ $value ? '' : 'checked' }}>
            <label for="{{ $field}}_no" class="text-sm font-medium text-slate-900 ml-2 block">No</label>
        </div>
    </div><!-- .flex -->
</div><!-- EUIKit Boolean field -->