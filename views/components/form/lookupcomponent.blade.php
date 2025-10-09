 @props(['field', 'label' => '', 'nolabel' => FALSE, 'value' => '', 'any' => FALSE, 'none' => FALSE, 'noplaceholder' => FALSE, 'placeholder' => '', 'multi' => FALSE,
    'help' => '', 'helptype' => 'ghost',
])

@php
    if ($multi) {
        $field = $field . '[]';
    }
@endphp

<x-euikit::form.select {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'lookup']) }}
    field="{{ $field }}" label="{{ $label }}" nolabel="{{ $nolabel }}" value="{{ $value }}"
    any="{{ $any }}" none="{{ $none }}" anyvalue="{{ $anyvalue }}" nonevalue="{{ $nonevalue }}"
    noplaceholder="{{ $noplaceholder }}" multi="{{ $multi }}"
    help="{{ $help }}" helptype="{{ $helptype }}"
>
    @if ($any)
        <option value="{{ $anyvalue }}">Any</option>
    @endif
    @if ($none)
        <option value="{{ $nonevalue }}">None</option>
    @endif
    @foreach ($models as $model)
        <option value="{{ $model->$optionvalue }}" {{ $value == $model->$optionvalue ? "selected" : ''}}>{{ $model->$optionfield }}</option>
    @endforeach
</x-euikit::form.select>
