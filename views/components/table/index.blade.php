@props(['nohover' => FALSE])
<div class="sm:rounded-lg border-2 border-slate-200 dark:border-slate-500 overflow-hidden mt-4 mb-4">
<table {{ $attributes->merge(['class' => 'divide-y divide-slate-300 dark:divide-slate-300 table-fixed w-full']) }}>
    @if (isset($header))
        <thead class="sticky top-0
            text-slate-50 dark:text-slate-800
            bg-slate-100/95 dark:bg-slate-600/95">
            {{ $header }}
        </thead>
    @endif
    <tbody class="bg-white dark:bg-slate-500 divide-y divide-slate-200 dark:divide-slate-700">
        {{ $slot }}
    </tbody>
</table>
</div>
