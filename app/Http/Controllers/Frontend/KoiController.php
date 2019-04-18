<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Koi;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Favorite;
use App\Models\Product;
use App\User;
use Auth;
use DB;

class KoiController extends Controller
{
    public function getIndex()
    {
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();
        $menus = Category::active()
            ->where('group', 'koi')
            ->where('parent_id', null)
            ->with(['media'])
            ->orderBy('seq')
            ->get()
            ->toTree();
        $kois = Koi::active()->with(['media'])->where('event_id', null)->paginate(20);

        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            $kois->load(['favorite' => function($query) use($user) {
                $query->where('user_id', $user->id)->where('favorite_type', 'App\Models\Koi');
            }]);
        } else {
            $kois->load(['favorite' => function($query) {
                $query->where('user_id', 0)->where('favorite_type', 'App\Models\Koi');
            }]);
        }
        
        if (count($menus)>0) {
            return view('frontend.koi.menu', compact('menus', 'categories', 'banner'));
        } else {
            return view('frontend.koi.index', compact('kois','categories', 'banner'));
        }
    }

    public function getKoiCategory(Category $category)
    {
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();
        $menus = Category::active()
            ->where('parent_id', $category->id)
            ->with(['media'])
            ->orderBy('seq')
            ->get()
            ->toTree();
        $kois = Koi::active()
            ->with(['media'])
            ->where('category_id', $category->id)
            ->where('event_id', null)
            ->paginate(20);

        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            $kois->load(['favorite' => function($query) use($user) {
                $query->where('user_id', $user->id)->where('favorite_type', 'App\Models\Koi');
            }]);
        } else {
            $kois->load(['favorite' => function($query) {
                $query->where('user_id', 0)->where('favorite_type', 'App\Models\Koi');
            }]);
        }

        if (count($menus)>0) {
            return view('frontend.koi.menu', compact('menus', 'category', 'categories', 'banner'));
        } else {
            return view('frontend.koi.category', compact('kois', 'category', 'categories', 'banner'));
        }
    }

    public function getDetail(Koi $koi)
    {
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();

        if(Auth::user())
        {
            $user = User::find(Auth::user()->id);
            $koi->load(['favorite' => function($query) use($user, $koi) {
                $query->where('user_id', $user->id)->where('favorite_type', 'App\Models\Koi')->where('favorite_id', $koi->id);
            }]);
        } else {
            $koi->load(['favorite' => function($query) use($koi) {
                $query->where('user_id', 0)->where('favorite_type', 'App\Models\Koi')->where('favorite_id', $koi->id);
            }]);
        }

        return view('frontend.koi.detail', compact('koi', 'categories', 'banner'));
    }

    /**
     * @param Event $event
     * @param Koi $koi
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showKoiDetail(User $user, Koi $koi) {
        dd($user);
        $user->load(['favorite' => function($query) use($user) {
            $query->where('user_id', $user->id );
        }]);

        dd($user);
        dd($user->favorite);

        return view('backoffice.event.koi', compact('event', 'koi'));
    }
}
