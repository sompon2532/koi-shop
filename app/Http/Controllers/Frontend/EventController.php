<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Koi;
use App\Models\Event;
use App\Models\Category;
use Carbon\Carbon;

class EventController extends Controller
{
    public function getIndex() {
        $events = Event::with(['media'])
            // ->whereDate('start_datetime', Carbon::now()->toDateString())
            ->get();

        $categories = Category::get()->toTree();

        return view('frontend.event.index', compact('events', 'categories'));
    }

    public function getEvent($id) {
        $events = Event::with(['media'])->find($id);
        $kois = Koi::with(['media'])->where('event_id', $id)->get();
        $categories = Category::get()->toTree();

        return view('frontend.event.event', compact('events', 'kois', 'categories'));        
    }

    public function getKoi($event, $koi) {
        $events = Event::with(['media'])->find($event);
        $kois = Koi::with(['media'])->where('event_id', $event)->find($koi);
        $categories = Category::get()->toTree();
        
        return view('frontend.event.koi', compact('events', 'kois', 'categories'));
    }
}
