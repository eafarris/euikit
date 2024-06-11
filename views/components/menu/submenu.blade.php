<div class="flex flex-col mt-4">
    <div {{ $attributes->merge(['class' => 'uppercase tracking-wide font-bold text-slate-400 sm:text-sm']) }}>
        @isset($title)
            {{ $title }}
        @else
            general
        @endisset
    </div>
    <div class="ml-0 flex flex-col">
        {{ $slot }}
    </div>
</div>
