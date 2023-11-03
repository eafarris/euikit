@props(['field', 'label' => '', 'multi' => false])
<div {{ $attributes->merge(['class' => 'field']) }}>
    <label for="{{ $field }}" class="block text-sm font-medium text-slate-500 bg-transparent">{{ $label ?: ucfirst($field) }}</label>
    <div class="control mt-1">
        <div class="select">
            <select 
                @if ($multi) multiple @endif
              name="{{ $field }}"
              class="appearance-none block text-slate-700 border border-slate-200 rounded leading-tight focus:outline-none focus:bg-white focus:border-slate-500"
            >
            @unless ($multi)
            <option value="">Select {{ $label ?: ucfirst($field) }}</option>
            @endunless
                {{ $slot }}
            </select>
        </div>
    </div>
    @error($field)
        <p class="is-danger">
            {{ $message }}
        </p>
    @enderror
</div><!-- EUIKit select input -->