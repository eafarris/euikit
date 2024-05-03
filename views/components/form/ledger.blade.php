@props(['colspan', 'lastcol', 'array' => [],
    'help' => '', 'helptype' => 'ghost',
])
<div>
    <div class="grid grid-cols-12 divide-x divide-y divide-slate-400">
        @foreach ($array as $index => $item)
            <div @class([
                'p-2',
                'bg-slate-300',
                'text-slate-500',
                'col-span-' . $colspan => !$loop->last,
                'col-span-' . $lastcol => $loop->last,
            ])>
                {{ $index }}
            </div>
        @endforeach

        @foreach ($array as $item)
        <input type="text" name="array[]" value="{{ $item }}" @class([
            'col-span-' . $colspan => !$loop->last,
            'col-span-' . $lastcol => $loop->last,
        ]) />
        @endforeach
    </div><!-- .grid-cols-12 -->

    @isset($help)
        <x-e::help>{{ $help }}</x-e::help>
    @endisset
</div><!-- EUIKit Ledger Component -->
