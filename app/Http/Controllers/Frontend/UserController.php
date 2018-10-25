<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Koi;
use App\Models\Order;
use App\Models\Address;
use App\User;
use Carbon\Carbon;
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
    public function getProfile()
    {
        $categories = Category::active()->get()->toTree();
        $user = User::find(Auth::user()->id);
        $user->load(['address']);
        
        return view('frontend.user.profile', compact('categories', 'user'));
    }

    public function postProfile(Request $request)
    {
        $categories = Category::active()->get()->toTree();
        $inputs = $request->all();
        // dd($inputs);
        $user = User::find(Auth::user()->id);
        $address = Address::where('user_id', Auth::user()->id)->first();

        $user->update($inputs);

        if($address){
            $address->update($inputs);
        } else {
            $inputs['user_id'] = Auth::user()->id;
            $address = Address::create($inputs);
        }
        if($address){
            return redirect()->back()->with('success', 'Successfully Edit Profile');
        } else {
            return redirect()->back()->with('error', 'Error can not edit profile');
        }
    }

    public function getChangePasswordForm()
    {
        $categories = Category::active()->get()->toTree();

        return view('frontend.user.changepass', compact('categories'));
    }

    public function postChangePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
    }
        
    
    public function getfavorite()
    {
        $categories = Category::active()->get()->toTree();
        $favorites = User::find(Auth::user()->id);
        $products = Product::active()->get();
        $kois = Koi::active()->get();

        $user = User::find(Auth::user()->id);
        $kois->load(['favorite' => function($query) use($user) {
            $query->where('user_id', $user->id)->where('favorite_type', 'App\Models\Koi');
        }]);

        $products->load(['favorite' => function($query) use($user) {
            $query->where('user_id', $user->id)->where('favorite_type', 'App\Models\Product');
        }]);
// dd($kois);
        return view('frontend.user.favorite', compact('favorites', 'products', 'kois', 'categories'));
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
        $favorites = Favorite::where('favorite_id',$request->input('item'))->where('favorite_type', $request->input('type'))->where('user_id', Auth::user()->id)->get();
        if(count($favorites) == 0){
            $insert = array(    
                'user_id' => Auth::user()->id,     
                'favorite_id' => $request->input('item'),                    
                'favorite_type' => $request->input('type'),
                'created_at' => Carbon::now()->toDateTimeString()                   
            );
            DB::table('favorites')->insert($insert);
        }
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

        $orders = Order::where('user_id', Auth::user()->id)->get();
        // dd($orders);
        // $order = Order::find(13);

        // dd($order->transaction->id);
        // foreach ($order as $value) {
        //     return $value->transaction->status;
        // }
        // dd($users->orders);
        // foreach ($users->orders as $order ) {
        //     dd( $order->transaction);
        // }
        // dd($users);
        // $orders = Auth::user()->orders;
        // $orders->transform(function($order, $key) {
        //     $order->cart = unserialize($order->cart);
        //     return $order;
        // }); 
        return view('frontend.user.myorder', compact('categories', 'users', 'orders'));
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
        $kois = Koi::with(['media'])->find($id);
        $categories = Category::active()->get()->toTree();

        return view('frontend.user.myport-koi', compact('kois','categories'));
    }
    
}