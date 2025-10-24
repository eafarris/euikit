<div x-data="{
    selected: [],
    handleMembershipChange(selected) { this.selected=selected; },
}"
@membership-selected.window="handleMembershipChange($event.detail.selected)"
>

<livewire:euikit-membership candidates="{{ $candidates ?? '' }}"
    filter="{{ $filter ?? false }}"
    filterfields="{{ $filterfields ?? '' }}"
    sortfield="{{ $sortfield ?? '' }}"
    listfield="{{ $listfield ?? '' }}"
    listid="{{ $listid ?? 'id' }}"
    entity="{{ $entity ?? 'Item' }}"
/>

<input type="hidden" x-model="selected" />

</div>
