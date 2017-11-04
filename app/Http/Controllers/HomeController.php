<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $images = DB::table('media')
        // ->Join('media', 'kois.id', '=', 'media.model_id')
        // ->select('kois.*', 'media.*')
        ->where('media.collection_name', '=', 'news-cover')
        ->get();
        return view('frontend.index',[
            'images' => $images
        ]);
    }
}
