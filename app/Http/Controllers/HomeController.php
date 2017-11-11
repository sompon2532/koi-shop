<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
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
        $events = Event::with(['media'])
                    // ->whereDate('start_datetime', Carbon::now()->toDateString())
                    ->get();

        $categories = Category::get()->toTree();

        foreach($categories as $category) {
            dump($category->name);
        }

        return view('frontend.index', compact('events'));
    }
}
