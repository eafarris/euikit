@props(['field', 'multi' => false])
<div>
            <select
                @if ($multi) multiple @endif
              name="{{ $field }}"
              {{ $attributes->merge(['class' => 'appearance-none block text-slate-700 border border-slate-200 rounded-sm leading-tight focus:outline-hidden focus:bg-white focus:border-slate-500']) }}
            @unless ($multi)
            @endunless
                {{ $slot }}
            </select>
    @error($field)
        <p class="is-danger">
            {{ $message }}
        </p>
    @enderror
</div><!-- EUIKit select input -->
