@extends('teduacafe.layouts.app')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Secciones de Restaurante</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('seccion.register') }}"><i
                class="fas fa-plus fa-sm text-white-50"></i> Agregar seccion</a> 
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th style="width: 10px !important;">Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($secciones as $seccion)
                    @if($seccion)

                        <tbody>
                            <tr>
                                <td>{{ $seccion->nombre }}</td>
        
                                <td class="d-flex">

                                <div class="modal fade" id="exampleModal1-{{$seccion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal1Label">Editar ciudadano</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('seccion.update', $seccion->id) }}"  role="form">
                                            {{method_field('PUT')}}
                                            {{ csrf_field() }}
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="titulo" class="col-md-4 control-label">codigo</label>
                                                   <div class="col-md-6">
                                                        <input type="text" class="form-control" name="nombre" value="{{ $seccion->nombre}}" required autofocus> 
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

                                        <a type="button" data-toggle="modal" data-target="#exampleModal1-{{$seccion->id}}" class="btn btn-warning btn-circle" style=" margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-edit"></i></a>     

			                    <div class="modal fade" id="exampleModal2-{{$seccion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">Eliminar seccion</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('seccion.destroy', $seccion->id)}}" method="post">
                                                {{csrf_field()}}
                                                
                                                <input name="_method" type="hidden" value="DELETE">
                                                    
                                                    <div class="col-md-8">
                                                        <p>Seguro que desea eliminar esta seccion?</p>
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
										
                                <a type="button" data-toggle="modal" data-target="#exampleModal2-{{ $seccion->id }}"class="btn btn-danger btn-circle" style="    margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-trash"></i></a>
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