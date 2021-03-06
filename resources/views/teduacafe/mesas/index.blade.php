@extends('teduacafe.layouts.app')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mesas de Restaurante</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('mesas.register') }}"><i
                class="fas fa-plus fa-sm text-white-50"></i> Agregar mesa</a> 
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Seccion</th>
                            <th>Tiempo(minutos)</th>
                            <th>Precio x Tiempo</th>
                            <th style="width: 10px !important;">Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($mesas as $mesa)
                    @if($mesa)

                        <tbody>
                            <tr>
                                <td>{{ $mesa->nombre }}</td>
                                <td>{{ \App\Seccion::find($mesa->idseccion)->nombre }}</td>
                                <td>{{ $mesa->tiempo }}</td>
                                <td>{{ $mesa->precio }}</td>
                                <td class="d-flex">

                                <div class="modal fade" id="exampleModal1-{{$mesa->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal1Label">Editar ciudadano</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('mesas.update', $mesa->id) }}"  role="form">
                                          
                                            {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="titulo" class="col-md-4 control-label">Nombre</label>
                                                   <div class="col-md-6">
                                                        <input type="text" class="form-control" name="nombre" value="{{ $mesa->nombre}}" required autofocus> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="titulo" class="col-md-4 control-label">Seccion</label>
                                                    <div class="col-md-6">
                                                       <select name="idseccion" class="form-control">
                                                            <option value="{{\App\Seccion::find($mesa->idseccion)->id}}">{{\App\Seccion::find($mesa->idseccion)->nombre}}</option>
                                                            @foreach($secciones as $seccion)
                                                            @if(\App\Seccion::find($mesa->idseccion)->nombre != $seccion->nombre)
                                                            <option value="{{$seccion->id}}">
                                                                
                                                                    {{$seccion->nombre}}
                                                                
                                                            </option>
                                                            @endif 
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="col-md-4">Numero de Minutos</label>
                                                    <div class="col-md-6">
                                                        
                                                        <input type="text" class="form-control" name="tiempo" 
                                                              value="0">
                                                    </div>   
                                                </div>
                                                <div class="form-group ">
                                                    <label class="col-md-4">Precio por los minutos {{\App\Configuracioncafe::all()->first()->simbolo}}</label>
                                                   <div class="col-md-6">
                                                        
                                                        <input type="text" class="form-control" name="precio" 
                                                              value="0">
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

                                        <a type="button" data-toggle="modal" data-target="#exampleModal1-{{$mesa->id}}" class="btn btn-warning btn-circle" style=" margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-edit"></i></a>     

			                    <div class="modal fade" id="exampleModal2-{{$mesa->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">Eliminar mesa</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('mesas.destroy', $mesa->id)}}" method="post">
                                                {{csrf_field()}}
                                                
                                                <input name="_method" type="hidden" value="DELETE">
                                                    
                                                    <div class="col-md-8">
                                                        <p>Seguro que desea eliminar esta mesa?</p>
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
										
                                <a type="button" data-toggle="modal" data-target="#exampleModal2-{{ $mesa->id }}"class="btn btn-danger btn-circle" style="    margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-trash"></i></a>
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
                 
@endsection