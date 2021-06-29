<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Tipohabitacion;
use App\Habitacion;
use App\User;
use App\Configuracion;
use App\Renta;
use App\Usercafe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function entrada()
    {
        $rentas = Renta::all();
        return view('entrada.entrada', compact('rentas'));
    }

    public function check_in($id)
    {
        Renta::find($id)->update([
            'check_in' => 1,
        ]);
        return back();
    }

    public function check_out($id)
    {
        Renta::find($id)->update([
            'check_out' => 1,
        ]);
        return back();
    }

    public function rentarhabitacion()
    {
        $tipohabitaciones = Tipohabitacion::all();
        $habitaciones = Habitacion::all();
        return view('rentarhabitacion.rentarhabitacion', compact('tipohabitaciones', 'habitaciones'));
    }

    public function usuario()
    {
        $users = User::all();
        return view('usuarios.index', compact('users'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return back();
    }

    public function update(Request $request, $id)
    {
        if(!$request['password'])
        {
            $request['password'] = User::find($id)->password;
        }
        $this->validate($request,[
            'name' => 'required', 
            'email' => 'required', 
            'password' => 'required', 
            'nombre_completo' => 'required',
            'idrole' => 'required',
        ]);
        User::find($id)->update($request->all());
        return back();
    }

    public function register(Request $request)
    {

       $this->validate($request,[
            'nombre_completo' => 'required',
            'name' => 'required', 
            'email' => 'required', 
            'password' => 'required', 
            'idrole' => 'required'
        ]);
        $user = User::create($request->all());
        User::find($user->id)->update([
            'password' => Hash::make($request['password']),
        ]);
        return back(); 
    }

    public function create()
    {
        return view('auth.register');
    }

    public function config_index()
    {
        return view('configuraciones.index');
    }

    public function config_update(Request $request, $id)
    {

        $this->validate($request,[
            'titulo_sistema' => 'required',
            'nombre_impuesto' => 'required', 
            'valor_impuesto' => 'required', 
            'simbolo' => 'required',
        ]);
        Configuracion::find($id)->update($request->all());
        return back();
    }

    public function user_cafe()
    {
        $users = Usercafe::all();
        return view('teduacafe.usuarios.index', compact('users'));
    }

    
    public function registercafe(Request $request)
    {

       $this->validate($request,[
            'nombre_completo' => 'required',
            'name' => 'required', 
            'email' => 'required', 
            'password' => 'required', 
            'idrole' => 'required'
        ]);
        $user = User::create($request->all());
        User::find($user->id)->update([
            'password' => Hash::make($request['password']),
        ]);
        return back(); 
    }
    
    public function createcafe()
    {
        return view('teduacafe.usuarios.register');
    }
}
