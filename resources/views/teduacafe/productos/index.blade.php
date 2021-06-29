@extends('teduacafe.layouts.app')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Productos</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('productoscafe.register') }}"><i
                class="fas fa-plus fa-sm text-white-50"></i> Agregar producto</a> 
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th style="width: 50px !important;">Imagen</th>
                            <th>Nombre</th>
                            <th>Precio Entrada</th>
                            <th>Precio Salida</th>
                            <th>Categoria</th>
                            <th>Minima</th>
                            <th>Favorito</th>
                            <th>Activo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($productos as $producto)
                    @if($producto)

                        <tbody>
                            <tr>
                                <td>{{ $producto->codigo }}</td>
                                <td ><img style="width:80px;" src="{{ asset('/storage/app/'.$producto->imagen) }}" alt=""></td>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->precio_entrada }}</td>
                                <td>{{ $producto->precio_salida }}</td>
                                <td>@if($producto->idcategoria) {{\App\Categoriapcafe::find($producto->idcategoria)->nombre}} @else -- @endif</td>
                                <td>{{ $producto->minima_inventario }}</td>
                                <td>@if($producto->favorito == 1) Si @else No @endif</td>
                                <td>@if($producto->activo == 1) Si @else No @endif</td>
                                <td class="d-flex">

                                <div class="modal fade" id="exampleModal1-{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal1Label">Editar producto</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('productoscafe.update', $producto->id) }}"  role="form" enctype="multipart/form-data">
                                            
                                            {{ csrf_field() }}

                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label  class="col-md-8 control-label">Imagen</label>
                                                    <input type="file" class="form-control" name="imagen"> 
                                                </div>
                                            </div>      
                                            <div class="form-group row">
                                                
                                               <div class="col-md-6">
                                                <label class="col-md-8 control-label">Codigo</label>
                                                    <input id="codigo" type="text" class="form-control" name="codigo" value="{{ $producto->codigo}}" required autofocus> 
                                                </div>

                                                
                                                <div class="col-md-6">
                                                    <label  class="col-md-8 control-label">Nombre</label>
                                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $producto->nombre}}" required autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                
                                               <div class="col-md-6">
                                                <label  class="col-md-8 control-label">Duracion</label>
                                                    <input type="text" class="form-control" name="duracion" value="{{ $producto->duracion}}" > 
                                                </div>
                                                 <div class="col-md-6">
                                                    <label class="col-md-9 control-label">Minima Inventario</label>
                                                    <input type="text" class="form-control" name="minima_inventario" value="{{ $producto->minima_inventario}}" >
                                                </div>
                                                
                                                
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label  class="col-md-8 control-label">Precio Entrada</label>
                                                    <input type="text" class="form-control" name="precio_entrada" value="{{ $producto->precio_entrada}}" >
                                                </div>
                                               <div class="col-md-6">
                                                <label  class="col-md-8 control-label">Precio Salida</label>
                                                    <input type="text" class="form-control" name="precio_salida" value="{{ $producto->precio_salida}}" > 
                                                </div>   
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label  class="col-md-8 control-label">Categoria</label>
                                                    <select name="idcategoria" class="form-control">
                                                        <option @if($producto->idcategoria != null) value="{{$producto->idcategoria}}" @else value="" @endif>@if($producto->idcategoria != null) {{\App\Categoriapcafe::find($producto->idcategoria)->nombre }} @else --NINGUNA-- @endif</option>
                                                        @foreach($categorias as $categoria)
                                                        @if($producto->idcategoria != null && $producto->idcategoria != $categoria->id)
                                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                        @endif
                                                        @endforeach

                                                    </select>
                                                </div>  
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label  class="col-md-8 control-label">Descripcion</label>
                                                    <input type="text" class="form-control" name="descripcion" value="{{ $producto->descripcion}}" >
                                                </div>  
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label class="col-sm-8">Unidad</label>
                                 
                                                    <select class="form-control" name="idunidad">
                                                        <option @if($producto->idunidad) value="{{$producto->idunidad}}" @else value="" @endif>@if($producto->idunidad >= 1) {{\App\Unidad::find($producto->idunidad)->nombre}} @else --NINGUNA-- @endif</option>
                                                               @foreach($unidades as $unidad)
                                                          @if($unidad->id != null && $unidad->id != $producto->idunidad)     
                                                        <option value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                               <div class="col-md-6">
                                                <label class="col-sm-8">Presentacion</label>
                                        
                                                <select class="form-control" name="idpresentacion">
                                                        <option @if($producto->idpresentacion) value="{{$producto->idpresentacion}}" @else value="" @endif>@if($producto->idpresentacion >= 1) {{\App\Presentacion::find($producto->idpresentacion)->nombre}} @else --NINGUNA-- @endif</option>
                                                               @foreach($presentaciones as $presentacion)
                                                          @if($presentacion->id != null && $presentacion->id != $producto->idpresentacion)     
                                                        <option value="{{$presentacion->id}}">{{$presentacion->nombre}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>   
                                            </div>
                                             

                                         <div class="form-group row">
                                            <div class="col-md-6">
                                                <label class="col-sm-8">Estatus Cocina</label>
                                                <select class="form-control" name="idestatus_cocina">
                                                    <option @if($producto->idestados_cocina) value="{{$producto->idestados_cocina}}" @else value="" @endif>@if($producto->idestados_cocina >= 1) {{\App\Estatuscocina::find($producto->idestados_cocina)->nombre}} @else --NINGUNA-- @endif</option>
                                                    @foreach($estados_cocina as $estado_cocina)
                                                     @if($estado_cocina->id != null && $estado_cocina->id != $producto->idestados_cocina)
                                                    <option value="{{$estado_cocina->id}}">{{$estado_cocina->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-sm-8">Estatus Servicio</label>
                                                <select class="form-control" name="idestatus_servicio">
                                                    <option @if($producto->idestados_servicio) value="{{$producto->idestados_servicio}}" @else value="" @endif>@if($producto->idestados_servicio >= 1) {{\App\Estatuscocina::find($producto->idestados_servicio)->nombre}} @else --NINGUNA-- @endif</option>
                                                    @foreach($estados_servicio as $estado_servicio)
                                                    @if($estado_servicio->id != null && $estado_servicio->id != $producto->idestados_servicio)
                                                    <option value="{{$estado_servicio->id}}">{{$estado_servicio->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>  
                                        </div>

                                        <div class="form-group row">
                                             <div class="col-md-6">
                                                 <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"  name="usa_inventario" id="usa_inventario" onclick="usa_inventarioo(this)" @if($producto->usa_inventario == 1) checked value="1"@else  value="0" @endif>
                                                    <label class="form-check-label" for="exampleCheck1">Usa Inventario</label>
                                                  </div>
                                            </div>   
                                             <div class="col-md-6">
                                                 <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"  name="usa_ingredientes" id="usa_ingredientes" onclick="usa_ingredientess(this)"@if($producto->usa_ingredientes == 1) checked value="1"@else  value="0" @endif>
                                                    <label class="form-check-label" for="exampleCheck1">Usa Ingredientes</label>
                                                  </div>
                                            </div>
                                             <div class="col-md-6">
                                                 <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"  name="favorito" id="favorito" onclick="favoritoo(this)" @if($producto->favorito == 1) checked value="1"@else  value="0" @endif>
                                                    <label class="form-check-label" for="exampleCheck1">Favorito</label>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                 <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"  name="activo" id="activo" onclick="activoo(this)" @if($producto->activo == 1) checked value="1"@else  value="0" @endif>
                                                    <label class="form-check-label" for="exampleCheck1">Activo</label>
                                                  </div>
                                            </div>     
                                        </div>
                                           
                                        </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                                </form>
                                              </div>

                                            </div>

                                          </div>

                                        </div>


                                        <a type="button" data-toggle="modal" data-target="#exampleModal1-{{$producto->id}}" class="btn btn-warning btn-circle" style=" margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-edit"></i></a>     

			                    <div class="modal fade" id="exampleModal2-{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">Eliminar producto</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('productoscafe.destroy', $producto->id)}}" method="post">
                                                {{csrf_field()}}
                                                
                                                <input name="_method" type="hidden" value="DELETE">
                                                    
                                                    <div class="col-md-8">
                                                        <p>Seguro que desea eliminar este producto?</p>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
										
                                <a type="button" data-toggle="modal" data-target="#exampleModal2-{{ $producto->id }}"class="btn btn-danger btn-circle" style="    margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-trash"></i></a>
			                     </td>
                            </tr>
                        </tbody>
                    @endif    
                    @endforeach          
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
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

    function activoo(e) {
       if(e.checked){
            $(e).val('1');
       }else{
            $(e).val('0');
       }
    }
</script>                 
@endsection