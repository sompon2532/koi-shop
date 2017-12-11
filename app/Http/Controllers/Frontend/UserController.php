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
use App\User;
use Auth;
use DB;

class UserController extends Controller
{
    //show favorite
    // public function getfavorite()
    // {
    //     $favorites = Auth::user()->favorites()->get();
    //     $products = Product::with('media')->get();
    //     $kois = Koi::with('media')->get();
    //     $categories = Category::active()->get()->toTree();

    //     return view('frontend.user.favorite', compact('favorites', 'products', 'kois', 'categories'));
    //     // $favorites = Favorite::where('user_id', Auth::user()->get();        
    // }
    
    public function getfavorite()
    {
        $favorites = User::find(Auth::user()->id);
        $products = Product::with('media')->get();
        $kois = Koi::with('media')->get();
        $categories = Category::active()->get()->toTree();
        
        return view('frontend.user.favorite', compact('favorites', 'products', 'kois', 'categories'));

        
            // $user = User::find(Auth::user()->id);
            // dd($kois->user);
    }

    //add favorite
    // public function postfavorite(Request $request)
    // {
    //     $insert = array(    
    //         'user_id' => Auth::user()->id,     
    //         'item_id' => $request->input('item'),                    
    //         'type' => $request->input('type'),
    //         'created_at' => Carbon::now()->toDateString()                   
    //     );
    //     DB::table('favorites')->insert($insert);
    //     return redirect()->back()->with('success', 'Successfully Favorite Item');
    // }
    public function postfavorite(Request $request)
    {   
        $insert = array(    
            'user_id' => Auth::user()->id,     
            'favorite_id' => $request->input('item'),                    
            'favorite_type' => $request->input('type'),
            'created_at' => Carbon::now()->toDateTimeString()                   
        );
        DB::table('favorites')->insert($insert);
        // dd($insert);
        return redirect()->back()->with('success', 'Successfully Favorite Item');
          
    }

    //Unfavorite
    // public function getfavoriteDel($item, $type) {
    //     // dd($type);
    //     DB::table('favorites')->where('item_id', $item)->where('type', $type)->where('user_id', Auth::user()->id)->delete();
        
    //     return redirect()->back()->with('success', 'Successfully Cancel Koi!');
    // }
    public function getfavoriteDel($id, $type)
    {
        // dd($id);
        DB::table('favorites')->where('favorite_id', $id)->where('favorite_type', $type)->where('user_id', Auth::user()->id)->delete();
        return redirect()->back()->with('success', 'Successfully Cancel Koi!');
        
    }

    public function getMyorders()
    {

        $categories = Category::active()->get()->toTree();
        
        $users = User::find(Auth::user()->id);

        // foreach ($users->orders as $order ) {
        //     return $order->products;
        // }
        // dd($users);
        // $orders = Auth::user()->orders;
        // $orders->transform(function($order, $key) {
        //     $order->cart = unserialize($order->cart);
        //     return $order;
        // }); 
        return view('frontend.user.myorder', compact('categories', 'users'));
        // return view('user.profile');
    }

    public function getMyports()
    {
        $categories = Category::active()->get()->toTree();
        $kois = Koi::with('media')->where('user_id', Auth::user()->id)->get();
        return view('frontend.user.myport', compact('categories', 'kois'));
    }

    public function getMyportKoi($id)
    {
        $koi = Koi::with(['media'])->find($id);
        $categories = Category::active()->get()->toTree();

        return view('frontend.user.myport-koi', compact('koi','categories'));
        
    }
    
}
