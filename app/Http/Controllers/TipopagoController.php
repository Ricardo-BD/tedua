<?php

namespace App\Http\Controllers;

use App\Tipopago;
use Illuminate\Http\Request;

class TipopagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = Tipopago::all();
        return view('teduacafe.tipopagos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('teduacafe.tipopagos.register');
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
        Tipopago::create($request->all());
        return redirect()->route('tipopagos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipopago  $tipopago
     * @return \Illuminate\Http\Response
     */
    public function show(Tipopago $tipopago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipopago  $tipopago
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipopago $tipopago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipopago  $tipopago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[ 
            'nombre'=>'required',
        ]);
 
        Tipopago::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipopago  $tipopago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Tipopago::find($id)->delete();
        return back();
    }
}
