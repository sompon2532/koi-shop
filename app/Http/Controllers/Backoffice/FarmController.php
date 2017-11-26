<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Requests\Farm\CreateFarmRequest;
use App\Http\Requests\Farm\UpdateFarmRequest;
use App\Http\Controllers\Controller;
use App\Models\Farm;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farms = Farm::all();

        return view('backoffice.farm.index', compact('farms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.farm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFarmRequest $request)
    {
        $farm = Farm::create($request->all());

        return redirect()
                ->route('farm.edit', ['farm' => $farm->id])
                ->with(['success' => 'Create farm success']);
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
    public function edit(Farm $farm)
    {
        return view('backoffice.farm.update', compact('farm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFarmRequest $request, Farm $farm)
    {
        $farm->update($request->all());

        return redirect()
                ->route('farm.edit', ['farm' => $farm->id])
                ->with(['success' => 'Update farm success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
        $farm->delete();

        return;
    }
}
