<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Banner;
use App\Models\News;

class NewsController extends Controller
{
    public function getIndex()
    {
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();
        $news = News::all();
        
        return view('frontend.news.index', compact('categories', 'banner', 'news'));
    }

    public function getNews($id)
    {
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();
        $news = News::find($id);
        
        return view('frontend.news.news', compact('categories', 'banner', 'news'));
    }
}
