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
    
    
         //function confirm(Request $request)
    //{   
        //$validated = $request->validated();
        
        
        //$request->validate([
            //'name'=> 'required|min:2|max:20|regex:/^[^A-Za-z0-9]+$/u',
            //'tel' => 'required||regex:/^0\d{9,10}$/u',
            //'num' => 'required|min:1|max:15|numeric',
            //'datetime' => 'required'
        //]);
        
        
    
         //$validated = $request->validated();
        
        //$validator = Validator::make($request->all(),[
            //'name'=> 'required|min:2|max:20',
            //'tel' => 'required|digits_between:8,15',
            //'num' => 'required|min:1|max:15|numeric',
            //'datetime' => 'required'
        //]);
        //$name = $request->validated();
        //$tel = $request->validated();
        //$num = $request->validated();
        //$datetime = $request->validated();
        //$request->session()->put(self::FORM_DATA_KEY, $validated);
        //if ($validator->fails()) {
            //return redirect('reservation/confirm')
                        //->withErrors($validator)
                        //->withInput();
        //return view('reservation.confirm', $validated);                
       
         //$name = $request->name;
         //$tel = $request->tel;
         //$num = $request->num;
         //$datetime = $request->datetime;
         
         
         
        //return view('confirm', [
        //'name' => $name,
        //'tel' => $tel,
        //'num' => $num,
        //'datetime' => $datetime
        //]);

        
    
    
        //public function confirm(ReservationRequest $request)
    //{
     //送信されたリクエストは正しい

     //バリデーション済みデータの取得
        //$validated = $request->validated();
        //return view('confirm');
    //}
    
        //public function confirm(ReservationRequest $request)
    //{
    // 送信されたリクエストは正しい

    // バリデーション済みデータの取得
        //$validated = $request->validated();
    //}
    
       
         function finish()
    {
        //if (!$request->session()->has(self::FORM_DATA_KEY)) {
            //$input = $request['reservation'];
            //$reservation->fill($input)->save();
            //return redirect()->route('reservation');
        //}

        
        //$form_data = $request->session()->pull(self::FORM_DATA_KEY);
        
        return view('finish');

    }
}
    
        function store(Reservation $reservation, Request $request)
    {
        
             
            //$reservation = new Reservation;
            
            $reservation->user_id = auth()->id();
            $reservation->reservations = $num;
            $reservation->reservations = $datetime;
            $reservation->save();
            
            //$input = $request['name'];
            //$input = $request['tel'];
            $input = $request['num'];
            $input = $request['datatime'];
            //$name->fill($input)->save();
            //$tel->fill($input)->save();
            $num->fill($input)->save();
            $datetime->fill($input)->save();
            
            
            return redirect('/reservations/' . $reservation);
    }

