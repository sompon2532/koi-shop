<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Requests\Store\CreateStoreRequest;
use App\Http\Requests\Store\UpdateStoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::get();

        return view('backoffice.store.index', compact('store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStoreRequest $request)
    {
        $store = Store::create($request->all());

        return redirect()
            ->route('store.edit', ['store' => $store->id])
            ->with(['success' => 'Create store success']);
    }

    /**
     * Display the specified resource.
     *
     * @param Store $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('backoffice.store.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Store $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('backoffice.store.update', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStoreRequest $request
     * @param Store $store
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->update($request->all());

        return redirect()
            ->route('store.edit', ['store' => $store->id])
            ->with(['success' => 'Update farm success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Store $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();

        return;
    }
}
