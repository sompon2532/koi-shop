<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class PaymentController extends Controller
{
    public function getPayment()
    {
        $categories = Category::active()->get()->toTree();
        
        return view('frontend.payment.payment', compact('categories'));
    }
}
