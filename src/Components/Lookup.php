<?php namespace eafarris\euikit\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Lookup extends Component {

    public $model; // model that populates select
    public $name; // name for the HTML entities
    public $field; // field for this form
    public $models; // internal
    public $value; // current value
    public $label;  // text for <label>
    public $optionfield; // field to hydrate <option>
    public $filterfield; // only show option if true
    public $sortby; // field on model for sorting options
    public $sortdirection; // can pass 'desc' for reverse sort

    public $nolabel = false; // hide the label?

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $field = '', $value = '', $label = '', $filterfield = '', $sortby = '', $sortdirection = 'asc', $optionfield = '', $name = '') {
        $this->label = $label ?: ucfirst($model);
        $this->model = $model;
        $this->value = $value;
        $this->field = $field ?: $model;
        $this->filterfield = $filterfield;
        $this->sortby = $sortby;
        $this->sortdirection = $sortdirection;
        $this->optionfield = $optionfield ?: $this->field;
        $this->name = $name ?: $field ?: $model . '_id';
    }

    public function getModel() { // 
        if (Str::contains($this->model, '\\')) { // absolute reference to a model class
            $allmodels = $this->model::all();
        } else {
            $class = '\App\Models\\' . $this->model;
            $allmodels = $class::all();
        }
        if (empty($this->filterfield)) {
            $models = $allmodels;
        } else {
            $models = $allmodels->where($this->filterfield);
        }
        if (!empty($this->sortby)) {
            if ($this->sortdirection == 'desc') {
                $models = $models->sortByDesc($this->sortby);
            } else {
                $models = $models->sortBy($this->sortby);
            }
        }
        return $models;
    } // endfunction getModel

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        $this->models = $this->getModel();
        return view('e::components.form.lookup');
    }
}