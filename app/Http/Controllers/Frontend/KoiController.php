<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Koi;
use App\Models\Category;

use DB;

class KoiController extends Controller
{
    public function getIndex()
    {
        // $kois = Koi::all();
        // // $images = Koi::with(['media'])->get();
        // $images = DB::table('kois')
        // ->Join('media', 'kois.id', '=', 'media.model_id')
        // ->select('kois.*', 'media.*')
        // ->where('media.collection_name', '=', 'koi')
        // ->get();
        // // $images = $kois->getMedia('koi');
        // // dd($images);
        // // return $kois;
        // return view('frontend.koi.index', [
        //     'kois' => $kois,
        //     'images' => $images
        // ]);

        $kois = Koi::with(['media'])->get();
        $categories = Category::get()->toTree();

        return view('frontend.koi.index', compact('kois','categories'));
        
    }

    public function getKoiCategory($categoty)
    {
        // $kois = Koi::all();
        // // $images = Koi::with(['media'])->get();
        // $images = DB::table('kois')
        // ->Join('media', 'kois.id', '=', 'media.model_id')
        // ->select('kois.*', 'media.*')
        // ->where('media.collection_name', '=', 'koi')
        // ->get();
        // // $images = $kois->getMedia('koi');
        // // dd($images);
        // // return $kois;
        // return view('frontend.koi.index', [
        //     'kois' => $kois,
        //     'images' => $images
        // ]);

        $kois = Koi::with(['media'])->where('category_id', $categoty)->get();
        $koiCategoty = Category::find($categoty);
        $categories = Category::get()->toTree();

        return view('frontend.koi.category', compact('kois','koiCategoty', 'categories'));
        
    }

    public function getDetail($id)
    {
        // $kois = Koi::find($id);
        // $images = $kois->getMedia('koi');
        // // dd($images);
        // return view('frontend.koi.detail', [
        //     'kois' => $kois
        //     // 'images' => $images
        // ]);

        $kois = Koi::with(['media'])->find($id);
        $categories = Category::get()->toTree();

        return view('frontend.koi.detail', compact('kois','categories'));
        
    }
}
