<div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field'])   }}
x-data="{
    selected: [],
    handleMembershipChange(selected) { this.selected=selected; },
}"
@membershipchanged="console.log('hit');handleMembershipChange($event.detail.selected)"
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

<input type="hidden" x-model="selected" name="{{ $field }}" />

</div>
