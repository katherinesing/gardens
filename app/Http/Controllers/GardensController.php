<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GardensController extends Controller
{
    public function index(){

    	$gardens = DB::table('gardens')->get();
    	return view('gardens/index', [
    		'gardens' => $gardens
    	]);
    }

    public function news(){
        $harvest_crops = DB::table('crops')
        ->select('gardens.garden_id', 'gardens.name', 'crops.title', 'crops.date')
        ->join('gardens', 'crops.garden_id', '=', 'gardens.garden_id')
        ->where('crops.status', '=', 'Ready to Harvest')
        ->get();
        // dd($harvest_crops);
        return view('news', [
            'harvest_crops' => $harvest_crops
        ]);
    }
    public function detail($garden_id = null){
        
    	$garden = DB::table('gardens')
    	->where('gardens.garden_id', '=', $garden_id)
    	->get();

        $leaders = DB::table('users')
        ->where('users.garden_id', '=', $garden_id)
        ->get();
    	// $crops = DB::table('crops')
    	// ->where('crops.garden_id', '=', $garden_id)
     //    ->orderBy('status', 'desc')
    	// ->get();

        $harvest_crops = $crops = DB::table('crops')
        ->where('crops.garden_id', '=', $garden_id)
        ->where('status', '=', 'Ready to Harvest')
        ->orderBy('date', 'asc')
        ->get();

        $growing_crops = $crops = DB::table('crops')
        ->where('crops.garden_id', '=', $garden_id)
        ->where('status', '=', 'Still Growing')
        ->orderBy('date', 'asc')
        ->get();

        $new_crops = $crops = DB::table('crops')
        ->where('crops.garden_id', '=', $garden_id)
        ->where('status', '=', 'Just Planted')
        ->orderBy('date', 'asc')
        ->get();

    	return view('gardens/detail', [
    		'garden' => $garden,
    		'crops' => $crops,
            'harvest_crops' => $harvest_crops,
            'growing_crops' => $growing_crops,
            'new_crops' => $new_crops,
            'leaders' => $leaders
    	]);
    }
    public function create(){
        return view('gardens/create');
    }
    public function store(Request $request){
        $input = $request->all();
        $validation = Validator::make($input, [
            'name' => 'required|min:5|max:100|unique:gardens',
            'address' => 'required|min:5|max:300|unique:gardens'
        ]);
        //otherwise insert the playlist into the db

        if ($validation->fails()){
            return redirect('/gardens/create')
            ->withInput() 
            ->withErrors($validation); 
        }
        DB::table('gardens')->insert([
            'name' => $request->name,
            'address' => $request->address
        ]);
        return redirect('/gardens');
    }
}
