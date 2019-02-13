<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Bookings;
use App\Staff;
use DB;

class AdminController extends Controller
{
    public function dashboard(){
        $c_patients = Patient::count();
        $bookings = Bookings::count();
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
