<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings; 
use Validator;
use DB;

class ApiBookController extends Controller
{
    public $successStatus = 200;
    /** 
     * Book api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function book(Request $request){
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            // 'phone' => 'required',
            'start' => 'required', 
            'illness' => 'required', 
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $booking = Bookings::create($input);
        $success['token'] = $booking->createToken('MyClinic')-> accessToken;
        // $success['name'] = $booking->name;
        return response()->json($success);
    }

    public function destroy($id){
        $booking= Bookings::findorFail($id);
        $booking->delete();
        $success['token'] = $booking->createToken('MyClinic')-> accessToken;
        return response()->json($success);
    }
}
