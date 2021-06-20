<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Studio;
use App\Models\Room;

class CalendarController extends Controller
{
    //
        public function calendar(Request $request)
    
    {
        $request->session()->getId();
        //$reservations = DB::select('select * from sessions');
        //$input = $request->session()->get("form_input");
        

        return view('calendar'); 
        //['reservations' => $reservations]);
        //return view('calendar');
    }
    
    
       
        
    
     
}
