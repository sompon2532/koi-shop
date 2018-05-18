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
        $kois = Koi::with(['media'])->get();
        $categories = Category::active()->get()->toTree();

        return view('frontend.koi.index', compact('kois','categories'));
        
    }

    public function getKoiCategory($category)
    {
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
        $kois = Koi::with(['media'])->find($id);

        if($kois)
        {
            // $kois->load('sizes', 'contests', 'remarks', 'strain');
            $kois->load('sizes', 'remarks', 'strain');
        }else{
            return redirect()->back();
        }
        
        if(Auth::user() == null){
            $favorites = null;
        }else{
            $favorites = Favorite::where('favorite_type', 'App\Models\Koi')->where('user_id', Auth::user()->id)->get();            
        }

        $categories = Category::active()->get()->toTree();

        return view('frontend.koi.detail', compact('kois', 'favorites', 'categories'));
        
    }
}
