<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Banner;
use App\Models\HallOfFame;
use DB;
use Carbon\Carbon;
use App\Models\Koi;

class HallOfFameController extends Controller
{
    public function getIndex()
    {
        $categories = Category::active()->get()->toTree();  
        $banner = Banner::with(['media'])->active()->first();

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

        // $koi = Koi::with(['media'])->get();
        // foreach ($koi as $key => $value) {
        //     if(count($value->hallOfFames)>0){
        //         echo $value->name."<br>";
        //         foreach ($value->hallOfFames as $index => $hall) {
        //             echo $hall->name."<br>";
        //         }
        //     }
        //     echo "<br>---------<br>";
        // }
        // $halloffame = HallOfFame::active()->get();
        // dd($halloffame);
        // foreach ($halloffame as $key => $value) {
        //     echo $value->kois."<br><br>";
        // }
        // dd();
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
        
        return view('frontend.hall-of-fame.index', compact('categories', 'banner', 'years', 'kois'));
    }

    public function getHallOfFame($id)
    {
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();
        $halloffames = HallOfFame::find($id);
        $years = HallOfFame::active()
            ->get()
            ->groupBy(function($quotes) {
                return Carbon::parse($quotes->date)->format('Y'); // grouping by years
            });
        if(!$halloffames){
            return redirect()->back();
        }
        
        return view('frontend.hall-of-fame.hall-of-fame', compact('categories', 'banner', 'halloffames', 'years'));
        
    }
}
