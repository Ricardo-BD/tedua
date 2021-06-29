@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 d-flex justify-content-center">
                <!-- Nested Row within Card Body -->         
                   <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Nuevo usuario</h1>
                            </div>
                            <form class="user" method="POST" action="{{route('cliente.store')}}">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-sm-8">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="col-sm-8">Cedula</label>
                                        <input type="text" class="form-control " id="cedula" name="cedula" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-sm-8">Teléfono</label>
                                        <input type="text" class="form-control " id="telefono" name="telefono" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>
                                </div>
                                <div class="form-group row">

                                        <div class="col-sm-12">
                                        <label class="col-sm-8">Email</label>
                                        <input type="text" class="form-control " id="email" name="email" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>
                                </div>
                                <div class="form-group row">

                                        <div class="col-sm-12">
                                        <label class="col-sm-8">Dirección</label>
                                        <input type="text" class="form-control " id="direccion" name="direccion" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Registrar
                                </button>
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>   
            </div>
        </div>
    </div>

@endsection