# Getting started with x-euikit::

## Base App Layout

Traditionally, you'll start with a layout file which all your pages will inherit. x-euikit:: includes an "app" layout that you can use as a base for your layout, which includes a header, footer, and left/right sides.

1. Create a "components" directory under "resources/views".
2. Create an "app.blade.php" file under that directory. In its simplest form, it should contain:

```
<x-euikit::layouts.app>
</x-euikit::layouts.app>
```
The "layouts.app" component includes a "header" slot that is appropriate for the application name, and a "left" slot that is appropriate for a sidebar menu. The right-hand portion of the layout is for the focus of the current page, and is the 'default' slot. Here is a more fleshed out app.blade.php:

```
<x-euikit::layouts.app>
<x-slot:header>
    <div class="flex items-center justify-between px-4 py-4">
        <p>x-euikit:: Test Application</p>
    </div>
</x-slot:header>

<x-slot:left>
    <x-euikit::menu>
        <x-euikit::menu.submenu title="Main Menu">
            <x-euikit::menu.item route="#">Item 1</x-euikit::menu.item>
            <x-euikit::menu.item route="#">Item 2</x-euikit::menu.item>
        </x-euikit::menu.submenu>
    </x-euikit::menu.submenu>
</x-slot:left>

{{ $slot }}
</x-euikit::layouts.app>
```

With this layout, your app's individual pages become quite simple. Take, for example, a welcome page based on your new app.blade.php:

```
<x-app>
<div class="p-8">
    <h1>Welcome!</h1>

    <p>Welcome to the app.</p>
</div>
</x-app>

Your welcome.blade.php is based on your components/app.blade.php, which is in turn based on x-euikit::'s layouts.app component.
