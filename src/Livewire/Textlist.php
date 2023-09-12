<?php namespace eafarris\euikit\Livewire;

use Livewire\Component;

class Textlist extends Component {

    public $nolabel = FALSE;
    public $label = '';
    public $placeholder = '';
    public $required = FALSE;
    public $field = '';
    public $items = [];
    public $index = 0;
    public $newitem = '';

    public function mount($field) { // 
      $this->field = $field;
    } // endfunction mount

    public function add($newitem) {
        $this->items[$this->index] = $newitem;
        $this->index++;
        $this->newitem = '';
    } // endfunction add

    public function remove() {
        array_pop($this->items);
    }

    public function render() {
        return view('euikit::components.form.textlist');
    } // endfunction render
}
