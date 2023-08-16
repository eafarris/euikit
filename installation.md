## Installation

1. Make a "packages/eafarris" directory hierarchy in your Laravel project
2. Change into the new eafarris directory
3. Bring in the EUIKit package from GitHub: `git clone https://github.com/eafarris/euikit.git`
4. Add the package to your project's `composer.json`:
    1. Within the "autoload":{"psr-4"} section, add `"eafarris\\euikit\\": "packages/eafarris/euikit/src"`
5. Add the package to your project's `config/app.php`:
    1. Within the "'providers' array, add `eafarris\euikit\euikitServiceProvider::class,`
6. From the top of your Laravel project, run `composer install`.

### Livewire

EUIKit depends on Laravel Livewire. Bring it in by running `composer require livewire/livewire`.

### Tailwind and AlpineJS

EUIKit depends on TailwindCSS TailwindCSS Forms, and AlpineJS. To install them:

1. Add the following lines to the "devDependencies" section of your project's package.json:

```
"tailwindcss": "~3",
"autoprefixer": "^10.4.14",
"alpinejs": "3.4.2",
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
