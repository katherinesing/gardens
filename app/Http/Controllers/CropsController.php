<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class CropsController extends Controller
{
    
    public function create($garden_id = null){
        $garden = DB::table('gardens')
        ->where('gardens.garden_id', '=', $garden_id)
        ->get();

        return view('crops/create', [
            'garden' => $garden
        ]);


    }

    public function update($garden_id = null, $crop_id = null){
        $garden = DB::table('gardens')
        ->where('gardens.garden_id', '=', $garden_id)
        ->get();
        $crop = DB::table('crops')
        ->where('crops.crop_id', '=', $crop_id)
        ->get();
        return view('crops/update', [
            'garden' => $garden,
            'crop' => $crop
        ]);
    }

    public function store(Request $request, $garden_id = null){
        $input = $request->all();

        
        $validation = Validator::make($input, [
            'title' => 'required|min:3|max:30',
            'description' => 'required|min:3|max:100'
        ]);
        //otherwise insert the playlist into the db

        


        $garden = DB::table('gardens')
        ->where('gardens.garden_id', '=', $garden_id)
        ->get();

        $today = date("Y/m/d"); 
        // dd($request->crop_id);
        if ($request->crop_id){
            if ($validation->fails()){
            return redirect()
            ->action('CropsController@update', [$garden_id, $request->crop_id])
            ->withInput() 
            ->withErrors($validation); 
        }
            DB::table('crops')
            ->where('crops.crop_id', '=', $request->crop_id)
            ->update([
            'title' => $request->title,
            'status' => $request->status,
            'date' => $today,
            'description' => $request->description
            ]);

        }
        else{
            if ($validation->fails()){
            return redirect()
            ->action('CropsController@create', [$garden_id])
            ->withInput() 
            ->withErrors($validation); 
        }
            DB::table('crops')->insert([
                'garden_id' => $garden_id,
                'title' => $request->title,
                'status' => $request->status,
                'date' => $today,
                'description' => $request->description
            ]);
        }
        
        return redirect()->action('GardensController@detail', [$garden_id]);
    }
    

    public function delete($garden_id = null, $crop_id = null){

        $garden = DB::table('gardens')
        ->where('gardens.garden_id', '=', $garden_id)
        ->get();
        $crop = DB::table('crops')
        ->where('crops.crop_id', '=', $crop_id)
        ->get();
        return view('crops/delete', [
            'garden' => $garden,
            'crop' => $crop
        ]);    
    }

    public function delete2(Request $request, $garden_id = null){
// dd("hi");
        DB::table('crops')
            ->where('crops.crop_id', '=', $request->crop_id)
            ->delete();
        return redirect()->action('GardensController@detail', [$garden_id]);
    
    }
}
    