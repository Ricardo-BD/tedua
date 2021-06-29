<?php

namespace App\Http\Controllers;

use App\Clientecafe;
use Illuminate\Http\Request;

class ClientecafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = Clientecafe::all();
        return view('teduacafe.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('teduacafe.clientes.register');
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
        if($request['es_empresa'] == null){
            $request['es_empresa'] = 0;
        }
        $this->validate($request,[ 
            'rut' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'email' => 'required',
            'telefono' => 'nullable',
            'celular' => 'nullable',
            'contacto' => 'nullable',
            'sitio_web' => 'nullable',
            'es_empresa' => 'required',
        ]);
        Clientecafe::create($request->all());
        return redirect()->route('clientescafe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clientecafe  $clientecafe
     * @return \Illuminate\Http\Response
     */
    public function show(Clientecafe $clientecafe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientecafe  $clientecafe
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientecafe $clientecafe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientecafe  $clientecafe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request['es_empresa'] == null){
            $request['es_empresa'] = 0;
        }
        $this->validate($request,[ 
            'rut' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'email' => 'required',
            'telefono' => 'nullable',
            'celular' => 'nullable',
            'contacto' => 'nullable',
            'sitio_web' => 'nullable',
            'es_empresa' => 'required',
        ]);
 
        Clientecafe::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientecafe  $clientecafe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Clientecafe::find($id)->delete();
        return back();
    }
}
