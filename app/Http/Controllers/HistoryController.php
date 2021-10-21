<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Patient;
use App\Models\Professional;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function digitalizar(){
        $paciente=Patient::select('patients.name','patients.id')->get()->toArray();
        $profesional=Professional::select('Professionals.name','Professionals.id')->get()->toArray();

        // dd($paciente);
        return view('histories.digitalizar',compact('paciente','profesional'));
    }

    public function index()
    {
        $historia = History::select('*')->distinct('idPatient')->get();
        return view('histories.index',compact('historia'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paciente=Patient::select('patients.name','patients.id')->get()->toArray();
        $profesional=Professional::select('Professionals.name','Professionals.id')->get()->toArray();

        // dd($paciente);
        return view('histories.create',compact('paciente','profesional'));
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
            'history'=>'required',
            'date'=>'required',
            'idPatient'=>'required',
            'idProfessional'=>'required',
        ]);
        $img= $request->file('history');
        // dd($img);
        $img->move('uploads',$img->getClientOriginalName());
        $historia = History::create([
        'history' => $img->getClientOriginalName(),
        'date'=>$request->input('date'),
        'idPatient'=>$request->input('idPatient'),
        'idProfessional'=>$request->input('idProfessional'),
        ]);

        return redirect()->route('home');
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
        $historia=History::findOrfail($id);
        $historia->delete();
        return back();
    }
}
