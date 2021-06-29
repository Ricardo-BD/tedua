@extends('teduacafe.layouts.app')

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
                            <form class="user" method="POST" action="{{route('productoscafe.store')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Imagen</label>
                                        <input type="file" class="form-control" id="imagen" name="imagen" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>   
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" 
                                             style="border-radius: 10rem;
                                                ">
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
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Duracion</label>
                                        <input type="text" class="form-control" id="duracion" name="duracion" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div> 
                                       
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="col-sm-9">Seccion Restaurant</label>
                                        <select name="idseccion" class="form-control">
                                            <option value="">--NINGUNA--</option>
                                            @foreach($secciones as $seccion)
                                            <option value="{{$seccion->id}}">{{$seccion->nombre}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                    </div> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Categoria</label>
                                        <select class="form-control" name="idcategoria">
                                            <option value="">--NINGUNA--</option>
                                            @foreach($categorias as $categoria)
                                            @if($categoria->id != 1)
                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>  
                                </div>
                                <div class="form-group row"> 
                                    <div class="col-sm-12 mb-3 mb-sm-0">
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
                                 
                                        <select class="form-control" name="idunidad">
                                            <option value="">--NINGUNA--</option>
                                                   @foreach($unidades as $unidad)
                                            <option value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Presentacion</label>
                                        
                                        <select class="form-control" name="idpresentacion">
                                            <option value="">--NINGUNA--</option>
                                            @foreach($presentaciones as $presentacion)
                                            <option value="{{$presentacion->id}}">{{$presentacion->nombre}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-9">Minima en Inventario</label>
                                        <input type="text" class="form-control" id="minima_inventario" name="minima_inventario" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Inventario Inicial</label>
                                        <input type="text" class="form-control" id="inventario" name="inventario" 
                                             style="border-radius: 10rem;
                                                ">
                                    </div>  
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                         <label class="col-sm-8">Estatus Cocina</label>
                                        <select class="form-control" name="idestatus_cocina">
                                            @foreach($estados_cocina as $estado_cocina)
                                            <option value="{{$estado_cocina->id}}">{{$estado_cocina->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="col-sm-8">Estatus Servicio</label>
                                        <select class="form-control" name="idestatus_servicio">
                                            @foreach($estados_servicio as $estado_servicio)
                                            <option value="{{$estado_servicio->id}}">{{$estado_servicio->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                         <div class="form-check">
                                            <input type="checkbox" class="form-check-input"  name="usa_inventario" id="usa_inventario" onclick="usa_inventarioo(this)" value="0">
                                            <label class="form-check-label" for="exampleCheck1">Usa Inventario</label>
                                          </div>
                                    </div>   
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                         <div class="form-check">
                                            <input type="checkbox" class="form-check-input"  name="usa_ingredientes" id="usa_ingredientes" onclick="usa_ingredientess(this)" value="0">
                                            <label class="form-check-label" for="exampleCheck1">Usa Ingredientes</label>
                                          </div>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                         <div class="form-check">
                                            <input type="checkbox" class="form-check-input"  name="favorito" id="favorito" onclick="favoritoo(this)" value="0">
                                            <label class="form-check-label" for="exampleCheck1">Favorito</label>
                                          </div>
                                          <input  class="collapse" value="1" name="activo">
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
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        console.log('hola');
        $('#usa_ingredientes').val('0');
        $('#usa_inventario').val('0');
        $('#favorito').val('0');
    });
   
    function usa_ingredientess(e) {
       if(e.checked){
            $(e).val('1');
       }else{
            $(e).val('0');
       }
    }

    function usa_inventarioo(e) {
       if(e.checked){
            $(e).val('1');
       }else{
            $(e).val('0');
       }
    }

    function favoritoo(e) {
       if(e.checked){
            $(e).val('1');
       }else{
            $(e).val('0');
       }
    }
</script>
@endsection