# euikit
Eric's UIKit (euikit) — Laravel Blade and Livewire components for UI scaffolding

EUIKit ~~is~~ will be a set of components designed to rapidly scaffold a Laravel application with a consistent and attractive look-and-feel. Using a combination of Blade components and Livewire components, euikit is designed to get the easy stuff out of the way, so the hard stuff is possible.

EUIKit includes some powerful form building components. In addition to the standard field types, it includes a "lookup" component that can magically hydrate a select field from another Laravel model. There is a "textlist" component that presents a way for users to add arbitrary text entries to a list, which is treated as a Laravel Collection on the back end.

The table componets in EUIKit are ready to do Livewire on-the-fly filtering and sorting.

There are interactive alert, messages, and rollup components to keep users informed while also keeping your app uncluttered and attractive.

EUIKit comes with two sets of styled components: One utilizing the Tailwind CSS Utility classes, and one using the Bulma semantic classes. All components can be published for the designer to tweak their use to conform to an existing look-and-feel, or they can be used without modification to create a consistent, attractive, modern web app experience.

EUIKit can be easily added to an existing Laravel project as a stand-alone package. Its components are available within the `<x-euikit::` namespace.

