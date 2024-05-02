@props(['type' => 'ghost', 'icon' => 'heroicon-o-question-mark-circle', 'value' => '', 'title' => 'Toggle inline help'])
<div>
<x-euikit::button @click="euikit_help_show = !euikit_help_show"
    value="{{ $value }}"
    type="{{ $type }}"
    icon="{{ $icon }}"
    title="{{ $title }}"
/>
</div>
