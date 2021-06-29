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
                            <form class="user" method="POST" action="{{route('tipohabitacion.store')}}">
                                {{ csrf_field() }}
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
                                        <label class="col-sm-8">Titulo</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-8">Descripcion</label>
                                        <input type="text" class="form-control " id="descripcion" name="descripcion" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                 <div class="col-sm-12">
                                        <label class="col-sm-8">Precio por noche</label>
                                        <input type="text" class="form-control " id="precio_noche" name="precio_noche" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>
                                </div>
                                <div class="form-group row">

                                        <div class="col-sm-12">
                                        <label class="col-sm-8">Precio por mes</label>
                                        <input type="text" class="form-control " id="precio_mes" name="precio_mes" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>
                                </div>
                                <div class="form-group row">

                                        <div class="col-sm-12">
                                        <label class="col-sm-8">Categoria</label>
                                        <select class="form-control " id="idcategoria" name="idcategoria">
                                            @foreach($categorias as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
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