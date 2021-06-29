<?php

namespace App\Http\Controllers;

use App\Categoriap;
use Illuminate\Http\Request;

class CategoriapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoriasp = Categoriap::all();
        return view('categoriasp.index', compact('categoriasp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categoriasp.register');
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
        Categoriap::create($request->all());
        $categoriasp = Categoriap::all();
        return view('categoriasp.index', compact('categoriasp'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoriap  $categoriap
     * @return \Illuminate\Http\Response
     */
    public function show(Categoriap $categoriap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoriap  $categoriap
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoriap $categoriap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoriap  $categoriap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[ 
            'nombre'=>'required',
        ]);
 
        Categoriap::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoriap  $categoriap
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Categoriap::find($id)->delete();
        return back();
    }
}
