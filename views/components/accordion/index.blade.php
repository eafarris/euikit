@props([''])
<div x-data="{ fold: ''}" class="my-4">
    <div class="sm:hidden">
        <label for="folds" class="sr-only">Select an accordion fold</label>
        <select name="folds" id="folds"
            x-model="fold"
            class="block w-full rounded-md border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
        >
        </select>
    </div>
    <div class="hidden sm:block">
        <div class="">
            <nav class="">
                {{ $slot}}
            </nav>
        </div>
</div><!-- EUIKit Accordion Component -->
