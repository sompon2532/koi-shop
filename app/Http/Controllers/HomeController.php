<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\News;
use App\Models\Category;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $events = Event::with(['media'])
        //             // ->whereDate('start_datetime', Carbon::now()->toDateString())
        //             ->get();
        $news = News::with(['media'])
            ->whereDate('end_datetime', '>=' ,Carbon::now()->toDateString())
            ->orderBy('end_datetime', 'desc')
            ->get();
            
            // dd($news);
        $now = Carbon::now('Asia/Bangkok')->toTimeString();
        $categories = Category::active()->get()->toTree();

        return view('frontend.index', compact('news', 'now', 'categories'));
    }

    public function getAboutUs()
    {
        $categories = Category::active()->get()->toTree();

        return view('frontend.about.index', compact('categories'));
    }

    public function getContactUs()
    {
        $categories = Category::active()->get()->toTree();

        return view('frontend.contact.index', compact('categories'));
    }
}
