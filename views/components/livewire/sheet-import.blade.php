<div class="inline-block">
@if ($type == 'button')
    <x-euikit::button onclick="$modals.show('import')" value="Import to sheet" />
@elseif ($type == 'action')
    <x-euikit::form.sheet.action onclick="$modals.show('import')" icon="heroicon-c-document-arrow-down" title="Import" />
@endif
@teleport('body')
    <x-euikit::modal name="import">
        <x-slot:header>
            Import to sheet
        </x-slot:header>
        <p class="py-4 text-slate-500">Select a CSV file for import, or paste text below.</p>
        <x-euikit::form.checkbox class="py-4 px-8" field="headerrow" wire:model="headerrow" label="File/text contains a header row" />
        <input class="px-8 text-slate-500
            file:border-transparent file:border file:font-normal file:text-base file:rounded-sm file:py-1 file:px-3 file:h-12 file:flex-none file:justify-center file:items-center file:transition file:hover:scale-110
            file:bg-slate-300 file:text-slate-800 file:hover:bg-slate-500 file:hover:text-white file:disabled:opacity-50"
            type="file" name="importfile" wire:model="importfile" id="upload[{{ $iteration }}]" />
        <x-euikit::form.textarea class="py-4" field="importfield" wire:model="importfield" label="Paste text" />
        <x-slot:footer>
            <x-euikit::button type="danger" @click="show = false" value="Close" />
            <x-euikit::button type="success" @click="show = false" wire:click="import" value="Import" />
        </x-slot:footer>
    </x-euikit::modal>
@endteleport
</div>
