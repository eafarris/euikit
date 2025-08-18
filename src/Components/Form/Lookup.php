<?php namespace eafarris\euikit\Components\Form;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Lookup extends Component {

    public $model; // model that populates select
    public $field; // field for this form
    public $models; // internal
    public $value; // current value
    public $label;  // text for <label>
    public $inline = FALSE; // true to hide <label>
    public $optionvalue = 'id'; // values for form submit
    public $optionfield; // field to hydrate <option>
    public $filterfield; // only show option if true
    public $sortby; // field on model for sorting options
    public $sortdirection; // can pass 'desc' for reverse sort
    public $any = FALSE; // Allow for an "any" choice
    public $anyvalue = 'any'; // What 'any' means to the model
    public $none = FALSE; // Allow for a "none" choice
    public $nonevalue = 0; // What "none" means to the model


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $field = '', $value = '', $label = '', $inline = FALSE,
        $filterfield = '', $sortby = '', $sortdirection = 'asc', $optionvalue = 'id',
        $optionfield = '', $any = FALSE, $anyvalue = '', $none = FALSE, $nonevalue = 0) {

        $this->label = $label ?: ucfirst($model);
        $this->inline = $inline;
        $this->model = $model;
        $this->value = $value;
        $this->field = $field ?: $model;
        $this->filterfield = $filterfield;
        $this->sortby = $sortby;
        $this->sortdirection = $sortdirection;
        $this->optionvalue = $optionvalue ?: $model . '_id';
        $this->optionfield = $optionfield ?: $this->field;
        $this->any = $any;
        $this->anyvalue = $anyvalue;
        $this->none = $none;
        $this->nonevalue = $nonevalue;
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
        return view('euikit::components.form.lookupcomponent');
    }
}
