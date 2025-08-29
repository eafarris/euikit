# EUIKit Extended Palette

EUIKit ships with an _optional_ extended color palette that you can bring in to
your Tailwind configuration. The palette is based on the [12-bit Rainbow
Palette](https://iamkate.com/data/12-bit-rainbow/) by Kate Morley. It adds an
additional 12 colors to the base palette, with weights from 50-950. 

## Installing the Extended Palette

To install the extended palette, add this line to the end of your `resources/css/app.css`:

```
@import "../../vendor/eafarris/euikit/tailwind-extended-color-palette.css";
```

The next time you compile your assets, the extended palette will be available for use.

## Using the Extended Palette

The new colors can be used like all other Tailwind colors. Tailwind will create
the appropriate styles, like `text-plum-300` or `border-jade-900`. They can be
used in the same way as the default Tailwind palette.
