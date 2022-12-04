<?php

namespace App\Http\Livewire;

use App\Models\StoreType;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $isBlocked;
    public $isVerified;
    public $active = '';
    public $storeSearch;
    public $sortField;
    public $sortAsc = true;
    public $storeType;

    protected $queryString = ['storeSearch', 'active', 'sortAsc', 'sortField', 'storeType'];

    public function block($id)
    {
        $this->isBlocked = $id;
    }
    public function cancelIsBlocked()
    {
        $this->isBlocked = null;
    }

    public function confirmIsBlocked($userId)
    {
        User::find($userId)->isBlocked();
        $this->isBlocked = null;
    }

    public function verified($id)
    {
        $this->isVerified = $id;
    }
    public function cancelVerification()
    {
        $this->isVerified = null;
    }

    public function confirmVerification($userId)
    {
        User::find($userId)->markEmailAsVerified();
        $this->isVerified = null;
    }

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
        return view('livewire.users',[
            'users' => (new User)->filter([
                'storeSearch' => $this->storeSearch,
                'field' => $this->sortField,
                'sortAsc' => $this->sortAsc,
                'active' => $this->active,
                'storeId' => $this->storeType
            ])->paginate(10),
            'storeTypes' => StoreType::get()
        ]);
    }
}
