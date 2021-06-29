<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Producto;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        if($request['efectivo'] == $request['total'])
        {
            $this->validate($request,[ 
                'idproducto'=>'required',
                'pago'=>'required',
                'entrega'=>'required',
                'total'=>'required',
                'efectivo'=>'required',
                'cantidad' => 'required',
     
            ]);
            $producto = Producto::find($request['idproducto']);
            Compra::create($request->all()); 
            Producto::find($request['idproducto'])->update([
                'inventario' =>  $producto->inventario + $request['cantidad'],
            ]);
            return back();
        }
        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Compra::find($id)->delete();
        return back();
    }
}
