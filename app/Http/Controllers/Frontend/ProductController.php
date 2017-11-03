<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Cart;
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

        return Product::with('media')->get();
        // $products = Product::with('media')->get();
        // return view('frontend.shop.index', [
        //         'products' => $products
        //     ]);
    }

    public function getDetail($id)
    {
        $products = Product::find($id);
        $images = DB::table('products')
        ->Join('media', 'products.id', '=', 'media.model_id')
        ->select('products.*', 'media.*')
        ->where('media.model_id' ,'=', $id)
        ->where('media.collection_name', '=', 'product')
        ->get();

        // dd($images);
        // $images = $products->getMedia('product');
        // $images = $images[1]->getUrl();
        // dd($images);
        return view('frontend.shop.detail', [
            'products' => $products,
            'images' => $images
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
        if (!Session::has('cart')) {
            return view('frontend.shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('frontend.shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
    	if (!Session::has('cart')) {
            return view('frontend.shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('frontend.shop.checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
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
              'payment_id'  => ''//id การชำระเงิน
            );
            // dd($insert);  
            $order_id = DB::table('orders')->insertGetId($insert);
            
            foreach ($cart->items as $item) {
                $insert = array(
                  'order_id'    => $order_id,
                  'product_id'  => $item['item']['id']
                );
                // dd($insert);
                DB::table('order_details')->insertGetId($insert);
            }
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->route('frontend.shop.index')->with('success', 'Successfully purchased products!');
    }
}
