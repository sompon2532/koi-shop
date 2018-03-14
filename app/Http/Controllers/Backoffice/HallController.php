<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Hall;
use App\Models\KoiContest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use DB;
use File;

class HallController extends Controller
{
    public function getIndex() {
        $select = array(
            'id',
            'title',
            'contest_date',
            DB::raw('(SELECT COUNT(*) FROM koi_contests WHERE koi_contests.contest_id = halls.id) AS koi')
        );
        $contests = Hall::select($select)->orderBy('contest_date', 'DESC')->get();
        return view('backoffice.hallOfFame.index')->with([
            'contests' => $contests
        ]);
    }

    public function getAddContest() {
        return view('backoffice.hallOfFame.contest.create');
    }

    public function postAddContest(Request $request) {
        // Validate input form
        $validator = Validator::make($request->all(), [
            'title'        => 'required',
            'detail'       => 'required',
            'contest_date' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $date = $request->contest_date;
        $part_date_start = explode('/', $date);
        $contest_date  = "$part_date_start[2]-$part_date_start[1]-$part_date_start[0]";

        Hall::create([
            'title' => $request->title,
            'detail' => $request->detail,
            'contest_date' => $contest_date
        ]);

        return redirect('admin/hall-of-fame');
    }

    public function getDetail($id) {
        $contest = Hall::where('id', $id)->first();
        $kois = KoiContest::where('contest_id', $id)->get();
        return view('backoffice.hallOfFame.contest.detail')->with([
            'contest' => $contest,
            'kois' => $kois
        ]);
    }

    public function getEdit($id) {
        $contest = Hall::where('id', $id)->first();
        return view('backoffice.hallOfFame.contest.edit')->with([
            'contest' => $contest
        ]);
    }

    public function postEdit(Request $request) {
        // Validate input form
        $validator = Validator::make($request->all(), [
            'title'        => 'required',
            'detail'       => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $contest = Hall::find($request->id);

        if( $request->contest_date != '' ) {
            $date = $request->contest_date;
            $part_date_start = explode('/', $date);
            $contest_date  = "$part_date_start[2]-$part_date_start[1]-$part_date_start[0]";
        }
        else {
            $contest_date = $contest->contest_date;
        }

        $contest->title = $request->title;
        $contest->detail = $request->detail;
        $contest->contest_date = $contest_date;
        $contest->save();

        return redirect("admin/hall-of-fame");
    }

    public function getDelete($id) {
        Hall::where('id', $id)->delete();
        return back();
    }

    public function getAddKoi() {
        $contests = Hall::orderBy('contest_date', 'DESC')->get();
        return view('backoffice.hallOfFame.kois.create')->with([
            'contests' => $contests
        ]);
    }

    public function postAddKoi(Request $request) {
        // Validate input form
        $validator = Validator::make($request->all(), [
            'award'    => 'required',
            'owner'    => 'required',
            'breeder'  => 'required',
            'dealer'   => 'required',
            'handled'  => 'required',
            'image'    => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Manage Image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('his')."_hallOfFame_".$image->getClientOriginalName();
            $public_path = "hallOfFame";
            $destination = base_path()."/public/".$public_path;
            $request->file('image')->move($destination, $filename);
        }

        KoiContest::create([
            'award'      => $request->award,
            'owner'      => $request->owner,
            'breeder'    => $request->breeder,
            'dealer'     => $request->dealer,
            'handled'    => $request->handled,
            'image'      => $filename,
            'contest_id' => $request->contest
        ]);

        return redirect('admin/hall-of-fame');
    }

    public function getKoiDetail($id) {
        $koi = KoiContest::where('koi_contests.id', $id)
            ->leftJoin('halls', 'koi_contests.contest_id', '=', 'halls.id')
            ->first();

        return view('backoffice.hallOfFame.kois.detail')->with([
            'koi' => $koi
        ]);
    }

    public function getKoiEdit($id) {
        $contests = Hall::get();
        $koi = KoiContest::find($id);
        return view('backoffice.hallOfFame.kois.edit')->with([
            'koi' => $koi,
            'contests' => $contests
        ]);
    }

    public function postKoiEdit(Request $request) {
        // Validate input form
        $validator = Validator::make($request->all(), [
            'award'    => 'required',
            'owner'    => 'required',
            'breeder'  => 'required',
            'dealer'   => 'required',
            'handled'  => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $koi = KoiContest::find($request->id);
        // Manage Image
        if( $request->hasFile('image') ) {
            $public_path = "hallOfFame";
            File::Delete($public_path."/".$koi->image);
            $image = $request->file('image');
            $filename = date('his')."_hallOfFame_".$image->getClientOriginalName();
            $destination = base_path()."/public/".$public_path;
            $request->file('image')->move($destination, $filename);
        }
        else {
            $filename = $koi->image;
        }

        $koi->award      =  $request->award;
        $koi->owner      =  $request->owner;
        $koi->breeder    =  $request->breeder;
        $koi->dealer     =  $request->dealer;
        $koi->handled    =  $request->handled;
        $koi->image      =  $filename;
        $koi->contest_id =  $request->contest;
        $koi->save();

        return redirect("admin/hall-of-fame/detail/$koi->contest_id");
    }

    public function getKoiDelete($id) {
        $koi = KoiContest::find($id);

        $public_path = "hallOfFame";
        File::Delete($public_path."/".$koi->image);

        $koi->delete();

        return redirect("admin/hall-of-fame/detail/$koi->contest_id");
    }
}
