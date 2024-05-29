{{--
     This component is used internally and isn't meant to be used outside of the EUIKit components.
     You do you, though.
 --}}
 @props(['lefticon' => '', 'righticon' => ''])

 <div {{ $attributes->merge(['class' => 'py-3 px-6 rounded-lg border-2 border-slate-300 bg-slate-50/50 text-slate-500 dark:border-slate-700 dark:bg-slate-500 dark:text-slate-300']) }}>
    <div class="flex flex-row gap-4 grow-0 shrink items-center justify-between text-xl">
        @if($lefticon)
            @svg($lefticon, 'w-8 h-8 mr-4')
        @endif
        {{ $slot }}
        @if($righticon)
            @svg($righticon, 'w-8 h-8 ml-4')
        @endif
    </div>
</div>
