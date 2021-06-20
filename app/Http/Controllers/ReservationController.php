<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ReservationController extends Controller
{
    //
    private $formItems = ["name", "tel", "num", 'datetime'];
    
    private $validator = [
		    'name'=> 'required|min:2|max:20|regex:/^[^A-Za-z0-9]+$/u',
            'tel' => 'required||regex:/^0\d{9,10}$/u',
            'num' => 'required|min:1|max:15|numeric',
            'datetime' => 'required'
	];

    
         function show(Reservation $reservation, Room $room)
    {
        //dd($room->id);
		return view("reservation")->with(['room_id' => $room->id]);
	}
    
        function post(Request $request, Room $room, Reservation $reservation)
    {
		
		$input = $request->only($this->formItems);
		$input = $input + array('room_id' => $request->input('room_id')) + array('user_id' => auth()->id());
		
		$validator = Validator::make($input, $this->validator);
		if($validator->fails()){
			return redirect()->action("ReservationController@show")
				->withInput()
				->withErrors($validator);
				
	}
	
	    $request->session()->put("form_input", $input);

		return redirect()->action("ReservationController@confirm");
    }
		
		function confirm(Request $request)
	{
	    //dd(session()->all());
		//セッションから値を取り出す
		$input = $request->session()->get("form_input");
		
		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("ReservationController@show");
		}
		return view("confirm",["input" => $input]);
	}
	
	    function send(Request $request,Reservation $reservation)
	{
		//セッションから値を取り出す
		$input = $request->session()->get("form_input");
		
		$reservation->user_id = auth()->id();
		$reservation->room_id = $input['room_id'];
		$reservation->num = $request->num;
		$reservation->datetime = $request->datetime;
		$reservation->fill($input);
		$reservation->save();
		
		
		//戻るボタンが押されたとき
		if($request->has('btn_back')){
		    return redirect()->action("ReservationController@show")
		        ->withInput($input);
		}
		
		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("ReservationController@show");
		}

		//ここでメールを送信するなどを行う

		//セッションを空にする
		$request->session()->forget("form_input");

		return redirect()->action("ReservationController@finish");
	}
    
    
    
       
         function finish()
    {
        
        return view('finish');

    }
}
    
