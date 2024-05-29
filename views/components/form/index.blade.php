@props(['action' => '', "method" => 'POST', "footer" => ''])

<form action="{{ $action }}" method="POST" class="space-y-6">
@unless ($method == 'POST')
@method($method)
@endunless

@if ($errors->any())
<x-euikit::alert type="error" class="mt-4">
    Your changes were not submitted due to errors in the form. Please correct the appropriate fields
    below.
</x-euikit::alert>
@endif


@csrf

{{ $slot }}

@if ($footer)
<div class="py-3 px-6 border-2 border-slate-300 bg-slate-200 rounded-lg">
    <div class="flex flex-row items-center justify-between">
        {{ $footer }}
    </div>
</div>
@endif

</form><!-- EUIKit Form Component -->