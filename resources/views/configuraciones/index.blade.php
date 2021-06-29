@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 d-flex justify-content-center">
                <!-- Nested Row within Card Body -->         
                   <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Configuraciones</h1>
                            </div>
                            <?php 
                                $configuracion = \App\Configuracion::first();
                            ?>
                            <form class="user" method="POST" action="{{route('configuraciones.update', $configuracion->id)}}">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-12">Nombre del sistema</label>
                                        <input type="text" class="form-control" id="nombre" name="titulo_sistema" 
                                             style="border-radius: 10rem;
                                                " value="{{$configuracion->titulo_sistema}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-12">
                                        <label class="col-sm-12">Nombre del impuesto</label>
                                        <input type="text" class="form-control" id="apellido" name="nombre_impuesto" 
                                             style="border-radius: 10rem;
                                                " value="{{$configuracion->nombre_impuesto}}">
                                    </div>
                                 </div>   
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12">Valor impuesto (%)</label>
                                        <input type="text" class="form-control " id="cedula" name="valor_impuesto" 
                                             style="border-radius: 10rem;
                                                " value="{{$configuracion->valor_impuesto}}">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-12">
                                        <label class="col-sm-12">Simbolo de moneda</label>
                                        <input type="text" class="form-control " id="telefono" name="simbolo" 
                                             style="border-radius: 10rem;
                                                " value="{{$configuracion->simbolo}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Actualizar
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