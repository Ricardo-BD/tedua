<?php

namespace App\Http\Controllers;

use App\Estadoentrega;
use Illuminate\Http\Request;

class EstadoentregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estados = Estadoentrega::all();
        return view('teduacafe.estadoentregas.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('teduacafe.estadoentregas.register');
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
        Estadoentrega::create($request->all());
        return redirect()->route('estadoentregas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estadoentrega  $estadoentrega
     * @return \Illuminate\Http\Response
     */
    public function show(Estadoentrega $estadoentrega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estadoentrega  $estadoentrega
     * @return \Illuminate\Http\Response
     */
    public function edit(Estadoentrega $estadoentrega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estadoentrega  $estadoentrega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[ 
            'nombre'=>'required',
        ]);
 
        Estadoentrega::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estadoentrega  $estadoentrega
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Estadoentrega::find($id)->delete();
        return back();
    }
}
