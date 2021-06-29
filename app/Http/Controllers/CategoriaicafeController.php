<?php

namespace App\Http\Controllers;

use App\Categoriaicafe;
use Illuminate\Http\Request;

class CategoriaicafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = Categoriaicafe::all();
        return view('teduacafe.categoriaingredientes.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('teduacafe.categoriaingredientes.register');
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
        Categoriaicafe::create($request->all());
        return redirect()->route('categoriaingredientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoriaicafe  $categoriaicafe
     * @return \Illuminate\Http\Response
     */
    public function show(Categoriaicafe $categoriaicafe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoriaicafe  $categoriaicafe
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoriaicafe $categoriaicafe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoriaicafe  $categoriaicafe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[ 
            'nombre'=>'required',
        ]);
 
        Categoriaicafe::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoriaicafe  $categoriaicafe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Categoriaicafe::find($id)->delete();
        return back();
    }
}
