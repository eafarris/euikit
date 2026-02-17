<section {{ $attributes->merge(['class' => "bg-linear-to-br from-white/20 via-slate-50 to-white/80
    dark:bg-slate-500
    text-slate-800 dark:text-slate-300
    border border-slate-200
    px-4 py-5 shadow-sm sm:rounded-lg sm:mt-4 sm:p-6"]) }}>
<div class="">
    {{ $slot }}
</div>
</section>
