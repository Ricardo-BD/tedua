<?php

namespace App\Http\Controllers;

use App\Usercafe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsercafeController extends Controller
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
    public function create()
    {
        //
    }

    public function loginn(Request $request)
    {
        $credentials = $request->only('name','password');
        
        if(Auth::guard('web')->attempt($credentials)){
            return redirect()->route('cafe.index');
        }else{
            return redirect()->back();
        }
    }


    public function login()
    {
        return view('teduacafe.inicio.login');
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
        $request['password'] = Hash::make($request['password']);
        $this->validate($request,[ 
            'name' => 'required', 
            'email'=>'required',
            'password' => 'required', 
            'nombre_completo' => 'required', 
            'idrole' => 'required', 
        ]);
 
        User::create($request->all());
        Usercafe::create($request->all());
        return redirect()->route('users.cafe');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usercafe  $usercafe
     * @return \Illuminate\Http\Response
     */
    public function show(Usercafe $usercafe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usercafe  $usercafe
     * @return \Illuminate\Http\Response
     */
    public function edit(Usercafe $usercafe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usercafe  $usercafe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usercafe $usercafe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usercafe  $usercafe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Usercafe::find($id)->delete();
        return back();
    }
}
