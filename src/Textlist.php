<?php namespace App\Http\Livewire;

use Livewire\Component;

class Textlist extends Component {

    public $nolabel = FALSE;
    public $label;
    public $placeholder;
    public $required = FALSE;
    public $attributes;
    public $field;
    public $items = [];
    public $index = 0;
    public $newitem;

    public function mount($field) { // 
      $this->field = $field;
    } // endfunction mount

    public function add($newitem) {
        $this->items[$this->index] = $newitem;    
        $this->index++;
        $this->newitem = '';
    } // endfunction add

    public function remove($index) {
        array_splice($this->items, $index, 1);
    }

    public function render() {
        return view('livewire.textlist');
    } // endfunction render
}
