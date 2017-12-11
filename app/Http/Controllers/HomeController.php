<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\News;
use App\Models\Category;
use Carbon\Carbon;
use Calendar;

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

        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    // $value->name,
                    null,
                    true,//full day event?
                    new \DateTime($value->start_datetime),
                    new \DateTime($value->end_datetime.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#ff0000',
	                    'url' => '/event/'.$value->id,
	                ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        $calendar->setOptions([
            'locale' => config('app.locale'),
            'views' => [ 
                'month' => [ // name of view
                    'columnFormat' => 'dd'
                ]
            ], 
            'header' => [
                'left'  => 'prev',
                'center'=> 'title',
                'right' => 'next'
            ],
            'eventLimit' => 0,
        ]);

        return view('frontend.index', compact('news', 'now', 'categories', 'calendar'));
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
