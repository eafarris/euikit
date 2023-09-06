@props(['header' => '', 'footer' => ''])
<section class="min-w-fit m-12 space-y-6 border-slate-300 bg-gradient-to-br from-slate-100 via-slate-200 via-20% to-slate-100 dark:border-slate-900 dark:from-slate-600 dark:to-slate-700 border-2 p-6 rounded-lg shadow-2xl"><!-- EUIKit Section component -->
@if($header)
<div class="py-3 px-6 border-2 border-slate-300 bg-slate-200 text-slate-500 dark:border-slate-700 dark:bg-slate-500 dark:text-slate-300 rounded-lg">
    <div class="flex flex-row items-center justify-between text-2xl">
        {{ $header }}
    </div>
</div>
@endif

<div class="text-lg text-slate-700 dark:text-slate-300">
    {{ $slot }}
</div>

@if($footer)
<div class="py-3 px-6 border-2 border-slate-300 bg-slate-200 text-slate-500 dark:border-slate-700 dark:bg-slate-500 dark:text-slate-300 rounded-lg">
    <div class="flex flex-row items-center justify-between">
        {{ $footer }}
    </div>
</div>
@endif
</section><!-- EUIKit Section component -->