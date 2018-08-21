<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function getIndex()
    {
        $categories = Category::active()->get()->toTree();
        $news = News::all();
        
        return view('frontend.news.index', compact('categories', 'news'));
    }

    public function getNews($id)
    {
        $categories = Category::active()->get()->toTree();
        $news = News::find($id);
        
        return view('frontend.news.news', compact('categories', 'news'));
    }
}
