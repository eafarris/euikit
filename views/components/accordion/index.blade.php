@props([''])
<div x-data="{ fold: ''}" class="my-4">
    <div class="sm:hidden">
        <label for="folds" class="sr-only">Select an accordion fold</label>
        <select name="folds" id="folds"
            x-model="fold"
            class="block w-full rounded-md border-slate-300 focus:border-sky-300 focus:ring-sky-300"
        >
        </select>
    </div>
    <div class="hidden sm:block">
        <div class="">
            <nav class="">
                {{ $slot}}
            </nav>
        </div>
</div>
