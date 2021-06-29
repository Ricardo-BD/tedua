<?php

namespace App\Http\Controllers;

use App\Configuracioncafe;
use Illuminate\Http\Request;

class ConfiguracioncafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('teduacafe.administracion.configuracion');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Configuracioncafe  $configuracioncafe
     * @return \Illuminate\Http\Response
     */
    public function show(Configuracioncafe $configuracioncafe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Configuracioncafe  $configuracioncafe
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuracioncafe $configuracioncafe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Configuracioncafe  $configuracioncafe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'titulo_sistema' => 'required',
            'nombre_impuesto' => 'required', 
            'valor_impuesto' => 'required', 
            'simbolo' => 'required',
            'logo' => 'nullable', 
            'fondo' => 'nullable', 
            'footer_pdf' => 'required', 
            'titulo_ticket' => 'required', 
            'encabezado_1' => 'required', 
            'encabezado_2' => 'required', 
            'nit' => 'required', 
            'direccion' => 'required', 
            'telefono' => 'required',
        ]);
        Configuracioncafe::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Configuracioncafe  $configuracioncafe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuracioncafe $configuracioncafe)
    {
        //
    }
}
