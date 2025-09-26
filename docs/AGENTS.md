# ABOUT THIS PACKAGE

This is the `eafarris\euikit` package for Laravel 12.x and higher. The EUIKit
package is a set of Blade components and Livewire components for building a
consistent and attractivee web user interface for Laravel projects.

This package utilizes Livewire 3.x and AlpineJS for interactivity. 

This package utilizes TailwindCSS for styling.

## Blade components

All blade components are contained in the `views/components` hierarchy. Some
components have their own directory structure under this top level, for those
components that require sub-components for styling, like forms and tables.

Some Blade components are not just templates, but have methods and internal variables. The classes for these components are in the `src/Components` directory.

## Livewire components

EUIKit's Livewire components have their source code within `src/livewire`, and their Blade components in `views/livewire`.

## Icons

Many components can take an attribute that defines an icon. By default EUIKit
uses [Heroicons](https://heroicons.com/). Knowing these icons is crucial when
creating views for an application where icons can provide context, styling, and
decoration.

## Documentation

The website https://euikit.eafarris.com/ contains usage information about many
of these components. Of special attention is the use of color and semantic
classes for many UI elements. These are defined in
https://euikit.eafarris.com/types.


