<section x-id="['content']">
    <h2 @click="hide($refs.$id('content'))">{{ $title }}</h2>
    <div x-ref="$id('content')">
    {{ $slot }}
    </div>
</section>