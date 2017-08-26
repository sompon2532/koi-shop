<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Strain;
use App\Models\Farm;
use App\Models\Koi;

class KoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kois = Koi::all();

        return view('backoffice.koi.index', compact('kois'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::active()->group('koi')->get()->toTree();
        $strains = Strain::active()->get();
        $farms = Farm::active()->get();

        return view('backoffice.koi.create', compact('categories', 'strains', 'farms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $koi = Koi::create($request->all());

        return redirect()->route('koi.edit', ['koi' => $koi->id]);
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
    public function edit(Koi $koi)
    {
        $categories = Category::active()->group('koi')->get()->toTree();
        $strains = Strain::active()->get();
        $farms = Farm::active()->get();

        return view('backoffice.koi.update', compact('koi', 'categories', 'strains', 'farms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Koi $koi)
    {
        $inputs = $request->all();

        if (! $request->has('certificate')) {
            $inputs['certificate'] = 0;
        }

        $koi->update($inputs);

        return redirect()->route('koi.edit', ['koi' => $koi->id]);
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
