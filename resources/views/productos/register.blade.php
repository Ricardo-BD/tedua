@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 d-flex justify-content-center">
                <!-- Nested Row within Card Body -->         
                   <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Nueva Producto</h1>
                            </div>
                            <form class="user" method="POST" action="{{route('productos.store')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Codigo</label>
                                        <input type="text" class="form-control" id="codigo" name="codigo" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Categoria</label>
                                        <select class="form-control" name="idcategoria">
                                            @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Descripcion</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Precio Entrada</label>
                                        <input type="text" class="form-control" id="precio_entrada" name="precio_entrada" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Precio Salida</label>
                                        <input type="text" class="form-control" id="precio_salida" name="precio_salida" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Unidad</label>
                                        <input type="text" class="form-control" id="unidad" name="unidad" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Presentacion</label>
                                        <input type="text" class="form-control" id="presentacion" name="presentacion" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Inventario</label>
                                        <input type="text" class="form-control" id="inventario" name="inventario" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                         <label class="col-sm-8">Activo</label>
                                        <select class="form-control" name="idestado">
                                            @foreach($estados as $estado)
                                            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Imagen</label>
                                        <input type="file" class="form-control" id="imagen" name="imagen" 
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