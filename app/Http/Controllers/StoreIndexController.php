<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Services\Stores;
use Illuminate\Http\Request;

class StoreIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Stores $store
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request, Stores $store)
    {
       $products = Product::with('resources')->productBanners()
           ->where('store_id', $store->id())->limit(3)->get();
       $home = Page::with('features')->type('home')->where('store_id', $store->id())->first();
       $categories = Category::with('products.resources')->where('store_id', $store->id())->limit(3)->get();
        //dd($categories->products);


        return view("stores.{$store->store()->storeType->slug}.index",
        compact('products', 'home', 'categories')
        );
    }
}
