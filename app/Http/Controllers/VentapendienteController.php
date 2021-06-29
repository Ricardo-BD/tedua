<?php

namespace App\Http\Controllers;

use App\Ventapendiente;
use Illuminate\Http\Request;
use App\Productocafe;
use App\Mesa;
use App\Tipoventa;
use App\User;
use App\Usercafe;
use App\Clientecafe;
use App\Formapago;
use App\Tipopago;
use App\Estadoentrega;

class VentapendienteController extends Controller
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
        $ventas = Ventapendiente::all();
        $tipos = Formapago::all();
        $pagos = Tipopago::all();
        $estados = Estadoentrega::all();
        return view('teduacafe.venta_pendiente.index', compact('ventas', 'clientes', 'tipos', 'pagos', 'estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $tipoventas = Tipoventa::all();
        $meseros = Usercafe::where('idrole', 4)->get();
        $mesa = Mesa::find($id);
        $productos = Productocafe::all();
        return view('teduacafe.venta_pendiente.register', compact('productos','mesa','tipoventas','meseros'));
    }

    public function ventaproducto_create()
    {
        $tipoventas = Tipoventa::all();
        $meseros = Usercafe::where('idrole', 4)->get();
        $mesas = Mesa::all();
        $productos = Productocafe::all();
        return view('teduacafe.venta_producto.register', compact('productos','mesas','tipoventas','meseros'));
    }

    public function ventamesa_store(Request $request)
    {
   
        $this->validate($request,[
            'ventapendientes' => 'required',
            'ventapendientes.*.idproducto' => 'required',
            'ventapendientes.*.idmesero' => 'required',
            'ventapendientes.*.idmesa' => 'required',
            'ventapendientes.*.idtipoventa' => 'required',
            'ventapendientes.*.cantidad' => 'required',
            'ventapendientes.*.idventa' => 'required',
            'ventapendientes.*.created_at' => 'required',
            'ventapendientes.*.pendiente' => 'required',  
        ]);

        $data = $request->all();

        $venta = Ventapendiente::insert($data['ventapendientes']);
        return back()->with('message', 'Venta creada exitosamente');
    }

    public function ventaproducto_store(Request $request)
    {
   
        $this->validate($request,[
            'ventapendientes' => 'required',
            'ventapendientes.*.idproducto' => 'required',
            'ventapendientes.*.idmesero' => 'required',
            'ventapendientes.*.idmesa' => 'required',
            'ventapendientes.*.idtipoventa' => 'required',
            'ventapendientes.*.cantidad' => 'required',
            'ventapendientes.*.idventa' => 'required',
            'ventapendientes.*.created_at' => 'required',
            'ventapendientes.*.pendiente' => 'required',  
        ]);

        $data = $request->all();

        $venta = Ventapendiente::insert($data['ventapendientes']);
        return back()->with('message', 'Venta creada exitosamente');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ventapendiente  $ventapendiente
     * @return \Illuminate\Http\Response
     */
    public function show(Ventapendiente $ventapendiente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ventapendiente  $ventapendiente
     * @return \Illuminate\Http\Response
     */
    public function edit(Ventapendiente $ventapendiente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ventapendiente  $ventapendiente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'idmesa' => 'required',
        ]);
        Ventapendiente::where('idventa', $id)->update([
            'idmesa' => $request['idmesa'],
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ventapendiente  $ventapendiente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Ventapendiente::where('idventa', $id)->delete();
        return redirect()->back();
    }
}
