<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\HallOfFame;
use DB;
use Carbon\Carbon;
use App\Models\Koi;

class HallOfFameController extends Controller
{
    public function getIndex()
    {
        $categories = Category::active()->get()->toTree();    
        // $halloffame = HallOfFame::active()->get();
        $quotes = DB::table('hall_of_fames');

        $years = HallOfFame::active()
            ->get()
            ->groupBy(function($quotes) {
                return Carbon::parse($quotes->date)->format('Y'); // grouping by years
            });
        $kois = Koi::with(['media'])->get();
        $year_months = HallOfFame::active()
            ->get()
            ->groupBy(function($quotes) {
                return Carbon::parse($quotes->date)->format('Y-m'); // grouping by months
            });

        // foreach ($year_months as $index => $value) {
            // foreach ($value as $key => $value2) {
            //     echo $value2->date->format('Y').'<br>';
            // echo $index."  ";
            // echo $index->format('Y-m');
                // $year_m = Carbon::createFromFormat('Y-m', $index);
            // }
            // echo $year_m.'<br>';
            // echo '==========<br>';
            // echo $index->format('Y').'<br>';
        // }
        // dd($year_months);
        
        return view('frontend.hall-of-fame.index', compact('categories', 'years', 'kois'));
    }

    public function getHallOfFame($id)
    {
        $categories = Category::active()->get()->toTree();
        $halloffames = HallOfFame::find($id);
        $years = HallOfFame::active()
            ->get()
            ->groupBy(function($quotes) {
                return Carbon::parse($quotes->date)->format('Y'); // grouping by years
            });
        if(!$halloffames){
            return redirect()->back();
        }
        
        return view('frontend.hall-of-fame.hall-of-fame', compact('categories', 'halloffames', 'years'));
        
    }
}
