@php
    if (empty($marker)) {
        $marker = "⊕";
    }
@endphp
<span class="lg:hidden text-sm font-normal align-top -ml-1 mr-2 text-red-400">{{ $marker }}</span>
<div class="float-right clear-right -mr-[60%] relative text-sm w-1/2 font-sans font-light">
    {{ $slot }}
</div>