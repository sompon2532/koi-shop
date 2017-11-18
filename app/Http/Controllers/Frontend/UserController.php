<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Carbon\Carbon;
use Auth;
use DB;

class UserController extends Controller
{
    public function postfavorite(Request $request)
    {
        $insert = array(    
            'user_id' => Auth::user()->id,     
            'item_id' => $request->input('item'),                    
            'type' => $request->input('type'),
            'created_at' => Carbon::now()->toDateString()                   
        );
        DB::table('favorites')->insert($insert);
        return redirect()->back()->with('success', 'Successfully Favorite Item');
    }

    public function getfavoriteDel($item, $type) {
        // dd($type);
        DB::table('favorites')->where('item_id', $item)->where('type', $type)->where('user_id', Auth::user()->id)->delete();
        
        return redirect()->back()->with('success', 'Successfully Cancel Koi!');
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
}
