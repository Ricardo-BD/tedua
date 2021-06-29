@extends('teduacafe.layouts.app')

@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 d-flex justify-content-center">
                <!-- Nested Row within Card Body -->         
                   <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Nueva mesa de restaurante</h1>
                            </div>
                            <form class="user" method="POST" action="{{route('mesas.store')}}">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Seccion</label>
                                        <select name="idseccion" class="form-control">
                                            @foreach($secciones as $seccion)
                                            <option value="{{$seccion->id}}">{{$seccion->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Numero de Minutos</label>
                                        <input type="text" class="form-control" name="tiempo" 
                                             style="border-radius: 10rem;
                                                " value="0">
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Precio por los minutos {{\App\Configuracioncafe::all()->first()->simbolo}}</label>
                                        <input type="text" class="form-control" name="precio" 
                                             style="border-radius: 10rem;
                                                " value="0">
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