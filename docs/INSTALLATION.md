# Installation

1. Bring in EUIKit via composer: `composer require eafarris/euikit`

## Livewire and AlpineJS

EUIKit depends on Laravel Livewire. It will be automatically installed as a dependency. As it depends on AlpineJS, it will also be brought in as a dependency.

## TailwindCSS

EUIKit depends on TailwindCSS and the TailwindCSS Forms plugin. Tailwind itself is probably already brought in, as it's common in Laravel installations. However, if not:

1. Add the following lines to the "devDependencies" section of your project's package.json:

```json
"tailwindcss": "~4",
"autoprefixer": "^10.4.14",
"@tailwindcss/forms": "^0.5.11",
"@tailwindcss/postcss": "^4"
```

And run `npm install` to bring in these dependencies.

You'll also need to modify your app.css:

```css
@import 'tailwindcss';

@source '../views';
@source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';

/* ADD THESE LINES */
@source '../../vendor/eafarris/euikit/views';
@plugin '@tailwindcss/forms';
/* TO USE THE OPTIONAL EXTENDED COLOR PALETTE */
@import "../../vendor/eafarris/euikit/tailwind-extended-color-palette.css";
```
