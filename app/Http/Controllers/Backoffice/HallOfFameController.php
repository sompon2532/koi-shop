<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Requests\HallOfFame\CreateHallOfFameRequest;
use App\Http\Requests\HallOfFame\UpdateHallOfFameRequest;
use App\Models\HallOfFame;
use App\Models\Koi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HallOfFameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hall_of_fames = HallOfFame::get();

        return view('backoffice.hall-of-fame.index', compact('hall_of_fames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.hall-of-fame.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateHallOfFameRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHallOfFameRequest $request)
    {
        $input = $request->all();

        $input['date'] = Carbon::createFromFormat('d/m/Y', $request->date)->toDateString();

        $hall_of_fame = HallOfFame::create($input);

        return redirect()
            ->route('hall-of-fame.edit', ['hall_of_fame' => $hall_of_fame->id])
            ->with(['success' => 'Create hall of fame success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(HallOfFame $hall_of_fame)
    {
        $koi_id = $hall_of_fame->kois->pluck('id');
        $kois = Koi::whereNotIn('id', $koi_id)->get();

        $hall_of_fame->load('kois');

        return view('backoffice.hall-of-fame.detail', compact('hall_of_fame', 'kois'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param HallOfFame $hall_of_fame
     * @return \Illuminate\Http\Response
     */
    public function edit(HallOfFame $hall_of_fame)
    {
        return view('backoffice.hall-of-fame.update', compact('hall_of_fame'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateHallOfFameRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHallOfFameRequest $request, HallOfFame $hall_of_fame)
    {
        $input = $request->all();

        $input['date'] = Carbon::createFromFormat('d/m/Y', $request->date)->toDateString();

        $hall_of_fame->update($input);

        return redirect()
            ->route('hall-of-fame.edit', ['hall_of_fame' => $hall_of_fame->id])
            ->with(['success' => 'Update hall of fame success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HallOfFame $hall_of_fame)
    {
        $hall_of_fame->delete();

        return;
    }

    public function addKoiToHall(Request $request) {
        $hall_of_fame = HallOfFame::find($request->get('hall_of_fame_id'));

        $hall_of_fame->kois()->attach([
            'koi_id' => $request->get('koi_id')
        ]);
    }

    public function dropKoiFromHall(HallOfFame $hallOfFame, Koi $koi) {
        $hallOfFame->kois()->detach($koi->id);

        return redirect()->back();
    }
}
