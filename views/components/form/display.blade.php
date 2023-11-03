@props(['label' => '', 'field', 'type' => 'text', 'value'])
<div class="field" id="{{ $field }}">
    <label for="{{ $field }}" class="field-label">
    {{ $label ?: ucfirst($field) }}
    </label>
    <div class="mt-1 border-none">
        @switch($type)
        @case('lookup') 
            <input disabled type="text"
                id="{{ $field }}"
                name="{{ $field }}"
                value="{{ $value }}"
                class="text-slate-700 block w-full rounded-md border border-slate-300 sm:text-sm {{ $errors->has($field) ? 'is-danger' : ''}}"
            />
            @break
        @case('date')
            <input disabled type="date"
                id="{{ $field }}"
                name="{{ $field }}"
                value="{{ $value }}"
                class="text-slate-700 block w-full rounded-md border border-slate-300 sm:text-sm {{ $errors->has($field) ? 'is-danger' : ''}} "
            />
            @break
        @case('boolean')
            <input disabled type="text"
                id="{{ $field }}"
                name="{{ $field }}"
                value="{{ $field ? 'Yes' : 'No' }}"
                class="text-slate-700 block w-full rounded-md border border-slate-300 sm:text-sm {{ $errors->has($field) ? ' is-danger' : '' }}"
            />
            @break
        @case('text')
        @default
            <input disabled type="text" 
                id="{{ $field }}"   
                name="{{ $field }}"
                value="{{ $value }}"
                class="text-slate-700 block w-full rounded-md border border-slate-300 sm:text-sm {{ $errors->has($field) ? 'is-danger' : ''}} "
            />
        @endswitch
    </div>
</div><!-- InsideUIKit Display Field component-->