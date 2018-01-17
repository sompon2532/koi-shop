<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Transaction;
use App\User;
use Carbon\Carbon;
use DB;
use App\Models\Payment;
use App\Models\Koi;

class PaymentController extends Controller
{   
    public function getIndex()
    {
        $categories = Category::active()->get()->toTree();
        return view('frontend.payment.index', compact('categories'));
    }

    public function getPayment($id)
    {
        $categories = Category::active()->get()->toTree();
        $order = Order::find($id);

        return view('frontend.payment.payment', compact('categories', 'order'));
    }

    public function postPayment(Request $request, $id)
    {
        $insert = array(
            'order_id'    => $id,
            'bank'        => $request->input('bank'),
            'total'       => $request->input('total'),    
            'datetime'    => $request->input('datetime')                  
        );
        $payment = Payment::create($insert);
        $transaction = Transaction::where('order_id', $id)->first();
        $transaction->status = 1;
        $transaction->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');  
            $payment->addMedia($image)->toMediaCollection('payment');
        }
        
        return redirect()->route('frontend.payment.success', ['id' => $id])->with('success', 'Successfully purchased products!');;
    }

    public function getSuccess($id)
    {
        $categories = Category::active()->get()->toTree();        
        $order = Order::find($id);

        if(!$order->payment){
            return redirect()->back();
        }
        return view('frontend.payment.success', compact('categories', 'order'));            
    }
}
