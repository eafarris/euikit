@props(['closed' => FALSE])
<div {{ $attributes }}>
<details {{ $closed ? '' : 'open'}}>
    <summary class="text-slate-500">Filters</summary>
    <div class="inline-flex gap-10 items-center pl-8">
    {{ $slot}}
    </div>
</details>
</div>