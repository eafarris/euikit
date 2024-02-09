<?php namespace eafarris\euikit\Livewire;
use Livewire\Component;
use Str;

class ModelTag extends Component {
    public $label; // PROP form field label
    public $model; // PROP specifying model to hydrate
    public $name; // PROP field name to pass up to form
    public $searchfield; // PROP autocomplete field from model
    public $valuefield; // PROP field to pass up to form
    public $find; // internal search field
    public $candidates; // for popluating the datalist
    public $tags; // selected models

    public function render() {
        return view('e::components.livewire.modeltag');
    }

    public function mount() {
        $this->tags = collect();
        if (! Str::contains($this->model, '\\')) { // Not an absolute class reference
            $this->model = '\App\Models\\' . $this->model;
        }
        $this->candidates = $this->model::get([$this->valuefield, $this->searchfield]);
    }

    public function updatedFind($find) {
        $this->candidates = $this->model::where($this->searchfield, 'like', '%'.$find.'%')->get(['id', 'name']);
    }

    public function addtag() {
        $value = $this->valuefield;
        $search = $this->searchfield;
        $this->tags->push([$value => $this->candidates->first()->$value, $search => $this->candidates->first()->$search]);
        $this->find = '';
        $this->updatedFind('');
    }

    public function remove($index) {
        $this->tags = $this->tags->except($index);
    }
}