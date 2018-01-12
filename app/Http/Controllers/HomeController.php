<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\News;
use App\Models\Category;
use App\Models\Contact;
use Carbon\Carbon;
use Calendar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with(['media'])->where('status', 1)->whereDate('end_datetime', '>=' ,Carbon::now()->toDateString())->orderBy('end_datetime', 'desc')->get();
        $now = Carbon::now('Asia/Bangkok')->toTimeString();
        $events_today = Event::active()->with(['media'])->orderBy('end_datetime', 'desc')->get();
        $today = Carbon::now('Asia/Bangkok');
        // foreach ($events_today as  $event) {
        // echo $event->end_datetime->toDateString().'<br>';
        // }
        // return $today->toDateString();

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
            // dd($now_event);
        return view('frontend.index', compact('news', 'now', 'events_today', 'today', 'categories', 'calendar'));
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

    public function postContactUs(Request $request)
    {
        $contact = array(
            'name'   =>$request->input('name'),
            'email'  =>$request->input('email'),
            'phone'  =>$request->input('phone'),
            'description'  =>$request->input('description')
        );
       $contact = Contact::create($contact);

       return redirect()->back()->with('success', 'Successfully Send Contact!');       
    }
}
