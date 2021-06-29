<?php

namespace App\Http\Controllers;

use App\Venta;
use App\Producto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class VentaController extends Controller
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

    public function factura($id)
    {
        $venta = Venta::where('idventa', $id)->get();
        
        $pdf = PDF::loadView('pdf.factura', compact('venta'));

        return $pdf->download('factura.pdf');
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
        
        if($request['efectivo'] * 1 == $request['total'] * 1){
        $this->validate($request,[
            'venta' => 'required',
            'venta.*.idproducto' => 'required',
            'venta.*.pago' => 'required',
            'venta.*.entrega' => 'required',
            'venta.*.efectivo' => 'required',
            'venta.*.descuento' => 'required',
            'venta.*.idcliente' => 'required',
            'venta.*.cantidad' => 'required',
            'venta.*.idventa' => 'required',
            'venta.*.created_at' => 'required',
        ]);
        
        $data = $request->all();
        $venta = Venta::insert($data['venta']);
        }else if($request['efectivo'] * 1 < $request['total'] * 1){
            return back()->with('message', 'Efectivo insuficiente');
        }else if($request['efectivo'] * 1 > $request['total'] * 1){
            return back()->with('message', 'Efectivo sobrepasa el total');
        }
     

        /*$this->validate($request,[ 
            'idproducto'=>'required',
            'pago'=>'required',
            'entrega'=>'required',
            'total'=>'required',
            'efectivo'=>'required',
            'descuento' => 'nullable',
            'idcliente' => 'required',
            'cantidad' => 'required',
 
        ]);
        Venta::create($request->all());
        $producto = Producto::find($request['idproducto']);
        if($producto->inventario >= $request['cantidad'])
        {
             
            Producto::find($request['idproducto'])->update([
                'inventario' =>  $producto->inventario - $request['cantidad'],
            ]);
        }*/
        return back()->with('message', 'Venta creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Venta::where('idventa', $id)->delete();
        return back();
    }
}
