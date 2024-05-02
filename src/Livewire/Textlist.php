<?php namespace eafarris\euikit\Livewire;

use Livewire\Component;

class Textlist extends Component {

    public $nolabel = FALSE;
    public $label = '';
    public $placeholder = '';
    public $required = FALSE;
    public $lefticon = '';
    public $righticon = '';
    public $field = '';
    public $help = '';
    public $items = [];
    public $index = 0;
    public $newitem = '';

    public function mount($field) { //
      $this->field = $field;
    } // endfunction mount

    public function add() {
        $this->items[] = $this->newitem;
        $this->newitem = '';
    } // endfunction add

    public function remove($index) {
        array_splice($this->items, $index, 1);
    }

    public function render() {
        return view('euikit::components.form.textlist');
    } // endfunction render
}
