@props(['lwsort' => ''])

@php
// Heroicons
$chevron_down = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 inline-block"><path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clip-rule="evenodd" /></svg>';
$chevron_up = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 inline-block"><path fill-rule="evenodd" d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z" clip-rule="evenodd" /></svg>';
$chevron_up_down = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 inline-block"><path fill-rule="evenodd" d="M11.47 4.72a.75.75 0 011.06 0l3.75 3.75a.75.75 0 01-1.06 1.06L12 6.31 8.78 9.53a.75.75 0 01-1.06-1.06l3.75-3.75zm-3.75 9.75a.75.75 0 011.06 0L12 17.69l3.22-3.22a.75.75 0 111.06 1.06l-3.75 3.75a.75.75 0 01-1.06 0l-3.75-3.75a.75.75 0 010-1.06z" clip-rule="evenodd" /></svg>';
@endphp

<th scope="col" {{ $attributes->merge(['class' => 'p-3 bg-slate-300 text-slate-500 dark:text-slate-300 hidden text-left font-semibold lg:table-cell']) }}"
    {{ $attributes }}
    @if ($lwsort)
    wire:click="sort('{{ $lwsort }}')"
    @endif
>
    <div class="min-w-full">
    {{ $slot }}
    @if ($lwsort)
        @if($this->sortBy === $lwsort)
            @if($this->sortDirection == 'asc')
                {!! $chevron_down !!}
            @else
                {!! $chevron_up !!}
            @endif
        @else
            {!! $chevron_up_down !!}
        @endif
    @endif
    </div>
</th><!-- EUIKit Table Column Header -->
