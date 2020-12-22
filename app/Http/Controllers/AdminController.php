<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Bookings;
use App\Staff;
use DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        if(Auth::user()->role == 'patient'){
            Auth::logout();
            return redirect('/');
        }
        $c_patients = Patient::count();
        $bookings = Bookings::all();
        $staff = Staff::count();
        $female = DB::table('patients')->where('gender','female')->count();
        $male = DB::table('patients')->where('gender','male')->count();


        return view('admin.dashboard')->with([
            'c_patients'=> $c_patients,
            'bookings'=> $bookings,
            'staff'=>$staff,
            'female'=>$female,
            'male'=>$male,
        ]);
    }
}
