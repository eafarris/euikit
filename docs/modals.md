# Using the Modal component

The `<x-euikit::modal>` component allows the building up of modal windows. Multiple modals per page are supported, and modals can be triggered by dispatching a Javascript event.

## The component itself

There's nothing too fancy about the `<x-euikit::modal>` component itself. It has slots for `header` and `footer`, as well as the main (unnamed) slot. The component relies on AlpineJS being loaded, which should be true since the kit requires Livewire 3, which bundles AlpineJS. The modal correctly handles closing the modal by the pressing ESC as well as clicking on the backdrop. The backdrop is slightly darkened and blurred while the modal is visible. The only required property for the modal component is a `name`.

## Triggering the modal

A small Javascript method, `show()` is part of the `<x-euikit::layouts.app>` base layout. This method dispatches a Javascript event called `modal`, and passes the name of the modal to it. The modal component listens for this event and will show itself if the name passed to `show()` matches the name property of the modal.

## What happens inside the modal

Well, that's up to you. Could be anything, from a simple cancel button to a whole form. The modal could include a Livewire component itself.