<?php

namespace App\Http\Controllers;

use App\Categoriapcafe;
use Illuminate\Http\Request;

class CategoriapcafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = Categoriapcafe::all();
        return view('teduacafe.categoriaproductos.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('teduacafe.categoriaproductos.register');
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
        Categoriapcafe::create($request->all());
        return redirect()->route('categoriaproductos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoriapcafe  $categoriapcafe
     * @return \Illuminate\Http\Response
     */
    public function show(Categoriapcafe $categoriapcafe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoriapcafe  $categoriapcafe
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoriapcafe $categoriapcafe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoriapcafe  $categoriapcafe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[ 
            'nombre'=>'required',
        ]);
 
        Categoriapcafe::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoriapcafe  $categoriapcafe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Categoriapcafe::find($id)->delete();
        return back();
    }
}
