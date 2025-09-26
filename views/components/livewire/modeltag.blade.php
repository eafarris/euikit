<div>
    <div class="control mt-1">
        <div class="w-full appearance-none block text-slate-500 dark:text-slate-700 dark:bg-slate-400 border border-slate-200 rounded-xs leading-tight focus:outline-hidden focus:bg-white focus:border-slate-500">
        <form>
            <label for="find">{{ $label }}</label>
            <input type="text" name="find" wire:model="find"
                class="bg-slate-300"
                list="candidates"
                wire:keydown.enter.prevent="addtag"
            />

            @foreach ($tags as $tag)
            <div class="inline-block text-sm rounded-full bg-slate-200 px-3 py-1">
                {{ $tag[$valuefield] }}
                <span wire:click="remove({{ $loop->index }})">
                    @svg('heroicon-c-x-mark', 'inline-block align-text-top pl-1 w-5 h-5')
                </span>
            </div>
            @endforeach

            <datalist id="candidates">
                @foreach($candidates as $candidate)
                <option wire:key="{{ $candidate->$valuefield }}"
                    data-value="{{ $candidate->$valuefield }}"
                    value="{{ $candidate->$searchfield }}">
                </option>
                @endforeach
            </datalist>
        </form>
        <input type="hidden" name="{{ $name }}" value="{{ $tags->toJson() }}" />
        </div><!--  -->
    </div>
</div>
