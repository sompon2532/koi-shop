<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();

        dd($products);
        
    }
}
