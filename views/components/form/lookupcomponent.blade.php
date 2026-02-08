 @props(['field', 'label' => '', 'nolabel' => FALSE, 'value' => '', 'any' => FALSE, 'anyvalue' => 'all',
    'none' => FALSE, 'nonevalue' => 0,
    'noplaceholder' => FALSE, 'placeholder' => '', 'multi' => FALSE,
    'help' => '', 'helptype' => 'ghost',
])

<x-euikit::form.select {{ $attributes }}
    field="{{ $field }}" label="{{ $label }}" nolabel="{{ $nolabel }}" value="{{ $value }}"
    any="{{ $any }}" none="{{ $none }}" anyvalue="{{ $anyvalue }}" nonevalue="{{ $nonevalue }}"
    noplaceholder="{{ $noplaceholder }}" multi="{{ $multi }}"
    help="{{ $help }}" helptype="{{ $helptype }}"
>
    @foreach ($models as $model)
        @php
            $isSelected = $multi
                ? (is_iterable($value) ? collect($value)->contains($model->$optionvalue) : false)
                : $value == $model->$optionvalue;
        @endphp
        <option value="{{ $model->$optionvalue }}" {{ $isSelected ? "selected" : ''}}>{{ $model->$optionfield }}</option>
    @endforeach
</x-euikit::form.select>
