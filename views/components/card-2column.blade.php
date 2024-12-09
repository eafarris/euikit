<section {{ $attributes->merge(['class' => "bg-white text-slate-800 dark:bg-slate-500 dark:text-slate-300 px-4 py-5 shadow sm:rounded-lg sm:p-6"]) }}>
<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1 text-slate-500 dark:text-slate-300">
        {{ $left }}
    </div>
    <div class="mt-5 space-y-6 md:col-span-2 md:mt-0">
        {{ $right }}
    </div>
</div>
</section>
