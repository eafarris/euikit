@php
    if (empty($marker)) {
        $marker = "⊕";
    }
@endphp
<span class="lg:hidden text-sm font-normal align-top -ml-1 mr-2 text-red-400">{{ $marker }}</span>
<div class="float-right clear-right -mr-[60%] relative text-sm w-1/2 font-sans font-light">
    <div class="p-4 inline-block border-2 border-slate-300 bg-slate-50 shadow-lg rounded-lg">
        {{ $slot }}
    </div><!--  -->
    <div class="text-sm italic ml-4">
        {{ $caption }}
    </div>
</div>
