<?php namespace eafarris\euikit\Livewire;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class SheetImport extends Component {
    use WithFileUploads;

    public $fields;
    public $headerrow = TRUE;
    public $importfield;
    public $importfile;
    public $iteration = 0;
    public $type;

    public function mount($fields = [], $type = 'button') {
        $this->type = $type;
        $this->fields = $fields;
        $this->setImportfield();
    }

    public function setImportfield() {
        $this->importfield = Str::wrap(implode('","', $this->fields), '"') . "\n";
    }

    public function render() {
        return view('e::components.livewire.sheet-import');
    }

    public function import() {
        if (! $this->importfile) {  // No file, import string
            $lines = explode(PHP_EOL, $this->importfield);
        } // endif no file attached
        else { // file uploaded
            $path = $this->importfile->getRealPath();
            $lines = file($path);
        }
        if ($this->headerrow) {
            $headerrow = $lines[0];
            $lines = Arr::except($lines, 0);
        } // endif header row ()
        $items = $this->parse($lines);
        $this->importfile = NULL;
        $this->iteration++; // see https://talltips.novate.co.uk/livewire/livewire-file-uploads-using-s3#removing-filename-from-input-field-after-upload
        $this->setImportfield();
        $this->dispatch('imported', importedItems: $items);
    }

    private function parse($csv) {
        $items = collect();
        foreach ($csv as $line) {
            $line = trim($line);
            $line_array = str_getcsv($line);
            if (count($line_array) > 1) {
                foreach ($this->fields as $index => $field) {
                    $item[$field] = $line_array[$index];
                }
                $items->push($item);
            }
        }
        return $items;
    }
}
