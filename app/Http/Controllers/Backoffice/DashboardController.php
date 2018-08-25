<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Event;
use App\Models\Koi;

class DashboardController extends Controller
{
    public function getIndex() {
        $user = User::count();
        $event = Event::count();
        $koi = Koi::count();

        return view('backoffice.dashboard', compact('user', 'event', 'koi'));
    }
}
