<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Event;
use App\Models\Koi;
use App\Models\News;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function getIndex() {
        $user = User::count();
        $event = Event::count();
        $news = News::count();
        $koi = Koi::count();
        $order = Order::count();
        $product = Product::count();

        return view('backoffice.dashboard', compact('user', 'event', 'koi', 'news', 'order', 'product'));
    }
}
