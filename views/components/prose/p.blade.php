@props(['newthought'])
<div @class(["my-4",
    "first-line:uppercase first-line:tracking-widest" => !@empty($newthought)
])>
    {{ $slot }}
</div>