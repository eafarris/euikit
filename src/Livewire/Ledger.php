<?php namespace eafarris\euikit\Livewire;
use Illuminate\Support\Collection;
use Livewire\Component;

class Ledger extends Component {

    public $array = [
        'a1' => "a one",
        'b1' => "b one",
        'c1' => "c one",
        'd1' => 'd one',
        'e1' => 'e one',
        'f1' => 'f one',
        'g1' => 'g one',
    ];

    public function render() {
        $collection = collect($this->array);
        $colspan = floor(12 / $collection->count());
        $lastcol = 12 - ($colspan * ($collection->count() - 1));
        return view('euikit::components.form.ledger', [
            'array' => $this->array,
            'colspan' => $colspan,
            'lastcol' => $lastcol
        ]);
    }

}