<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use App\Bookings;
use App\User;
use Validator;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Bookings::all();
        $users = User::orderBy('id','Desc')->where('role','patient')->get();
        $chats = Chat::orderBy('id','Desc')->get();
        return view('consultation/chats',compact('bookings','users','chats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Chat::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        $all_chats = Chat::orderBy('id','Desc')->get();
        
        return response()->json($all_chats);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function chat(Request $request)
    {
        
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'message' => 'required', 
            'sender' => 'required', 
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $chats = Chat::create($input);
        // $token['token'] = $chats->createToken('MyClinic')-> accessToken;
        // $success['name'] = $booking->name;
        return response()->json(
            [
                'success' => true,
                // 'token' => $token,
                
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
