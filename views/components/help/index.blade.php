@props(['type' => 'ghost'])

<aside x-show="euikit_help_show">
    <x-e::message type="{{ $type }}">
        <span class="italic">{{ $slot }}</span>
    </x-e::message>
</aside>
