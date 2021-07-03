<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Koi;
use App\Models\Event;
use App\Models\Contest;
use App\Models\Category;
use App\Models\Banner;
use Carbon\Carbon;
use Auth;
use DB;

class EventController extends Controller
{
    public function getIndex() {
        $events = Event::active()->with(['media'])->orderBy('end_datetime', 'desc')->get();
        $today = Carbon::now('Asia/Bangkok');
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();

        $events = Event::with(['media'])->active()->orderBy('end_datetime', 'desc')->get();

        $nowEvents   = array();
        $passEvents  = array();

        foreach ($events as $index => $event) {
            $now = Carbon::now('Asia/Bangkok');
            $nowDateTime    = explode(' ', $now);
            $endDateTime    = explode(' ', $event->end_datetime);
            $startDateTime  = explode(' ', $event->start_datetime);

            if($nowDateTime[0] > $startDateTime[0]){
                if($nowDateTime[0] > $endDateTime[0]) {
                    array_push($passEvents, $event);
                } 
                elseif ($nowDateTime[0] < $endDateTime[0]) {
                    array_push($nowEvents, $event);   
                } 
                elseif ($nowDateTime[0] == $endDateTime[0]) {
                    if ($nowDateTime[1] > $endDateTime[1]) {
                        array_push($passEvents, $event);
                    } 
                    else {
                        array_push($nowEvents, $event);                    
                    }
                }
            } 
            elseif ($nowDateTime[0] == $startDateTime[0]) {
                if ($nowDateTime[1] > $startDateTime[1]) {
                    if($nowDateTime[0] > $endDateTime[0]) {
                        array_push($passEvents, $event);
                    } 
                    elseif ($nowDateTime[0] < $endDateTime[0]) {
                        array_push($nowEvents, $event);   
                    } 
                    elseif ($nowDateTime[0] == $endDateTime[0]) {
                        if ($nowDateTime[1] > $endDateTime[1]) {
                            array_push($passEvents, $event);
                        } 
                        else {
                            array_push($nowEvents, $event);                    
                        }
                    }
                }
            }
        }


        return view('frontend.event.index', compact('events', 'categories', 'banner', 'nowEvents', 'passEvents'));
    }

    public function getEvent($id) {
        $events = Event::with(['media'])->find($id);
        $kois = Koi::active()->with(['media'])->where('event_id', $id)->get();
        $today = Carbon::now('Asia/Bangkok');
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();

        // foreach ($kois as $koi) {
        //     dd($koi->user);
        // }
        // $koi = Koi::find(1);
        // dd($koi->user);
        if(Auth::user() == null){
            $books = null;
        }else{
            $books = Auth::user()->kois()->with(['media'])->where('koi_user.event_id', $id)->get();
        }
        if($events->end_datetime < Carbon::now()->toDateString()) {
            $events->config = 0;
        }
        // return $books;
        // dd($events->end_datetime);
        // if($events->end_start
        return view('frontend.event.event', compact('events', 'kois', 'books', 'today', 'categories', 'banner'));        
    }

    public function getKoi($event, $koi) {
        $events = Event::with(['media'])->find($event); 
        $kois = Koi::with(['media'])->where('event_id', $event)->find($koi);
        $today = Carbon::now('Asia/Bangkok');     
        $contests = Contest::where('contesttable_id', $koi)->get();          
        $userbooks = Koi::with(['users'])->find($koi);
        $categories = Category::active()->get()->toTree();
        $banner = Banner::with(['media'])->active()->first();

        if(Auth::user() == null){
            $books = null;
        }else{
            $books = Auth::user()->kois()->with(['media'])->where('koi_user.event_id', $event)->find($koi);        
        }

        if($events->end_datetime < Carbon::now()->toDateString()) {
            $events->config = 0;
        }
        
        return view('frontend.event.koi', compact('events', 'kois', 'today', 'contests', 'books', 'userbooks', 'categories', 'banner'));
    }

    // public function postEvent(Request $request) {
    //     $insert = array(
    //         'koi_id' => $request->input('koi'),            
    //         'user_id' => Auth::user()->id,
    //         'event_id' => $request->input('event')
    //     );

    //     DB::table('koi_user')->insert($insert);
        
    //     return redirect()->back()->with('success', 'Successfully Book Koi!');
    // }
    public function getEventAdd($koi, $event) {
        $book = DB::table('koi_user')->where('koi_id', $koi)->where('event_id', $event)->where('user_id', Auth::user()->id)->get();
        if(count($book) == 0){
            $insert = array(
                'koi_id' => $koi,            
                'user_id' => Auth::user()->id,
                'event_id' => $event
            );
            DB::table('koi_user')->insert($insert);
        }
        
        return redirect()->back()->with('success', 'Successfully Book Koi!');
    }

    public function getEventDel($koi, $event) {
        DB::table('koi_user')->where('koi_id', $koi)->where('event_id', $event)->where('user_id', Auth::user()->id)->delete();
        
        return redirect()->back()->with('success', 'Successfully Cancel Koi!');
    }

    public function getMyBooking() {
        $kois = Auth::user()->kois()->with(['media'])->get();
        // $books = Auth::user()->kois()->with(['media'])->where('kois.event_id', $id)->get();  
        
        $koisActiveEvent = array();
        $j = 0;
        for($i=0; $i<count($kois); $i++){
            if($kois[$i]->event_id == $kois[$i]->pivot->event_id){
                // echo $kois[$i]->id;
                // echo $kois[$i]->event_id;
                // echo $kois[$i]->user_id;
                $koisActiveEvent[$j] = $kois[$i];
                $j++;
            }
        }      
        $now = Carbon::now('Asia/Bangkok');     
        
        $categories = Category::active()->get()->toTree();    
        $banner = Banner::with(['media'])->active()->first();

        return view('frontend.event.booking', compact('kois', 'categories', 'banner', 'koisActiveEvent', 'now'));
    }

    // public function getLuckydraw($event)
    // {
    //     $events = Event::with(['media'])->find($event);
    //     $categories = Category::active()->get()->toTree();    

    //     return view('frontend.event.luckydraw', compact ('events', 'categories'));
    // }

    // public function getWinnerlist($event)
    // {
    //     $kois = Koi::with(['media'])->where('event_id', $event)->get();
    //     // $events = Event::koi->with(['media'])->find($event);
    //     $categories = Category::active()->get()->toTree();    

    //     return view('frontend.event.winnerlist', compact ('kois', 'categories'));
    // }
}
