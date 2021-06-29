<?php

namespace App\Http\Controllers;

use App\Renta;
use App\Tipohabitacion;
use App\Habitacion;
use App\Cliente;
use Illuminate\Http\Request;

class RentaController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //     
        $habitacion = Habitacion::find($id);
        $tipohabitacion = Tipohabitacion::find($habitacion->idhabitacion);
        $clientes = Cliente::all();
        return view('rentas.index',compact('tipohabitacion', 'habitacion', 'clientes'));
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

        $request['fecha_inicio'] = \Carbon\Carbon::parse($request['fecha_inicio'])->format('Y-m-d');
        $request['fecha_fin'] = \Carbon\Carbon::parse($request['fecha_fin'])->format('Y-m-d');
        $renta = Renta::where('idhabitacion', $request['idhabitacion'])->first();
        if(!$renta)
        {
            $request['check_in'] = 0;
            $request['check_out'] = 0;
            $this->validate($request,[
                'idcliente' => 'required',
                'idtipohabitacion' => 'required',
                'idhabitacion' => 'required',
                'idprecio_noche' => 'nullable',
                'idprecio_mes' => 'nullable',
                'fecha_inicio' => 'required',
                'fecha_fin' => 'required',
                'costo' => 'required',
                'check_in' => 'required',
                'check_out' => 'required',
            ]);
            Renta::create($request->all());
            return back(); 
        }else if($renta->fecha_fin < $request['fecha_inicio'] || $renta['check_out'] == 1){
            $request['check_in'] = 0;
            $request['check_out'] = 0;
            $this->validate($request,[
                'idcliente' => 'required',
                'idtipohabitacion' => 'required',
                'idhabitacion' => 'required',
                'idprecio_noche' => 'nullable',
                'idprecio_mes' => 'nullable',
                'fecha_inicio' => 'required',
                'fecha_fin' => 'required',
                'costo' => 'required',
                'check_in' => 'required',
                'check_out' => 'required',
            ]);
            Renta::create($request->all());
            return back();     
        }else{
            return back()->with('message', 'Habitación ocupada en esta fecha');
        }
      
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $rentas = Renta::all();
        return view('rentas.show', compact('rentas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function edit(Renta $renta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renta $renta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Renta::find($id)->delete();
        return back();
    }
}
