<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function getIndex($id)
    {
        $categories = Category::active()->get()->toTree();
        $news = News::find($id);
        
        return view('frontend.news.index', compact('categories', 'news'));
    }
}
