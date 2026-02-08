@props(['model' => '', 'label' => '', 'cols' => 60, 'rows' => 10, 'nomarkdown' => FALSE,
    'labelhtml' => '', 'help' => '', 'helptype' => 'ghost',
])

@php
    $common_classes = 'resize-none appearance-none block border rounded-xs py-3 p-4 mb-3 leading-tight';
    $color_classes = 'border-slate-300 text-slate-500 bg-white/50 focus:border-sky-300 focus:ring-sky-300 placeholder:text-slate-400 ';
    $color_classes .= 'dark:border-slate-400 dark:bg-slate-700 dark:text-slate-300 dark:placeholder:text-slate-400 dark:focus:border-sky-600 dark:focus:ring-sky-600';
    $error_classes = 'border-red-500 text-red-900';

    $label = 'Notes';
    if (!$nomarkdown) {
      $labelhtml .= 'Notes <span class="italic">(<a href="https://www.markdownguide.org/cheat-sheet/" class="underline-offset-2 underline">Markdown</a> supported)</span>';
    }
@endphp

<x-euikit::form.textarea
  labelhtml="{!! $labelhtml !!}"
  field="notes" cols="{{ $cols }}" rows="{{ $rows }}"
>
</x-euikit::form.textarea>
