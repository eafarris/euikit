<div {{ $attributes->merge(['class' => 'field']) }}>
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-500 dark:text-slate-300 bg-transparent">{{ $label }}</label>
    <div class="control mt-1">
        <div class="select">
            <select
              name="{{ $name }}"
              class="w-full appearance-none block text-slate-500 dark:text-slate-700 dark:bg-slate-400 border border-slate-200 rounded leading-tight focus:outline-none focus:bg-white focus:border-slate-500"
            >
            <option value="">Select {{ $label }}</option>
            @foreach ($models as $model)
                <option value="{{ $model->id }}" {{ $value == $model->id ? "selected" : "" }}>{{ $model->$optionfield }}</option>
            @endforeach
            </select>
        </div>
    </div>
</div><!-- EUIKit Form Lookup component -->