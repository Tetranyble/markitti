<?php

namespace App\Http\Controllers;

use App\Services\Stores;
use Illuminate\Http\Request;

class StoreFrontEntryController extends Controller
{
    protected $store;

    public function __construct(Stores $store)
    {
        $this->store = $store;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Stores $store
     * @return void
     */
    public function index(Stores $store)
    {
        $storeType = $store->store()->storeType;
        return view("{$storeType->slug}.index")->with([
            'store' => $store->store()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
