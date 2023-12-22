@props(['name'])
<div id="{{ $name }}"
    style="display:none"
    x-data="{ show: false, name: '{{ $name }}' }"
    x-show="show" 
    @keydown.escape.window="show=false"
    @modal.window="
        show = ($event.detail === name);
    "
>
    <div class="fixed inset-0 backdrop-blur-sm backdrop-brightness-75 m-auto"
        @click="show = false"
    >
    </div><!-- backdrop -->
    <div {{ $attributes->merge(['class' => "bg-slate-50/70 shadow-2xl p-4 m-auto w-fit h-fit fixed inset-0 border-slate-300 bg-gradient-to-br from-transparent via-slate-200 to-80% to-slate-100/50 dark:border-slate-900 dark:from-slate-600 dark:to-slate-700 border-2 rounded-2xl"]) }} >
        <div class="flex flex-col h-full justify-between">
            @if ($header)
                <header class="py-3 px-6 border-2 border-slate-300 bg-slate-50/30 text-slate-500 text-2xl rounded-lg">
                    {{ $header }}
                </header>
            @endif
            <div>
                {{ $slot }}
            </div>
            @if ($footer)
                <footer class="mt-8 py-3 px-6 border-2 border-slate-300 bg-transparent text-slate-500 rounded-lg">
                    {{ $footer }}
                </footer>
            @endif
        </div>
    </div>
</div>