<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Banner;
use App\Models\KoiContest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hall;
use Illuminate\Support\Facades\DB;

class HallController extends Controller
{
    public function getIndex() {
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();

        $years = DB::table('halls')
            ->select(DB::raw('YEAR(contest_date) as year'))
            ->groupBy('year')
            ->orderBy('year', 'DESC')
            ->get();
        $contests = Hall::orderBy('contest_date', 'DESC')->get();

        return view('frontend.hallOfFame.index')->with([
            'years' => $years,
            'contests' => $contests,
            'categories' => $categories,
            'banner' => $banner
        ]);
    }

    public function getDisplay() {
        $topMenus = Klibs::getTopMenu();
        $bottomMenus = Klibs::getBottomMenu();
        $header = Klibs::getHeader();
        $years = DB::table('contests')
            ->select(DB::raw('YEAR(contest_date) as year'))
            ->groupBy('year')
            ->orderBy('year', 'DESC')
            ->get();
        $contests = Contest::orderBy('contest_date', 'DESC')->get();

        return view('fontend.hallOfFame.display')->with([
            'years' => $years,
            'contests' => $contests,
            'topMenus' => $topMenus,
            'bottomMenus' => $bottomMenus,
            'lang' => Klibs::getLang(),
            'header' => $header
        ]);
    }

    public function getDetail($id) {
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();
        $kois = KoiContest::where('contest_id', $id)->get();
        $contest = Hall::find($id);

        return view('frontend.hallOfFame.detail')->with([
            'kois' => $kois,
            'contest' => $contest,
            'categories' => $categories,
            'banner' => $banner
        ]);
    }

    public function getLdesplay($id) {
        $topMenus = Klibs::getTopMenu();
        $bottomMenus = Klibs::getBottomMenu();
        $header = Klibs::getHeader();
        $kois = KoiContest::where('contest_id', $id)->get();
        $contest = Contest::find($id);

        return view('fontend.hallOfFame.ldesplay')->with([
            'kois' => $kois,
            'contest' => $contest,
            'topMenus' => $topMenus,
            'bottomMenus' => $bottomMenus,
            'lang' => Klibs::getLang(),
            'header' => $header
        ]);
    }
}
