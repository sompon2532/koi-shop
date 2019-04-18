<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\News;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Banner;
use App\Models\Home;
use App\Models\Menu;
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
        // news
        $news = News::with(['media'])
                    ->where('status', 1)
                    ->whereDate('end_datetime', '>=' ,Carbon::now()->toDateString())
                    ->orderBy('end_datetime', 'desc')
                    ->get();

        $nownews = array();
        $now = Carbon::now('Asia/Bangkok')->toDateTimeString();
        $nowDateTime    = explode(' ', $now);
        
        foreach ($news as $value) {
            $endDateTime    = explode(' ', $value->end_datetime);
            $startDateTime  = explode(' ', $value->start_datetime);

            if($nowDateTime[0] > $startDateTime[0]){
                if ($nowDateTime[0] < $endDateTime[0]) {
                    array_push($nownews, $value);   
                } 
                elseif ($nowDateTime[0] == $endDateTime[0]) {
                    if ($nowDateTime[1] < $endDateTime[1]) {
                        array_push($nownews, $value);                    
                    }
                }
            }
            elseif ($nowDateTime[0] == $startDateTime[0]) {
                if ($nowDateTime[1] > $startDateTime[1]) {
                    if ($nowDateTime[0] < $endDateTime[0]) {
                        array_push($nownews, $value);
                    }
                    elseif ($nowDateTime[0] == $endDateTime[0]) {
                        if ($nowDateTime[1] < $endDateTime[1]) {
                            array_push($nownews, $value);                    
                        }
                    }
                }
            }
        }
        
        // events
        $events = Event::active()
                        ->with(['media'])
                        ->whereDate('end_datetime', '>=' ,Carbon::now()->toDateString())
                        ->orderBy('end_datetime', 'desc')
                        ->get();

        $nowEvents   = array();
        $now = Carbon::now('Asia/Bangkok');
        $nowDateTime    = explode(' ', $now);
        
        foreach ($events as $index => $event) {
            $endDateTime    = explode(' ', $event->end_datetime);
            $startDateTime  = explode(' ', $event->start_datetime);

            if($nowDateTime[0] > $startDateTime[0]){
                if ($nowDateTime[0] < $endDateTime[0]) {
                    array_push($nowEvents, $event);   
                } 
                elseif ($nowDateTime[0] == $endDateTime[0]) {
                    if ($nowDateTime[1] < $endDateTime[1]) {
                        array_push($nowEvents, $event);                    
                    }
                }
            } 
            elseif ($nowDateTime[0] == $startDateTime[0]) {
                if ($nowDateTime[1] > $startDateTime[1]) {
                    if ($nowDateTime[0] < $endDateTime[0]) {
                        array_push($nowEvents, $event);   
                    } 
                    elseif ($nowDateTime[0] == $endDateTime[0]) {
                        if ($nowDateTime[1] < $endDateTime[1]) {                        
                            array_push($nowEvents, $event);                    
                        }
                    }
                }
            }
        }

        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();

        // calendar
        $events = [];
        $data = Event::active()->get();

        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    null,//Text
                    true,//full day event?
                    new \DateTime($value->start_datetime),
                    new \DateTime($value->end_datetime.' +1 day'),
                    null,
	                [
	                    'color' => '#f00',
                        'url' => '/event/'.$value->id,
                        'borderColor' => '#fff',
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

        $home = Home::first();

        $menus = Menu::with('media')
            ->orderBy('seq')
            ->orderBy('updated_at', 'desc')
            ->get();
        
        return view('frontend.index', compact('nownews', 'nowEvents', 'categories', 'calendar', 'banner', 'home', 'menus'));
    }

    public function getAboutUs()
    {
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();

        return view('frontend.about.index', compact('categories', 'banner'));
    }

    public function getContactUs()
    {
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();

        return view('frontend.contact.index', compact('categories', 'banner'));
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

    public function getLineContact()
    {
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();

        return view('frontend.contact.line', compact('categories', 'banner'));
    }
}
