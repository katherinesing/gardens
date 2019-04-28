<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GenInfoController extends Controller
{
    public function index(){
    	$coordinators = DB::table('users')->get();
    	// dd($coordinators);

    	return view('contact', [
    		'coordinators' => $coordinators
    	]);
    }
    public function about(){
    	return view('about');
    }
}
