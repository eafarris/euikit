Of course, these are _suggestions_. They are the rules I follow to keep my code
readable and consistent. Nothing bad will happen if you just ignore this
document. But if you want, you should be able to feed this file to your AI
Coding Companion to help it keep consistent formatting.

# EUIKit Coding Style Suggestions

Following are some suggestions when coding using EUIKit to keep the code
readable and consistent. Because some EUIKit components can take many
parameters, I tend to use multiple lines when building from these components. I
am also a bit loose with the indenting, as I find sometimes it actually hurts
readability for me. This is how I do it; you do you. Don't yuck my yum and I
won't yuck yours.


## Buttons

```language-php
<x-euikit::button inline-classes type color
    lefticon righticon
    value
    route wire
/>
```

```language-php
<x-euikit::button-bar.button type color icon
  value
  route
/>
```

# Cards

```language-php
<x-euikit::card-2column inline-classes left icon
<x-slot:right>
content
</x-slot:right>
</x-euikit::card-2column>
```

## Form Components

### Boolean

```language-php
<x-euikit::form.boolean inline-classes required nolabel
    wire:model field name label
    type choices choicetrue choicefalse
    helptype
    help
/>
```

### Checkbox

```language-php
<x-euikit::form.checkbox inline-classes required nolabel
    wire:model field name label
    helptype
    help
/>
```

### Color

```language-php
<x-euikit::form.color inline-classes required nolabel
    wire:model field name label
    min max
    helptype
    help
/>
```

### Date

```language-php
<x-euikit::form.date inline-classes required nolabel
  wire:model field name label
  min max
  helptype
  help
/>
```

### Datetime

```language-php
<x-euikit::form.datetime inline-classes required nolabel
    wire:model field name label
    min max
    helptype
    help
/>
```

### Display

```language-php
<x-euikit::form.display inline-classes lefticon righticon required nolabel noplaceholder
    label
    wire:model field value 
    helptype
    help
/>
```

### File

```language-php
<x-euikit::form.file inline-classes required
    wire:model field
    helptype
    help
/>
```

### Lookups

```language-php
<x-euikit-form-lookup inline-classes required nolabel noplaceholder
    wire:model name field label
    model
    optionvalue optionfield
    wire:blur
/>
```

### Notes

```language-php
<x-euikit::form.notes inline-classes required nolabel noplaceholder resize
    wire:model model
    helptype
    help
/>
```

### Radio

```language-php
<x-euikit::form.radio inline-classes required nolabel
    wire:model field name label
    helptypeb
    help
/>
```

### Select

```language-php
<x-euikit::form.select inline-classes required multi nolabel noplaceholder
    wire:model field name label
    any anyvalue none nonevalue
    helptype
    help
/>
```

### Text

```language-php
<x-euikit::form.text inline-classes type required nolabel noplaceholder
    lefticon righticon
    wire:model field name label
    placeholder
    helptype
    help
/>
```

### Textarea

```language-php
<x-euikit::form.textarea inline-classes required nolabel noplaceholder resize
    wire:model field name label
    helptype
    help
/>
```

## Sections

```language-php
<x-euikit::section>
<x-slot:header lefticon righticon>
    title
</x-slot:header>

(content)

<x-slot:footer lefticon righticon
    footer
</x-slot:footer>
</x-euikit::section>
```
