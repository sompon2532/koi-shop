<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Koi;
use DB;

class KoiController extends Controller
{
    public function getIndex()
    {
        $kois = Koi::all();
        // $images = Koi::with(['media'])->get();
        $images = DB::table('kois')
        ->Join('media', 'kois.id', '=', 'media.model_id')
        ->select('kois.*', 'media.*')
        ->where('media.collection_name', '=', 'koi')
        ->get();
        // $images = $kois->getMedia('koi');
        // dd($images);
        // return $kois;
        return view('frontend.koi.index', [
            'kois' => $kois,
            'images' => $images
        ]);
        
    }

    public function getDetail($id)
    {
        $kois = Koi::find($id);
        $images = $kois->getMedia('koi');
        // dd($images);
        return view('frontend.koi.detail', [
            'kois' => $kois
            // 'images' => $images
        ]);
        
    }
}
