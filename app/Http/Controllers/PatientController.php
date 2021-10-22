<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Patient;
use Barryvdh\DomPDF\PDF;
use App\Models\Professional;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function historias($id){
        $detalle = History::get();
        $Patient = Patient::select('id')->where('id','=',$id)->get();
        $data = compact('detalle');
        $pdf = PDF::loadView('pdf.historias', $data);
        dd($pdf);
        return $pdf->stream();
    }
    public function index(Request $request)
    {
        $search = $request->get('search');

        $patients= Patient::orderBy('patients.id')
        ->search($search)
        ->paginate(5);
        return view('patients.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'document'=>'required',
            'name'=>'required'
        ]);
      $patient = Patient::create($request->all());
    //   dd($patient);

      return redirect()->route('patient.index');
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
        $profesional = Professional::get();
        $detalle = History::get();
        $Patient = Patient::select('id')->where('id','=',$id)->get();
        // dd($Patient);
        return view('patients.show',compact('detalle','Patient','profesional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $patient=Patient::findOrFail($id) ;
        $patient->delete();
        return back();
    }
}
