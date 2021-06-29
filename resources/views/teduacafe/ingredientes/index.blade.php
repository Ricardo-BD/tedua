@extends('teduacafe.layouts.app')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ingredientes</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('ingredientes.register') }}"><i
                class="fas fa-plus fa-sm text-white-50"></i> Agregar ingrediente</a> 
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Precio Entrada</th>
                            <th>Precio Salida</th>
                            <th>Categoria</th>
                            <th>Minima</th>
                            <th>Activo</th>
                            <th style="width: 10px !important;">Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($ingredientes as $ingrediente)
                    @if($ingrediente)

                        <tbody>
                            <tr>
                                <td>{{ $ingrediente->codigo }}</td>
                                <td>{{ $ingrediente->nombre }}</td>
                                <td>{{ $ingrediente->precio_entrada }}</td>
                                <td>{{ $ingrediente->precio_salida }}</td>
                                <td>@if($ingrediente->idcategoria != null){{ \App\Categoriaicafe::find($ingrediente->idcategoria)->nombre }} @else -- @endif</td>
                                <td>{{ $ingrediente->minima_inventario }}</td>
                                <td>@if($ingrediente->activo == 'Si') Si @else No @endif</td>
                                <td class="d-flex">

                                <div class="modal fade" id="exampleModal1-{{$ingrediente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal1Label">Editar ingrediente</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('ingredientes.update', $ingrediente->id) }}"  role="form">
                                          
                                            {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="titulo" class="col-md-4 control-label">Nombre</label>
                                                   <div class="col-md-6">
                                                        <input type="text" class="form-control" name="nombre" value="{{ $ingrediente->nombre}}" required autofocus> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="titulo" class="col-md-4 control-label">Codigo</label>
                                                   <div class="col-md-6">
                                                        <input type="text" class="form-control" name="codigo" value="{{ $ingrediente->codigo}}" required autofocus> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="titulo" class="col-md-4 control-label">Precio entrada</label>
                                                   <div class="col-md-6">
                                                        <input type="text" class="form-control" name="precio_entrada" value="{{ $ingrediente->precio_entrada}}" required autofocus> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="titulo" class="col-md-4 control-label">Precio salida</label>
                                                   <div class="col-md-6">
                                                        <input type="text" class="form-control" name="precio_salida" value="{{ $ingrediente->precio_salida}}" required autofocus> 
                                                    </div>
                                                </div>
                                              
                                                <div class="form-group">
                                                    <label for="titulo" class="col-md-4 control-label">Nombre</label>
                                                   <div class="col-md-6">
                                                        <select class="form-control" name="idcategoria">
                                                            <option value="">--NINGUNA--</option>
                                                            @foreach($categorias as $categoria)
                                                            
                                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                           
                                                            @endforeach
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="titulo" class="col-md-4 control-label">Minima inventario</label>
                                                   <div class="col-md-6">
                                                        <input type="text" class="form-control" name="minima_inventario" value="{{ $ingrediente->minima_inventario}}" required autofocus> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                     <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"  name="activo" id="activo" onclick="activoo(this)" @if($ingrediente->activo == 'Si') checked value="Si"@else  value="No" @endif>
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

                                        <a type="button" data-toggle="modal" data-target="#exampleModal1-{{$ingrediente->id}}" class="btn btn-warning btn-circle" style=" margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-edit"></i></a>     

			                    <div class="modal fade" id="exampleModal2-{{$ingrediente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">Eliminar ingrediente</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('ingredientes.destroy', $ingrediente->id)}}" method="post">
                                                {{csrf_field()}}
                                                
                                                <input name="_method" type="hidden" value="DELETE">
                                                    
                                                    <div class="col-md-8">
                                                        <p>Seguro que desea eliminar esta ingrediente?</p>
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
										
                                <a type="button" data-toggle="modal" data-target="#exampleModal2-{{ $ingrediente->id }}"class="btn btn-danger btn-circle" style="    margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-trash"></i></a>
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
    function activoo(e) {
       if(e.checked){
            $(e).val('1');
       }else{
            $(e).val('0');
       }
</script>              
@endsection