<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use URL;

class LanguageController extends Controller
{
    public function setlocale($locale='th')
    {
    	if(!in_array($locale, ['th','en'])){
    		$lacale="th";
    	}
    	Session::put('locale', $locale);
    	return redirect(url(URL::previous()));
    }
}
