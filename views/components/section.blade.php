@props(['header' => '', 'subheader' => '', 'footer' => ''])
<section {{ $attributes->merge(['class' => 'min-w-fit m-12 border-slate-300 bg-gradient-to-br from-slate-100 via-slate-200 via-10% to-80% to-slate-100 dark:border-slate-900 dark:from-slate-600 dark:to-slate-700 border-2 p-6 rounded-lg shadow-2xl']) }}>
@if($header)
<div class="py-3 px-6 border-2 border-slate-300 bg-slate-50/50 text-slate-500 dark:border-slate-700 dark:bg-slate-500 dark:text-slate-300 rounded-lg">
    <div class="flex flex-row items-center justify-between text-2xl">
        {{ $header }}
    </div>
</div>
@endif

@if($subheader)
<p class="pt-2 pl-1 text-sm text-slate-600 dark:text-slate-400 italic">{{ $subheader}}</p>
@endif

<div class="text-lg text-slate-700 dark:text-slate-300">
    {{ $slot }}
</div>

@if($footer)
<div class="py-3 px-6 border-2 border-slate-300 bg-slate-50/50 text-slate-500 dark:border-slate-700 dark:bg-slate-500 dark:text-slate-300 rounded-lg">
    <div class="flex flex-row items-center justify-between">
        {{ $footer }}
    </div>
</div>
@endif
</section><!-- EUIKit Section component -->