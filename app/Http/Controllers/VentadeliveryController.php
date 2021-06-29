<?php

namespace App\Http\Controllers;

use App\Ventadelivery;
use App\Ventapendiente;
use App\Ventacafe;
use App\Clientecafe;
use App\Tipoventa;
use App\Usercafe;
use App\Delivery;
use App\Productocafe;
use App\Estadoentrega;
use App\Tipopago;
use App\Formapago;
use App\Mesa;
use Illuminate\Http\Request;

class VentadeliveryController extends Controller
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
        $ventas = Ventadelivery::all();
        $tipos = Formapago::all();
        $pagos = Tipopago::all();
        $estados = Estadoentrega::all();
        return view('teduacafe.venta_delivery.index', compact('ventas', 'clientes', 'tipos', 'pagos', 'estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipoventas = Tipoventa::all();
        $meseros = Usercafe::where('idrole', 4)->get();
        $servicios = Delivery::all();
        $productos = Productocafe::all();
        return view('teduacafe.venta_delivery.register', compact('productos','servicios','tipoventas','meseros'));
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
            'ventapendientes' => 'required',
            'ventapendientes.*.idproducto' => 'required',
            'ventapendientes.*.idmesero' => 'required',
            'ventapendientes.*.idservicio' => 'required',
            'ventapendientes.*.idtipoventa' => 'required',
            'ventapendientes.*.cantidad' => 'required',
            'ventapendientes.*.idventa' => 'required',
            'ventapendientes.*.created_at' => 'required',
            'ventapendientes.*.pendiente' => 'required',  
        ]);

        $data = $request->all();

        $venta = Ventadelivery::insert($data['ventapendientes']);
        return back()->with('message', 'Venta creada exitosamente');
    }


    public function store2(Request $request, $id)
    {
        //
        if($request['efectivo'] < $request['total']){
            return redirect()->back()->with('message', 'Efectivo insuficiente');
        }
        if($request['efectivo'] >= $request['total']){

        Ventadelivery::where('idventa', $id)->update([
            'pendiente' => '0',
        ]);
        $cambio = 'Venta procesada exitosamente, cambio = '.((int)$request['efectivo']-(int)$request['total']);
        return redirect()->back()->with('message',$cambio);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ventadelivery  $ventadelivery
     * @return \Illuminate\Http\Response
     */
    public function show(Ventadelivery $ventadelivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ventadelivery  $ventadelivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Ventadelivery $ventadelivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ventadelivery  $ventadelivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'idservicio' => 'required',
        ]);
        Ventadelivery::where('idservicio', $id)->update([
            'idservicio' => $request['idservicio'],
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ventadelivery  $ventadelivery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Ventadelivey::find($id)->delete();
        return redirect()->back();
    }

    public function monitor_index()
    {
        //
        $mesas = Mesa::all();
        return view('teduacafe.monitor.index', compact('mesas'));
    }

    public function cocina_index()
    {
        //
        $ventas = Ventacafe::all();

        return view('teduacafe.cocina.index', compact('ventas'));
    }

    public function cocina_entregado($id)
    {

        Ventacafe::where('idventa',$id)->update([
            'idestado' => '1',
        ]);
        return redirect()->back()->with('message','Venta entregada exitosamente');
    }
}
