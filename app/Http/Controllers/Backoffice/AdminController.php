<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	public function __construct() {
		$this->middleware('auth:admin');
	}

    public function getIndex() {
    	return view('backoffice.dashboard');
    }
}
