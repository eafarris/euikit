# Using the Modal component

The `<x-euikit::modal>` component allows the building up of modal windows.
Multiple modals per page are supported, and modals can be triggered by
dispatching a Javascript event.

## The component itself

There's nothing too fancy about the `<x-euikit::modal>` component itself. It
has slots for `header` and `footer`, as well as the main (unnamed) slot. The
component relies on AlpineJS being loaded, which should be true since the kit
requires Livewire 3, which bundles AlpineJS. The modal correctly handles
closing the modal by the pressing ESC as well as clicking on the backdrop. The
backdrop is slightly darkened and blurred while the modal is visible. The only
required property for the modal component is a `name`. While the modal could be
added anywhere on the page, it is considered best practice to add it at the end
of the document, before the layout's closing tag. If a modal is part of a
Livewire component, it can be added to the component's Blade.

## Triggering the modal

A small script is part of the `<x-euikit::layouts.app>` component to show
modals. A button must call `onclick="$modals.show('')` and pass in the name of
the modal as the only argument to the `show()` method. 

## Closing the modal

The modal code is designed to close the modal when the backdrop is clicked, or
when ESC is pressed. To dismiss the modal from code (for example, a "Cancel"
button), call "show = false" from a @click handler.

## What happens inside the modal

Well, that's up to you. Could be anything, from a simple cancel button to a
whole form. The modal could include a Livewire component itself.
