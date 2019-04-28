<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GenInfoController extends Controller
{
    public function index(){

        $coordinators = DB::table('users')
        ->select('users.name', 'users.email', 'gardens.name as garden')
        ->join('gardens', 'users.garden_id', '=', 'gardens.garden_id')
        ->orderBy('garden', 'asc')
        ->get();

        $volunteers = DB::table('users')
        ->where('garden_id', null)
        ->get();
    	

    	return view('contact', [
    		'coordinators' => $coordinators,
            'volunteers' => $volunteers
    	]);
    }
    public function about(){
    	return view('about');
    }
}
