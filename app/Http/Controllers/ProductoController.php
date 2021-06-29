<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoriap;
use App\Estado;
use App\Cliente;
use App\Venta;
use App\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function inventario()
    {
        //
        $productos = Producto::all();
        return view('inventario.index', compact('productos'));
    }

    public function abastecimiento()
    {
        //
        $productos = Producto::all();
        return view('inventario.abastecimiento',compact('productos'));
    }

    public function venta()
    {
        //
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas'));
       
    }

    public function ventap()
    {
        //
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('productos.ventas', compact('productos', 'clientes'));
       
    }

    public function compra()
    {
        $compras = Compra::all();
        return view('compras.index', compact('compras'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $estados = Estado::all();
        $categorias = Categoriap::all();
        return view('productos.register', compact('categorias','estados'));
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
       
        
        $this->validate($request,[
            'idcategoria' => 'required', 
            'nombre'=>'required',
            'imagen' => 'nullable', 
            'codigo' => 'required', 
            'descripcion' => 'required', 
            'precio_entrada' => 'required', 
            'precio_salida' => 'required', 
            'unidad' => 'required', 
            'presentacion' => 'required', 
            'inventario' => 'required', 
            'idestado' => 'required', 
        ]);
        
        $id = Producto::create($request->all());

        if($file)
        {
            Producto::find($id->id)->update([
                'imagen' => $nombre,
            ]);
        }

        $productos = Producto::all();
      
        return view('productos.index', compact('productos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[ 
            'idcategoria' => 'required', 
            'nombre'=>'required',
            'imagen' => 'required', 
            'codigo' => 'required', 
            'descripcionoria' => 'required', 
            'precio_entrada' => 'required', 
            'precio_salida' => 'required', 
            'unidad' => 'required', 
            'presentacion' => 'required', 
            'inventario' => 'required', 
            'idestado' => 'required',
        ]);
 
        Producto::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Producto::find($id)->delete();
        return back();
    }
}
