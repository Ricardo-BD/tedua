<?php

namespace App\Http\Controllers;

use App\Productocafe;
use App\Ventapendiente;
use App\Clientecafe;
use App\Ventacafe;
use App\Seccion;
use App\Mesa;
use App\Formapago;
use App\Tipopago;
use App\Estadoentrega;
use Illuminate\Http\Request;

class VentacafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function venta_mesa_index()
    {
        //
        $secciones = Seccion::all();
        $mesas = Mesa::all();
        return view('teduacafe.venta_mesa.index', compact('secciones','mesas'));
    }

    public function venta_producto_index()
    {
        //
        $productos = Productocafe::all();
        return view('teduacafe.venta_producto.index', compact('productos'));
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
     
        if($request['efectivo'] < $request['total']){
            return redirect()->back()->with('message', 'Efectivo insuficiente');
        }
        if($request['efectivo'] >= $request['total']){
            
        
        $data = $this->validate($request, [
            'idventa' => 'required',
            'idcliente' => 'required',
            'idestado' => 'required',
            'idtipopago' => 'required',
            'idpago' => 'required',
            'propina' => 'required',
            'descuento' => 'required',
            'efectivo' => 'required',
        ]);
       
        $cambio = 'Venta procesada exitosamente, cambio = '.((int)$request['efectivo']-(int)$request['total']);

        
        
        Ventacafe::create($data);
        Ventapendiente::where('idventa', $request['idventa'])->update([
            'pendiente' => '0',
        ]);
        return redirect()->back()->with('message',$cambio);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ventacafe  $ventacafe
     * @return \Illuminate\Http\Response
     */
    public function show(Ventacafe $ventacafe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ventacafe  $ventacafe
     * @return \Illuminate\Http\Response
     */
    public function edit(Ventacafe $ventacafe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ventacafe  $ventacafe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ventacafe $ventacafe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ventacafe  $ventacafe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $id2 = Ventacafe::find($id)->idventa;
        Ventacafe::find($id)->delete();
        Ventapendiente::where('idventa', $id2)->delete();
        return redirect()->back();
    }

    public function ventasdiarias()
    {
        $hoy = \Carbon\Carbon::now();
        $ventas = Ventacafe::all();
        return view('teduacafe.ventasdiarias.index', compact('ventas','hoy'));
    }

    public function ventascafe()
    {

        $ventas = Ventacafe::all();
        return view('teduacafe.ventas.index', compact('ventas'));
    }

    public function ventascobrar()
    {
        $clientes = Clientecafe::all();
        $ventas = Ventapendiente::all();
        $tipos = Formapago::all();
        $pagos = Tipopago::all();
        $estados = Estadoentrega::all();
        return view('teduacafe.venta_cobrar.index', compact('ventas', 'clientes', 'tipos', 'pagos', 'estados'));
    }

    public function ventasentrega()
    {
        $clientes = Clientecafe::all();
        $ventas = Ventacafe::all();
        $tipos = Formapago::all();
        $pagos = Tipopago::all();
        $estados = Estadoentrega::all();
        return view('teduacafe.venta_entregar.index', compact('ventas', 'clientes', 'tipos', 'pagos', 'estados'));
    }
}
