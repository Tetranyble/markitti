<?php

namespace App\Http\Controllers;

use App\Models\StoreType;
use Illuminate\Http\Request;

class StoreTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $storeTypes = (new StoreType)->filter($request)->paginate()->withQueryString();
        //return view();
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
     * @param  \App\Models\StoreType  $storeType
     * @return \Illuminate\Http\Response
     */
    public function show(StoreType $storeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StoreType  $storeType
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreType $storeType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StoreType  $storeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoreType $storeType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StoreType  $storeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreType $storeType)
    {
        //
    }
}
