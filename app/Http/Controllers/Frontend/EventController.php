<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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


        return view('frontend.event.index', compact('events','categories'));
    }
}
