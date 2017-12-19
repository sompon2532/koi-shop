<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Favorite;
use App\Models\Transaction;
use App\User;
use Carbon\Carbon;
use Session;
use Auth;
use DB;

class ProductController extends Controller
{
    public function getIndex()
    {
        // $products = Product::all();
        // $images = DB::table('products')
        // ->Join('media', 'products.id', '=', 'media.model_id')
        // ->select('products.*', 'media.*')
        // ->where('media.collection_name', '=', 'product')
        // // ->groupBy('media.collection_name')
        // // ->count('products.id')
        // ->get();
        // // dd($images);
        // return view('frontend.shop.index', [
        //     'products' => $products,
        //     'images' => $images
        // ]);
        // $products = Product::with('media')->get();
        // $categories = Category::active()->get()->toTree();
        // return view('frontend.shop.index', compact('products', 'categories'));
        // $products = Product::with('media')->get();
        // return view('frontend.shop.index', [
        //         'products' => $products
        //     ]);

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
        // $user = User::find(Auth::user()->id);


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
        // $products = Product::find($id);
        // $images = DB::table('products')
        // ->Join('media', 'products.id', '=', 'media.model_id')
        // ->select('products.*', 'media.*')
        // ->where('media.model_id' ,'=', $id)
        // ->where('media.collection_name', '=', 'product')
        // ->get();
        $categories = Category::active()->get()->toTree();          
        if(Auth::user() == null){
            $favorites = null;
        }else{
            $favorites = Favorite::where('favorite_id', $id)->where('favorite_type', 'App\Models\Product')->where('user_id', Auth::user()->id)->get();            
        }
        // dd($images);
        // $images = $products->getMedia('product');
        // $images = $images[1]->getUrl();
        // dd($images);
        return view('frontend.shop.detail', [
            'products' => $products,
            'categories' => $categories,
            'favorites' => $favorites
        ]);
    }

    public function getAddToCart (Request $request, $id)
    {
    	$product = Product::find($id);
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

        // $categories = Category::get()->toTree();  
        return view('frontend.shop.shopping-cart', [
            'products' => $cart->items, 
            'totalPrice' => $cart->totalPrice, 
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
        
        return view('frontend.shop.checkout', [
            'products' => $cart->items, 
            'totalPrice' => $cart->totalPrice,
            'images' => $images, 
            'categories' => $categories
        ]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return view('frontend.shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

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
              'status'      => 0, //0=ยังไม่ได้ชำระเงิน 1=ชำระเงินแล้ว
              'totalQty'    => $cart->totalQty,
              'totalPrice'  => $cart->totalPrice,
              'tel'         => $request->input('tel'),
              'payment_id'  => '',//id การชำระเงิน            
              'created_at' => Carbon::now()->toDateTimeString()                   
              
            );

            $order_id = DB::table('orders')->insertGetId($insert);
            
            foreach ($cart->items as $item) {
                $insert = array(
                  'order_id'    => $order_id,
                  'product_id'  => $item['item']['id']
                );

                DB::table('order_product')->insertGetId($insert);
            }

            $transactions = array(
                'order_id' => $order_id,
                'status' => 0
            );
            
            $transactions = Transaction::create($transactions);   
        
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Session::forget('cart');

        return redirect()->route('frontend.shop.index')->with('success', 'Successfully purchased products!');
    }
}
