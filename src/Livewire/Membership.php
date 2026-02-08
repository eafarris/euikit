<?php namespace eafarris\euikit\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Membership extends Component {

    public $candidates; // model for the candidate list
    public $entity; // outward-facing name of the model
    public $listfield; // column from the model to hydrate the list
    public $listid; // column from the model for id
    public $filter; // allow filtering
    public $filterfield; // Field or array for searching for $filtervalue
    public $sortfield; // field to sort by
    public $items; // whole collection of models
    public $selected; // Selected IDs

    // INTERNAL
    public $candidatemodels;
    public $filtervalue;

    public function mount($candidates, $entity, $listfield = 'identifier', $listid = 'id',
        $filter = FALSE, $filterfield = [], $sortfield = '', $selected = []) {

        $this->candidates = $candidates;
        $this->entity = $entity ?? $candidates->entity;
        $this->listfield = $listfield;
        $this->listid = $listid;
        $this->filter = $filter;
        $this->filterfield = $filterfield ? explode(',', $filterfield) : [];
        $this->sortfield = $sortfield;
        $this->selected = $selected ? explode(',', $selected) : [];
    } // endfunction mount


    public function getCandidates() : Collection {
         if (Str::contains($this->candidates, '\\')) { // absolute reference to a model class
             $builder = $this->candidates::query();
         } else { // expect to find model in App\Models namespace
             $class = '\App\Models\\' . $this->candidates;
             $builder = $class::query();
         } // endif absolute reference to model class
        if (!empty($this->filterfield)) {
            foreach ($this->filterfield as $field) {
                $builder->orwhere($field, 'LIKE', '%'. $this->filtervalue .'%');
            } // endforeach looping through filterfields
        } // endif filterfield
        if (!empty($this->sortfield)) {
            $builder->orderBy($this->sortfield);
        }
        return $builder->get();
    } // endfunction getCandidates

    public function attach($id) {
        if (!is_array($this->selected)) {
            $this->selected = [];
        }
        if (!in_array($id, $this->selected)) {
            $this->selected[] = $id;
        }
        $this->dispatch('membershipchanged', selected: $this->selected);
    } // endfunction attach

    public function detach($id) {
        if (!is_array($this->selected)) {
            $this->selected = [];
            return;
        }
        $key = array_search($id, $this->selected);
        if ($key !== false) {
            unset($this->selected[$key]);
            $this->selected = array_values($this->selected); // Re-index array
        }
        $this->dispatch('membershipchanged', selected: $this->selected);
    } // endfunction detach

    public function render()  {
        $this->candidatemodels = $this->getCandidates();
        if (empty($this->entity)) {
            $this->entity = class_basename($this->candidates);
        }
        return view('euikit::components.livewire.membership' );
    } // endfunction render
} // endclass ScrollingList
