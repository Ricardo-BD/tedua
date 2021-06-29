@extends('teduacafe.layouts.app')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Servicios Delivery</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('deliveris.register') }}"><i
                class="fas fa-plus fa-sm text-white-50"></i> Agregar servicio delivery</a> 
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tiempo(minutos)</th>
                            <th>Precio x Tiempo</th>
                            <th style="width: 10px !important;">Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($deliveris as $deliveri)
                    @if($deliveri)

                        <tbody>
                            <tr>
                                <td>{{ $deliveri->nombre }}</td>
                                <td>{{ $deliveri->tiempo }}</td>
                                <td>{{ $deliveri->precio }}</td>
                                <td class="d-flex">

                                <div class="modal fade" id="exampleModal1-{{$deliveri->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal1Label">Editar ciudadano</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('deliveris.update', $deliveri->id) }}"  role="form">
                                          
                                            {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="titulo" class="col-md-4 control-label">Nombre</label>
                                                   <div class="col-md-6">
                                                        <input type="text" class="form-control" name="nombre" value="{{ $deliveri->nombre}}" required autofocus> 
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

                                        <a type="button" data-toggle="modal" data-target="#exampleModal1-{{$deliveri->id}}" class="btn btn-warning btn-circle" style=" margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-edit"></i></a>     

			                    <div class="modal fade" id="exampleModal2-{{$deliveri->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">Eliminar deliveri</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('deliveris.destroy', $deliveri->id)}}" method="post">
                                                {{csrf_field()}}
                                                
                                                <input name="_method" type="hidden" value="DELETE">
                                                    
                                                    <div class="col-md-8">
                                                        <p>Seguro que desea eliminar esta deliveri?</p>
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
										
                                <a type="button" data-toggle="modal" data-target="#exampleModal2-{{ $deliveri->id }}"class="btn btn-danger btn-circle" style="    margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-trash"></i></a>
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