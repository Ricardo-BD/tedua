<?php

namespace App\Http\Controllers;

use App\Ingrediente;
use App\Categoriaicafe;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ingredientes = Ingrediente::all();
        $categorias = Categoriaicafe::all();
        return view('teduacafe.ingredientes.index', compact('categorias','ingredientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoriaicafe::all();
        return view('teduacafe.ingredientes.register', compact('categorias'));
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
            'codigo' => 'required',
            'precio_entrada' => 'required',
            'precio_salida' => 'required',
            'idcategoria' => 'nullable',
            'minima_inventario' => 'required',
            'activo' => 'required',
        ]);
        Ingrediente::create($request->all());
        $categorias = Categoriaicafe::all();
        return redirect()->route('ingredientes.index', compact('categorias'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function show(Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $this->validate($request,[ 
            'nombre'=>'required',
            'codigo' => 'required',
            'precio_entrada' => 'required',
            'precio_salida' => 'required',
            'idcategoria' => 'nullable',
            'minima_inventario' => 'required',
            'activo' => 'required',
        ]);
 
        Ingrediente::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Ingrediente::find($id)->delete();
        return back();
    }
}
