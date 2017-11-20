<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Koi;
use App\Models\Event;
use App\Models\Category;
use Carbon\Carbon;
use Auth;
use DB;

class EventController extends Controller
{
    public function getIndex() {
        $events = Event::active()->with(['media'])->orderBy('end_datetime', 'desc')
            // ->whereDate('end_datetime', '>=', Carbon::now()->toDateTimeString())
            ->get();
        $today = Carbon::now('Asia/Bangkok');

        // dd($events);
        $categories = Category::get()->toTree();

        return view('frontend.event.index', compact('events', 'today', 'categories'));
    }

    public function getEvent($id) {
        $events = Event::with(['media'])->find($id);
        $kois = Koi::with(['media'])->where('event_id', $id)->get();
        $books = Auth::user()->kois()->with(['media'])->where('kois.event_id', $id)->get();
        $today = Carbon::now('Asia/Bangkok');
        $categories = Category::get()->toTree();

        if($events->end_datetime < Carbon::now()->toDateString()) {
            $events->config = 0;
        }
        // dd($events->end_datetime);
        // if($events->end_start
        return view('frontend.event.event', compact('events', 'kois', 'books', 'today', 'categories'));        
    }

    public function getKoi($event, $koi) {
        $events = Event::with(['media'])->find($event); 
        $kois = Koi::with(['media'])->where('event_id', $event)->find($koi);
        $books = Auth::user()->kois()->with(['media'])->where('kois.event_id', $event)->find($koi); //เช็คว่าปลาตัวนี้ user book แล้วหรือยัง
        $userbooks = Koi::with(['users'])->find($koi); //ปลาตัวนี้มีใคร book บ้าง
        $categories = Category::get()->toTree();

        if($events->end_datetime < Carbon::now()->toDateString()) {
            $events->config = 0;
        }
        
        return view('frontend.event.koi', compact('events', 'kois', 'books', 'userbooks', 'categories'));
    }

    public function postEvent(Request $request) {
        $insert = array(
            'koi_id' => $request->input('koi'),            
            'user_id' => Auth::user()->id,
            'event_id' => $request->input('event')
        );

        DB::table('koi_user')->insert($insert);
        
        return redirect()->back()->with('success', 'Successfully Book Koi!');
    }

    public function getEventDel($koi, $event) {
        DB::table('koi_user')->where('koi_id', $koi)->where('event_id', $event)->where('user_id', Auth::user()->id)->delete();
        
        return redirect()->back()->with('success', 'Successfully Cancel Koi!');
    }

    public function getMyBooking() {
        $kois = Auth::user()->kois()->with(['media'])->get();
        // $books = Auth::user()->kois()->with(['media'])->where('kois.event_id', $id)->get();        
        $categories = Category::get()->toTree();    

        // dd($kois);
        return view('frontend.event.booking', compact('kois', 'categories'));
    }

    public function getLuckydraw($event)
    {
        $events = Event::with(['media'])->find($event);
        $categories = Category::get()->toTree();    
// dd($events->videos);
        return view('frontend.event.luckydraw', compact ('events', 'categories'));
    }

    public function getWinnerlist($event)
    {
        $kois = Koi::with(['media'])->where('event_id', $event)->get();
        // $events = Event::koi->with(['media'])->find($event);
        $categories = Category::get()->toTree();    
// dd($events->videos);
        return view('frontend.event.winnerlist', compact ('kois', 'categories'));
    }
}
