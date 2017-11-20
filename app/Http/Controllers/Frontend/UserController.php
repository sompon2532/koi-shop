<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Koi;
use App\Models\Order;
use Carbon\Carbon;
use Auth;
use DB;

class UserController extends Controller
{
    //show favorite
    public function getfavorite()
    {
        $favorites = Auth::user()->favorites()->get();
        $products = Product::with('media')->get();
        $kois = Koi::with('media')->get();
        $categories = Category::active()->get()->toTree();

        return view('frontend.user.favorite', compact('favorites', 'products', 'kois', 'categories'));
        // $favorites = Favorite::where('user_id', Auth::user()->get();        
    }

    //add favorite
    public function postfavorite(Request $request)
    {
        $insert = array(    
            'user_id' => Auth::user()->id,     
            'item_id' => $request->input('item'),                    
            'type' => $request->input('type'),
            'created_at' => Carbon::now()->toDateString()                   
        );
        DB::table('favorites')->insert($insert);
        return redirect()->back()->with('success', 'Successfully Favorite Item');
    }

    //Unfavorite
    public function getfavoriteDel($item, $type) {
        // dd($type);
        DB::table('favorites')->where('item_id', $item)->where('type', $type)->where('user_id', Auth::user()->id)->delete();
        
        return redirect()->back()->with('success', 'Successfully Cancel Koi!');
    }

    public function getMyorders() {
        $categories = Category::active()->get()->toTree();
        
        $orders = Auth::user()->orders;
        // dd($orders);
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        }); 
        return view('frontend.user.myorder', compact('orders', 'categories'));
        // return view('user.profile');
    }

    
}
