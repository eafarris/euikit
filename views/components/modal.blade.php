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
    <div class="fixed inset-0 backdrop-blur-sm backdrop-brightness-95 m-auto"
        @click="show = false"
    >
    </div><!-- backdrop -->
    <div class="bg-white shadow-2xl p-4 m-auto max-w-[50%] max-h-[50%] rounded-md fixed inset-0">
        <div class="flex flex-col h-full justify-between"
        >
            <header class="text-2xl">
                {{ $header }}
            </header>
            <div>
                {{ $slot }}
            </div>
            <footer class="border-slate-400 bg-slate-50 border-t-2 p-4 -mx-4">
                {{ $footer }}
            </footer>
        </div>
    </div>
</div>