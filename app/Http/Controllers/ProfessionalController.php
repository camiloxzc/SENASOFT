<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\History;
use App\Models\Professional;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $prof = Professional::orderBy('professionals.id')
        ->search($search)
        ->paginate(5);
        $career = Career::get();
        // dd($prof);
        return view('professionals.index',compact('prof','career'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $profesion=Career::get();
        return view('professionals.create',compact('profesion'));
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
            'signature'=>'required',
            'name'=>'required',
            'idCareer'=>'required'
        ]);
        $img= $request->file('signature');

        $img->move('signatures',$img->getClientOriginalName());
        Professional::create([
            'signature' => $img->getClientOriginalName(),
            'name'=>$request->input('name'),
            'idCareer'=>$request->input('idCareer')

        ]);
        return redirect()->route('professional.index');
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
        $prof=Professional::find($id);
        $prof->delete();

        return back();
    }
}
