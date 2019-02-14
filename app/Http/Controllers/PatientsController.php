<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Session;
use PDF;
use Alert;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient = Patient::all();
        return view('admin.patient.present',compact('patient'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'number'=> 'required',
            'occupation'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'area'=>'required',
        ]);
        
        $patient = new Patient;
        $patient->name=$request->get('name');
        $patient->email=$request->get('email');
        $patient->number=$request->get('number');
        $patient->occupation=$request->get('occupation');
        $patient->gender=$request->get('gender');
        $patient->phone = $request->get('phone');
        $patient->area = $request->get('area');
        $patient->save();
        // Session::flash('message', 'My message');
        Alert::success('Success Message', 'Patient Added Successfully');
        return redirect()->back()->with('success','New Patient Added');
        
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
        $share = Patient::find($id);

        return view('admin.patient.edit', compact('share'));
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
        $request->validate([
            'name'=>'required',
            'email'=> 'required',
            'number' => 'required'
          ]);
           
          $share = Patient::find($id);
          $share->name = $request->get('name');
          $share->email = $request->get('email');
          $share->number = $request->get('number');
          $share->save();
          Alert::info('Success Message', 'Patient Updated Successfully');
          return redirect()->back()->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect()->back()->with('success','Record Deleted');
    }
    public function viewPDF(){
        
        $patient = Patient::all();
 
        // load view for pdf
        $pdf = PDF::loadView('admin.patient.patient_pdf', ['patients' => $patient]);
        return $pdf->stream('PATIENT PDF.pdf');
    }
}
