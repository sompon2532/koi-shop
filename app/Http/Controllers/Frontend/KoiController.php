<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Koi;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;
use App\User;
use Auth;
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
        $categories = Category::active()->get()->toTree();

        return view('frontend.koi.index', compact('kois','categories'));
        
    }

    public function getKoiCategory($category)
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

        $kois = Koi::with(['media'])->where('category_id', $category)->where('event_id', null)->paginate(20);
        $koiCategory = Category::find($category);
        $categories = Category::active()->get()->toTree();
        if(Auth::user() == null){
            $favorites = null;
        }else{
            $favorites = Favorite::where('favorite_type', 'App\Models\Koi')->where('user_id', Auth::user()->id)->get();            
        }

        return view('frontend.koi.category', compact('kois', 'favorites', 'koiCategory', 'categories'));
        
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
        // dd($favorites);
        $categories = Category::active()->get()->toTree();

        if(Auth::user() == null){
            $favorites = null;
        }else{
            $favorites = Favorite::where('favorite_type', 'App\Models\Koi')->where('user_id', Auth::user()->id)->get();            
        }

        return view('frontend.koi.detail', compact('kois','favorites', 'categories'));
        
    }
}
