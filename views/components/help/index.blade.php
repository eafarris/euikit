@props(['type' => 'ghost'])

<aside x-show="euikit_help_show">
    <x-euikit::message type="{{ $type }}">
        <span class="italic">{{ $slot }}</span>
    </x-euikit::message>
</aside>
