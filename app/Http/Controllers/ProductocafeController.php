<?php

namespace App\Http\Controllers;

use App\Productocafe;
use App\Categoriapcafe;
use App\Seccion;
use App\Unidad;
use App\Presentacion;
use App\Estatuscocina;
use App\Estatusservicio;
use Illuminate\Http\Request;

class ProductocafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estados_cocina = Estatuscocina::all();
        $estados_servicio = Estatusservicio::all();
        $presentaciones = Presentacion::all();
        $unidades = Unidad::all();
        $secciones = Seccion::all();
        $categorias = Categoriapcafe::all();
        $productos = Productocafe::all();
        return view('teduacafe.productos.index', compact('productos','categorias','secciones','unidades','presentaciones','estados_cocina','estados_servicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $estados_cocina = Estatuscocina::all();
        $estados_servicio = Estatusservicio::all();
        $presentaciones = Presentacion::all();
        $unidades = Unidad::all();
        $secciones = Seccion::all();
        $categorias = Categoriapcafe::all();
        return view('teduacafe.productos.register', compact('categorias','secciones','unidades','presentaciones','estados_cocina','estados_servicio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //obtenemos el campo file definido en el formulario
       $file = $request->file('imagen');
       if($file)
       {
            //obtenemos el nombre del archivo
           $nombre = $file->getClientOriginalName();

           //indicamos que queremos guardar un nuevo archivo en el disco local
           $guardar = \Storage::disk('local')->put($nombre,  \File::get($file));

           $file->move(public_path().'\storage\app\\', $nombre);
       }
       
        if(!$request['usa_inventario']){
            $request['usa_inventario'] = 0;
        }
        if(!$request['usa_ingredientes']){
            $request['usa_ingredientes'] = 0;
        }
        if(!$request['favorito']){
            $request['favorito'] = 0;
        }

        $this->validate($request,[
            'imagen' => 'nullable',
            'codigo' => 'required',
            'nombre' => 'required',
            'idseccion' => 'nullable',
            'idcategoria' => 'nullable',
            'descripcion' => 'nullable',
            'duracion' => 'nullable',
            'precio_entrada' => 'required',
            'precio_salida' => 'required',
            'idunidad' => 'nullable',
            'idpresentacion' => 'nullable',
            'minima_inventario' => 'required',
            'inventario' => 'required',
            'idestadus_cocina' => 'nullable',
            'idestadus_servicio' => 'nullable',
            'activo' => 'required',
            'usa_inventario' => 'required',
            'usa_ingredientes' => 'required',
            'favorito' => 'required', 
        ]);
        
        $id = Productocafe::create($request->all());

        if($file)
        {
            Productocafe::find($id->id)->update([
                'imagen' => $nombre,
            ]);
        }

        $productos = Productocafe::all();
      
        return view('teduacafe.productos.index', compact('productos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productocafe  $productocafe
     * @return \Illuminate\Http\Response
     */
    public function show(Productocafe $productocafe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productocafe  $productocafe
     * @return \Illuminate\Http\Response
     */
    public function edit(Productocafe $productocafe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productocafe  $productocafe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $file = $request->file('imagen');
       if($file)
       {
            //obtenemos el nombre del archivo
           $nombre = $file->getClientOriginalName();

           //indicamos que queremos guardar un nuevo archivo en el disco local
           $guardar = \Storage::disk('local')->put($nombre,  \File::get($file));

           $file->move(public_path().'\storage\app\\', $nombre);
       }
       if(!$request['usa_inventario']){
            $request['usa_inventario'] = 0;
        }
        if(!$request['usa_ingredientes']){
            $request['usa_ingredientes'] = 0;
        }
        if(!$request['favorito']){
            $request['favorito'] = 0;
        }
        $request['inventario'] = Productocafe::find($id)->inventario;
        
        $this->validate($request,[
            'imagen' => 'nullable',
            'codigo' => 'required',
            'nombre' => 'required',
            'idseccion' => 'nullable',
            'idcategoria' => 'nullable',
            'descripcion' => 'nullable',
            'duracion' => 'nullable',
            'precio_entrada' => 'required',
            'precio_salida' => 'required',
            'idunidad' => 'nullable',
            'idpresentacion' => 'nullable',
            'minima_inventario' => 'required',
            'inventario' => 'required',
            'idestadus_cocina' => 'nullable',
            'idestadus_servicio' => 'nullable',
            'activo' => 'nullable',
            'usa_inventario' => 'nullable',
            'usa_ingredientes' => 'nullable',
            'favorito' => 'nullable', 
        ]);

        Productocafe::find($id)->update($request->all());
        if($file)
        {
            Productocafe::find($id)->update([
                'imagen' => $nombre,
            ]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productocafe  $productocafe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Productocafe::find($id)->delete();
        return back();
    }
}
