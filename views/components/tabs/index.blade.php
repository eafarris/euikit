@props(['default'])
<div x-data="{ tab: window.location.hash ? window.location.hash.substring(1) : '{{ $default }}' }">
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select a tab</label>
        <select name="tabs" id="tabs"
            x-model="tab"
            class="block w-full rounded-md border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
        </select>
    </div>
    <div class="hidden sm:block">
        <div class="border-b-2 border-slate-300">
            <nav class="-mb-[2px] flex space-x-8">
                {{ $slot }}
            </nav>
        </div>
    </div>
    <div class="mt-8" id="tabs-content" x-cloak>
    </div>
</div>