<?php namespace eafarris\euikit\Livewire;
use Livewire\Component;
use Str;

class Lookup extends Component {
    public $label; // PROPERTY form field label
    public $model; // PROPERTY specifying model to hydrate
    public $name; // PROPERTY field name to pass up to form
    public $firstchoice; // PROPERTY showing autocomplete selection
    public $searchfield; // PROPERTY autocomplete field from model
    public $valuefield = 'id'; // PROPERTY values to pass up to form
    public $match = 'contains'; // PROPERTY "contains" or "startswith" to limit choices

    public $find; // internal search field
    public $allcandidates; // Call to the DB to retrieve models
    public $candidates; // collection for populating the dropdown
    public $selected; // selected models

    public function mount() {
        if (! Str::contains($this->model, '\\')) { // Not an absolute class reference
            $this->model = '\App\Models\\' . $this->model;
        }
        // Fetch all candidates from the DB one time only.
        $this->allcandidates = $this->model::all($this->valuefield, $this->searchfield);
        $this->candidates = $this->allcandidates;
    } // endfunction mount

    public function updatedFind() { // triggered when input value changes
        /*
        $this->candidates = $this->candidates->filter(function ($candidate) {
            $field = $this->searchfield;
            switch ($this->match) {
                case 'startswith':
                    return Str::startsWith(Str::lower($candidate->$field), Str::lower($this->find));
                case 'contains':
                default:
                    return Str::contains(Str::lower($candidate->$field), Str::lower($this->find));
            } // endswitch on match
        });
        $valuefield = $this->valuefield;
        $this->firstchoice = $this->candidates->first()->$valuefield;
        */
    } // endfunction updatedFind

    public function render() {
        return view ('e::components.livewire.lookup');
    } // endfunction render

} // endclass Lookup
