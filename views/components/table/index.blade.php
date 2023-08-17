<div class="sm:rounded-lg border-2 border-slate-200 overflow-hidden mt-4 mb-4">
<table class="min-w-full divide-y divide-slate-300">
    @if (isset($header))
        <thead class="bg-slate-100">
            {{ $header }}
        </thead>
    @endif
    <tbody class="bg-white divide-y divide-slate-200">
        {{ $slot }}
    </tbody>
</table>
</div>