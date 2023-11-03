@props(['type' => 'info', 'label' => ''])
<div {{ $attributes->merge(['class' => 'bg-transparent'])}}>
{{-- Yeah, this is sub-optimal. But the colors need to be hard-coded for vite to pick them up. --}}
    <div @class([
        'bg-yellow-100 border-yellow-300' => $type == 'warning',
        'bg-green-100 border-green-300' => $type == 'success',
        'bg-red-100 border-red-300' => $type == 'error',
        'bg-blue-100 border-blue-300' => $type == 'primary',
        'bg-slate-100 border-slate-300' => $type == 'info',

        'p-4 rounded-t-xl border'
    ])>
        <p @class([
            'text-yellow-500' => $type == 'warning',
            'text-green-500' => $type == 'success',
            'text-red-500' => $type == 'error',
            'text-blue-500' => $type == 'primary',
            'text-slate-500' => $type == 'info',

            'text-sm font-medium'
        ])>
            {{ $label }}
        </p>
    </div>
    <div @class([
        'bg-yellow-50 border-yellow-300' => $type == 'warning',
        'bg-green-50 border-green-300' => $type == 'success',
        'bg-red-50 border-red-300' => $type == 'error',
        'bg-blue-50 border-blue-300' => $type == 'primary',
        'bg-slate-50 border-slate-300' => $type == 'info',

        'pl-4 pb-4 pt-2 rounded-b-xl border-b border-l border-r'
    ])>
        <p @class([
            'text-yellow-500' => $type == 'warning',
            'text-green-500' => $type == 'success',
            'text-red-500' => $type == 'error',
            'text-blue-500' => $type == 'primary',
            'text-slate-500' => $type == 'info',

            'mt-1 text-2xl font-semibold tracking-tight'
        ])>
            {{ $slot }}
        </p>
    </div>
</div><!-- EUIKit Metric Component -->