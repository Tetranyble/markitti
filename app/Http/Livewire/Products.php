<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

//    public $sortAsc = true;
    public $search = '';
//    public $category = '';
//    public $active = true;

    protected $queryString = ['search'];

    public function sortBy(){
        $this->sortAsc = !$this->sortAsc;
    }
//    public function updatingSearch(){
//        $this->resetPage();
//    }

    public function clearAll(){
        $this->category= '';
        $this->search = '';
    }

    public function render()
    {

        $store = \App\Services\Stores::stores();
//        $products = Product::with('resource', 'category')
//            ->when($this->search ?? false, function ($q, $search){
//                $q->where('name', 'like', '%'. $search .'%');
//            })
//            ->where('store_id', $store->id)->paginate();



        return view('livewire.products', [
            'products' => Product::with('resource', 'category')
                ->when($this->search ?? false, function ($q, $search){
                    $q->where('name', 'like', '%'. $search .'%');
                })
                ->where('store_id', $store->id)
                ->paginate(),
            'productCount' => Product::where('is_active', true)->count(),
            'categories' => Category::all(),
        ]);
    }
}
