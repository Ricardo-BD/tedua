@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 d-flex justify-content-center">
                <!-- Nested Row within Card Body -->         
                   <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Nuevo Tipo de Habitacion</h1>
                            </div>
                            <form class="user" method="POST" action="{{route('habitaciones.store')}}">
                                {{ csrf_field() }}
                                <div class="form-group row">

                                        <div class="col-sm-12">
                                        <label class="col-sm-8">Habitacion</label>
                                        <select class="form-control " id="idhabitacion" name="idhabitacion">
                                            @foreach($tipohabitaciones as $tipohabitacion)
                                                <option value="{{$tipohabitacion->id}}">{{$tipohabitacion->titulo}}</option>
                                            @endforeach
                                        </select> 
                                            
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Codigo</label>
                                        <input type="text" class="form-control" id="codigo" name="codigo" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>   
                                </div>
                                <div class="form-group row">

                                        <div class="col-sm-12">
                                        <label class="col-sm-8">Estatus</label>
                                        <select class="form-control " id="idestatus" name="idestatus">
                                            @foreach($estatus as $estatu)
                                                <option value="{{$estatu->id}}">{{$estatu->nombre}}</option>
                                            @endforeach
                                        </select> 
                                            
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