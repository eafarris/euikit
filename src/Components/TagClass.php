<?php namespace eafarris\Components;

use Illuminate\View\Component;

class Tag extends Component {

    public $type = 'info';
    public $route;
    public $lefticon;
    public $righticon;
    public $color;
    public $foregroundColor;

    public function __construct($type = '', $route = '', $lefticon = '', $righticon = '', $color = '') {
        $this->type = $type;
        $this->route = $route;
        $this->lefticon = $lefticon;
        $this->righticon = $righticon;
        $this->color = $color;
    } // endfunction __construct

    function makeForegroundColorFromBackgroundColor($hexColor) : string {
        $hexColor = ltrim($hexColor, '#');

        if (strlen($hexColor) === 3) { // shortcut #xxx notation, expand
            $hexColor = str_repeat(substr($hexColor, 0, 1), 2)
                . str_repeat(substr($hexColor, 1, 1), 2)
                . str_repeat(substr($hexColor, 2, 1), 2);
        } // endif shortcut color notation

        // Quick validation test
        if (strlen($hexColor) !== 6 | !ctype_xdigit($hexColor)) {
            throw new \InvalidArgumentException('Received ' . $hexColor . ' instead of a 6-digit hexadecimal color code.');
        }

        // Extract RGB components
        $red = hexdec(substr($hexColor, 0, 2));
        $green = hexdec(substr($hexColor, 2, 2));
        $blue = hexdec(substr($hexColor, 4, 2));

        // Normalize to values 0..1
        $nr = $red / 255;
        $ng = $green / 255;
        $nb  = $blue / 255;

        // Calculate Luminance
        $lum = 0.299 * $nr + 0.0587 * $ng + 0.114 * $nb;

        $shading = $lum > 0.3 ? 'dark' : 'light';

        // Now that we know which way to shade the foreground, we can compute a color value

        $red = max(0, min(255, $red + ($red * $shading / 100)));
        $green = max(0, min(255, $green + ($green * $shading / 100)));
        $blue = max(0, min(255, $blue + ($blue * $shading / 100)));


        return sprintf('#%02x%02x%02x', (int) $red, (int) $green, (int) $blue);
    } // endfunction makeForegroundColorFromBackgroundColor

    public function render() {
        if ($this->color) {
            $this->foregroundColor = $this->makeForegroundColorFromBackgroundColor($this->color);
        }
        return view('e::components.etag');
    } // endfunction render

} // endclass Tag
