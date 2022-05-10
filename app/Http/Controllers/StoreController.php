<?php

namespace App\Http\Controllers;

use App\Jobs\ConfirmServerConfiguration;
use App\Jobs\GenerateServerBlock;
use App\Jobs\ReloadServerConfiguration;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Store::first()->server;
            //->map(fn($domain) => [$domain,"www.".$domain])->flatten(1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $store = Store::create([
            'name' => 'new store front',
            'server' => Str::slug('store front two'),
            'description' => 'The quick brown fox store that sales nothing apparently.',
        ]);
        $store->domains()->create([
            'domain' => 'syndicate',
        ]);
        $store->domains()->create([
            'domain' => 'syndicate.com',
        ]);
        Bus::chain([
            new GenerateServerBlock($store),
            new ReloadServerConfiguration()
        ])->dispatch();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
