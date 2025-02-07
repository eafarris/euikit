@props(['field',
    'help' => '', 'helptype' => 'ghost',
])
<!-- Based on https://codepen.io/jjjrmy/pen/gOPvmdv?editors=1010 -->
<div class="flex flex-col flex-grow mb-3 w-64 h-64 p-4 ">
    <div {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => 'field w-60 h-60']) }}
        x-data="{ files: null }"
    >
        <input type="file" id="{{ $field }}" name="{{ $field }}"
            class="absolute top-0 left-0 right-0 w-60 h-60 z-50 m-0 p-0 outline-hidden invisible"
            x-on:change="files = $event.target.files; console.log($event.target.files);"
            x-on:dragover="$el.classList.add('active')"
            x-on:dragleave="$el.classList.remove('active')"
            x-on:drop="$el.classList.remove('active')"
        />
        <template x-if="files !== null">
            <div class="flex flex-col space-y-1">
                <template x-for="(_,index) in Array.from({length: files.length })">
                    <div class="flex flex-row items-center space-x-2">
                        <template x-if="files[index].type.includes('audio/')">@svg('heroicon-o-speaker-wave')</template>
                        <template x-if="files[index].type.includes('image/')">@svg('heroicon-o-photo')</template>
                        <template x-if="files[index].type.includes('video/')">@svg('heroicon-o-video-camera')</template>
                        <span class="font-medium text-slate-800" x-text="files[index].name">Uploading</span>
                        <span class="text-xs self-end text-slate-500" x-text="filesize(files[index].size)">…</span><!--  -->
                    </div>
                </template>
            </div>
        </template>
        <template x-if="files === null">
            <div class="bottom-0 left-0 flex flex-col space-y-2 items-center justify-center">
                @svg('heroicon-o-arrow-up-tray', "w-6 h-6")
                <p class="text-slate-600">Drag your files here or click in this area.</p>
                <a href="javascript:void(0)">Select a file</a>
            </div>
        </template>

        @isset($help)
            <x-e::help>{{ $help }}</x-e::help>
        @endisset
    </div>
</div>
