<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::with('media')
            ->orderBy('seq')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('backoffice.menu.index', compact('menus'));
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
    public function edit(Menu $menu)
    {
        $menu->load('media');

        return view('backoffice.menu.update', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        if ($menu->seq == $request->seq) {
            $menu->update($request->all());
        } else {
          $target = Menu::where('seq', $request->seq)->first();

          if($target) {
              $target->update(['seq' => $menu->seq]);
          }

          $menu->update($request->all());
        }

        // Cover
        if ($request->hasFile('cover')) {
            $menu->clearMediaCollection('menu');
            $menu->addMedia($request->file('cover'))->toMediaCollection('menu');
        }

        return redirect()
            ->route('menu.edit', ['menu' => $menu->id])
            ->with(['success' => 'Update data success']);
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
