<div class="grid grid-cols-2">
    <x-euikit::table class="col-span-1 h-84 overflow-auto block text-sm">
        <x-slot:header>
            <tr>
                <x-euikit::table.column-header class="w-96">
                    <div>Available {{ \Str::plural($entity) }}</div>
                    @if ($filter)
                        <div>
                            <x-euikit::form.text class="mt-4 mx-2" inputclasses="bg-white" noplaceholder
                                type="search" nolabel inline wire:model.live="filtervalue"
                            />
                        </div>
                    @endif
                </x-euikit::table.column-header>
            </tr>
        </x-slot:header>
        @foreach ($candidatemodels->whereNotIn($listid, $selected) as $candidate)
        <x-euikit::table.row wire:key="{{ $candidate->$listid }}">
            <x-euikit::table.cell wire:click="attach('{{ $candidate->$listid }}')">
                {{ $candidate->$listfield }}
            </x-euikit::table.cell>
        </x-euikit::table.row>
        @endforeach
    </x-euikit::table>

    <x-euikit::table class="col-span-1 w-full h-84 overflow-auto block text-sm">
        <x-slot:header>
            <x-euikit::table.column-header class="w-96">
                Associated {{ \Str::plural($entity)  }}
            </x-euikit::table.column-header>
        </x-slot:header>
        @foreach ($selected as $associate)
             <x-euikit::table.row wire:key="{{ $associate }}">
                 <x-euikit::table.cell wire:click="detach('{{ $associate }}')">
                     {{
                         $candidatemodels->first(function($candidate) use ($associate, $listid) {
                             return $candidate->{$listid} == $associate;
                         })?->{$listfield} ?? 'Unknown'
                     }}
                 </x-euikit::table.cell>
             </x-euikit::table.row>
         @endforeach
    </x-euikit::table>


</div>
