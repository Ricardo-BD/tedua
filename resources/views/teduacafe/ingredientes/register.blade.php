@extends('teduacafe.layouts.app')

@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 d-flex justify-content-center">
                <!-- Nested Row within Card Body -->         
                   <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Nuevo ingrediente</h1>
                            </div>
                            <form class="user" method="POST" action="{{route('ingredientes.store')}}">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Codigo</label>
                                        <input type="text" class="form-control" name="codigo" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>   
                                </div>
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
                                        <label class="col-sm-8">Categoria</label>
                                        <select name="idcategoria" class="form-control">
                                            <option value="">--NINGUNA--</option>
                                            @foreach($categorias as $categoria)
                                         
                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                          
                                            @endforeach
                                        </select>
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Precio entrada</label>
                                        <input type="text" class="form-control" name="precio_entrada" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Precio salida</label>
                                        <input type="text" class="form-control" name="precio_salida" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Minima inventario</label>
                                        <input type="text" class="form-control" name="minima_inventario" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>   
                                </div>
                                <input name="activo" value="1" class="collapse">
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