<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Requests\Strain\CreateStrainRequest;
use App\Http\Requests\Strain\UpdateStrainRequest;
use App\Http\Controllers\Controller;
use App\Models\Strain;

class StrainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $strains = Strain::all();

        return view('backoffice.strain.index', compact('strains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.strain.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStrainRequest $request)
    {
        $strain = Strain::create($request->all());

        return redirect()
                ->route('strain.edit', ['strain' => $strain->id])
                ->with(['success' => 'Create strain success']);
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
    public function edit(Strain $strain)
    {
        return view('backoffice.strain.update', compact('strain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStrainRequest $request, Strain $strain)
    {
        $strain->update($request->all());

        return redirect()
                ->route('strain.edit', ['strain' => $strain->id])
                ->with(['success' => 'Update strain success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Strain $strain)
    {
        $strain->delete();

        return;
    }
}
