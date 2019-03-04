<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;
use DB;
use Alert;
class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Bookings::get();
        return view('admin.bookings.current_bookings',compact('bookings'));
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
        $this->validate($request,[
        'name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'start'=>'required',
        'illness'=>'required',
        ]);

        $booking = new Bookings;
        $booking->name = $request->get('name');
        $booking->email = $request->get('email');
        $booking->phone = $request->get('phone');
        $booking->start = $request->get('start');
        $booking->illness = $request->get('illness');
        $booking->save();
        Alert::success('Success Message', 'Patient Booking Placed');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $booking = Bookings::find($id);
        $booking->status = "1";
        $booking->save();
        Alert::message('Success Message', 'Patient Booking Approved');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Bookings::find($id);
        $booking->delete();
        Alert::error('Success Message', 'Patient Booking Deleted');
        return redirect()->back();
    }
    
}
