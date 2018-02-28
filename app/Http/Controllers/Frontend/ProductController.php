<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Favorite;
use App\Models\Transaction;
use App\Models\Address;
use App\User;
use Carbon\Carbon;
use Session;
use Auth;
use DB;
use Validator;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::with('media')->get();       
        $categories = Category::active()->get()->toTree(); 

        if(Auth::user() == null){
            $favorites = null;
        }else{
            $favorites = Favorite::where('favorite_type', 'App\Models\Product')->where('user_id', Auth::user()->id)->get();            
        }      

        return view('frontend.shop.index', compact('products', 'categories', 'favorites'));
    }

    public function getProductCategory($category)
    {   
        $products = Product::with('media')->where('category_id', $category)->get();
        $productCategory = Category::find($category);        
        $categories = Category::active()->get()->toTree(); 

        if(Auth::user() == null){
            $favorites = null;
        }else{
            $favorites = Favorite::where('favorite_type', 'App\Models\Product')->where('user_id', Auth::user()->id)->get();            
        }      

        return view('frontend.shop.category', compact('products', 'productCategory', 'categories', 'favorites'));
    }

    public function getDetail($id)
    {   
        $products = Product::with('media')->find($id);        
        $categories = Category::active()->get()->toTree();          
        if(Auth::user() == null){
            $favorites = null;
        }else{
            $favorites = Favorite::where('favorite_id', $id)->where('favorite_type', 'App\Models\Product')->where('user_id', Auth::user()->id)->get();            
        }
        return view('frontend.shop.detail', [
            'products' => $products,
            'categories' => $categories,
            'favorites' => $favorites
        ]);
    }

    public function getAddToCart (Request $request, $id)
    {
    	$product = Product::with('media')->find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$request->Session()->put('cart', $cart);
        // dd($request->Session()->get('cart'));
        
        // return redirect()->route('frontend.shop.index');
        return redirect()->back();
    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        Session::put('cart', $cart);
        return redirect()->route('frontend.shop.shoppingCart');
    }

    public function getReduceAddByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceAddByOne($id);

        Session::put('cart', $cart);
        return redirect()->route('frontend.shop.shoppingCart');
    }

    public function getChangeQty($id, $qty)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->changeQty($id, $qty);

        Session::put('cart', $cart);
        return redirect()->route('frontend.shop.shoppingCart');
    }

    public function getRemoveItem ($id) 
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        Session::put('cart', $cart);
        return redirect()->route('frontend.shop.shoppingCart');
    }

    public function getCart()
    {
        $categories = Category::active()->get()->toTree();
        if (!Session::has('cart')) {
            return view('frontend.shop.shopping-cart', compact('categories'));
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $images = Product::with('media')->get();
        // dd($cart);
        // dd($cart->totalShip);
        return view('frontend.shop.shopping-cart', [
            'products' => $cart->items, 
            'totalShip' => $cart->totalShip, 
            'totalPrice' => $cart->totalPrice, 
            'total' => $cart->total, 
            'images' => $images, 
            'categories' => $categories
        ]);
    }

    public function getCheckout()
    {   
        $categories = Category::active()->get()->toTree();        
    	if (!Session::has('cart')) {
            return view('frontend.shop.shopping-cart', compact('categories'));
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $images = Product::with('media')->get();
        $user = User::find(Auth::user()->id);

        // dd($user->adresses->first()->address);
        
        return view('frontend.shop.checkout', [
            'products' => $cart->items, 
            'totalShip' => $cart->totalShip, 
            'totalPrice' => $cart->totalPrice,
            'total' => $cart->total, 
            'images' => $images, 
            'categories' => $categories,
            'user' => $user
        ]);
    }

    public function postCheckout(Request $request)
    {   
        if (!Session::has('cart')) {
            return view('frontend.shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        // dd($oldCart);
        // foreach ($cart->items as $item) {
        //     dd($item['qty']);
        // }
        try {
            // $order = new Order();
            // $order->cart = serialize($cart);
            // $order->address = $request->input('address');
            // $order->name = $request->input('name');
            // $order->status = 0;
            // $order->totalQty = 0;
            // $order->totalPrice = 0;
            // $order->tel = $request->input('tel');
            // $order->payment_id = '';

            // Auth::user()->orders()->save($order);
            $insert = array(
                'user_id'     => Auth::user()->id,
                'cart'        => serialize($cart),
                'address'     => $request->input('address'),
                'name'        => $request->input('name'),
                'status'      => 0,
                'totalQty'    => $cart->totalQty,
                'total_delivery'  => $cart->totalShip,
                'totalPrice'  => $cart->totalPrice,
                'total'       => $cart->total,
                'tel'         => $request->input('tel'),
                'payment_id'  => '',
                'created_at' => Carbon::now()->toDateTimeString()
            );

            $order_id = DB::table('orders')->insertGetId($insert);
            foreach ($cart->items as $item) {
                $insert = array(
                    'order_id'    => $order_id,
                    'product_id'  => $item['item']['id'],
                    'qty'    => $item['qty'],
                    'total_delivery' => $item['delivery'],
                    'total_price'   => $item['price'],
                    'total'   => $item['price']+$item['delivery'],
                    'created_at' => Carbon::now()->toDateTimeString()
                );
                DB::table('order_product')->insertGetId($insert);
            }

            $transactions = array(
                'order_id'  => $order_id,
                'status'    => 0
            );
            $transactions = Transaction::create($transactions);

            $user = User::find(Auth::user()->id);            
            if($user->addresses == null) {
                $address = array(
                    'user_id'   =>Auth::user()->id,
                    'address'   =>$request->input('address')
                );
                $addresses = Address::create($address);
            }
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Session::forget('cart');

        return redirect()->route('frontend.shop.index')->with('success', 'Successfully purchased products!');
    }
}