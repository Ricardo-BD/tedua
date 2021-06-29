<?php

namespace App\Http\Controllers;

use App\Mediopago;
use Illuminate\Http\Request;

class MediopagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medios = Mediopago::all();
        return view('teduacafe.mediopagos.index', compact('medios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('teduacafe.mediopagos.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 
            'nombre'=>'required',
        ]);
        Mediopago::create($request->all());
        return redirect()->route('mediopagos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mediopago  $mediopago
     * @return \Illuminate\Http\Response
     */
    public function show(Mediopago $mediopago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mediopago  $mediopago
     * @return \Illuminate\Http\Response
     */
    public function edit(Mediopago $mediopago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mediopago  $mediopago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[ 
            'nombre'=>'required',
        ]);
 
        Mediopago::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mediopago  $mediopago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Mediopago::find($id)->delete();
        return back();
    }
}
