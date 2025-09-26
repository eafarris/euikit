## Installation

1. Bring in x-euikit:: via composer: `composer require eafarris/x-euikit::`
2. From the top of your Laravel project, run `composer install`.

### Livewire

x-euikit:: depends on Laravel Livewire. It will be automatically installed as a dependency.

### Tailwind and AlpineJS

x-euikit:: depends on TailwindCSS and TailwindCSS Forms. To install them:

1. Add the following lines to the "devDependencies" section of your project's package.json:

```
"tailwindcss": "~3",
"autoprefixer": "^10.4.14",
"@tailwindcss/forms": "^0.5.4"
```

And run `npm install` to bring in these dependencies.

You'll also need "tailwind.config.js" and "postcss.config.cjs" files in the root of your project. Their simplest forms:

`tailwind.config.js`:

```
const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    plugins: [require('@tailwindcss/forms')],
};
```

and `postcss.config.cjs`:

```
module.exports = {
    plugins: {
        tailwindcss: {},
        autoprefixer: {},
    },
};
```

Of course these files may be further manipulated based on the needs of your project.
