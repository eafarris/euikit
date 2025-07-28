<div><!-- Livewire -->
    <p>
    {{ $firstchoice }} &mdash; {{ $valuefield }}
<form>
    <input type="search" name="find" wire:model.live="find"
      class=""
      list="candidates"
      wire:keydown.enter.prevent="addselected"
    />
    <datalist id="candidates">
        @foreach($candidates as $candidate)
            <option wire:key="{{ $candidate->$valuefield }}"
                data-value="{{ $candidate->$valuefield }}"
                value="{{ $candidate->$searchfield }}">
            </option>
        @endforeach
    </datalist>
</form>

<pre>
    {{ $allcandidates }}
</pre>

</div>
