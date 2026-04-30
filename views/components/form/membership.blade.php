<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field'])   }}
x-data="{
    selected: [],
    handleMembershipChange(selected) {
        this.selected=selected;
        this.$nextTick(()=> this.$refs.hiddenInput.dispatchEvent(new Event('input')));
    },

}"
@membershipchanged="handleMembershipChange($event.detail.selected)"
>

<livewire:euikit-membership candidates="{{ $candidates ?? '' }}"
    filter="{{ $filter ?? false }}"
    filterfield="{{ $filterfield ?? '' }}"
    sortfield="{{ $sortfield ?? '' }}"
    listfield="{{ $listfield ?? 'identifier' }}"
    listid="{{ $listid ?? 'id' }}"
    entity="{{ $entity ?? '' }}"
    selected="{{ $selected ?? '' }}"
/>

@php
    if ($attributes->whereStartsWith('wire:model') && !isset($field)) {
        $field = $attributes->whereStartsWith('wire:model')->first();
    } // endif field not required if wire:model set
@endphp

<input type="hidden" x-model="selected"
    name="{{ $field }}" {{ $attributes->whereStartsWith('wire') }}
    x-ref="hiddenInput"
/>

</div>
