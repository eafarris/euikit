<div @class([
    "text-4xl font-bold tracking-tight  text-slate-600 font-sans mb-3 border-b-2 border-slate-300" => $level == 1,
    "text-2xl font-bold tracking-normal text-slate-600 font-sans mt-8 -mb-2 leading-none" => $level == 2,
    "text-xl  font-bold tracking-normal text-slate-600 font-sans mt-4 -mb-4" => $level == 3,
])>
    {{ $slot }}
</div>
