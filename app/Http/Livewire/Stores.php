<?php

namespace App\Http\Livewire;

use App\Models\Store;
use App\Models\StoreType;
use Livewire\Component;
use Livewire\WithPagination;

class Stores extends Component
{
    use WithPagination;

    public $active = true;
    public $storeSearch;
    public $sortField;
    public $sortAsc = true;
    public $storeType;

    protected $queryString = ['storeSearch', 'active', 'sortAsc', 'sortField', 'storeType'];

    public function sortBy($field){
        if ($this->sortField == $field){
            $this->sortAsc = !$this->sortAsc;
        }else{
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function updatingStoreSearch(){
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.stores', [
            'stores' => (new Store)->filter([
                'storeSearch' => $this->storeSearch,
                'field' => $this->sortField,
                'sortAsc' => $this->sortAsc,
                'active' => $this->active,
                'store' => $this->storeType
            ])->paginate(10),
            'storeTypes' => StoreType::get()
        ]);
    }
}
