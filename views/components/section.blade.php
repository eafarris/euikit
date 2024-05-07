@props(['header' => '', 'footer' => '',
    'leftheadericon' => '', 'rightheadericon' => '',
    'leftfootericon' => '', 'rightfootericon' => '',
])
<section {{ $attributes->merge(['class' => 'min-w-fit m-12 border-slate-300 bg-gradient-to-br from-slate-100 via-slate-200 via-10% to-80% to-slate-100 dark:border-slate-900 dark:from-slate-600 dark:to-slate-700 border-2 p-6 rounded-lg shadow-2xl']) }}>
@if($header)
<div class="py-3 px-6 border-2 border-slate-300 bg-slate-50/50 text-slate-500 dark:border-slate-700 dark:bg-slate-500 dark:text-slate-300 rounded-lg">
    <div class="flex flex-row gap-1 grow-0 shrink items-center justify-items-center text-2xl">
        @if($leftheadericon)
            @svg($leftheadericon, 'w-8 h-8 mr-4')
        @endif
        {{ $header }}
        @if($rightheadericon)
            <div class="w-fit flex grow justify-end">
                @svg($rightheadericon, 'w-8 h-8 ml-4')
            </div>
        @endif
    </div>
</div>
@endif

<div class="text-lg text-slate-700 dark:text-slate-300">
    {{ $slot }}
</div>

@if($footer)
<div class="mt-8 py-3 px-6 border-2 border-slate-300 bg-slate-50/50 text-slate-500 dark:border-slate-700 dark:bg-slate-500 dark:text-slate-300 rounded-lg">
    <div class="flex flex-row items-center justify-between">
        @if($leftfootericon)
            @svg($leftfootericon, 'w-8 h-8 mr-4')
        @endif
        {{ $footer }}
        @if($rightfootericon)
            @svg($rightfootericon, 'w-8 h-8 ml-4')
        @endif
    </div>
</div>
@endif
</section><!-- EUIKit Section component -->
