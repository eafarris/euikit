@props(['label' => '', 'value' => ''])
<div {{ $attributes->merge(['class' => 'bg-transparent'])}}><!-- EUIKit metric component -->
    <div class="bg-slate-100 p-4 rounded-t-xl border-slate-300 border">
        <p class="text-sm font-medium text-slate-500">
            {{ $label }}
        </p>
    </div><!-- .bg-slate-100 -->
    <div class="bg-slate-50 pl-4 pb-4 pt-2 rounded-b-xl border-slate-300 border-b border-l border-r">
        <p class="mt-1 text-2xl font-semibold tracking-tight text-slate-500">
            {{ $value }}
        </p>
    </div><!-- .bg-slate-100 p-4 rounded-b-xl border-slate-300 border -->
</div>