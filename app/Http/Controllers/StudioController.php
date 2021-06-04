<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Studio;

class StudioController extends Controller
{
    //
        public function index(Studio $studio)
    {
        return view('index')->with(['studios' => $studio->get()]);
    }
    
        public function show(Studio $studio)
    {
        //dd($studio->id);
        $rooms = DB::table('rooms')->where('studio_id', '=' ,$studio->id)->get();
        return view('show')->with(['studio' => $studio, 'rooms' => $rooms]);
    
    }
    
        
    
     
}
