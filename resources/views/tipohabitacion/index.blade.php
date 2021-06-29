@extends('layouts.app2')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tipo de Habitaciones</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('tipohabitacion.register') }}"><i
                class="fas fa-plus fa-sm text-white-50"></i> Agregar habitacion</a> 
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Titulo</th>
                            <th>Habitaciones</th>
                            <th>Disponibles</th>
                            <th>Categoria</th>
                            <th>Precio/Noche</th>
                            <th>Precio/Mes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($tipohabitacion as $habitacion)
                    @if($habitacion)

                        <tbody>
                            <tr>
                                <td id="codigo" name="codigo">{{ $habitacion->codigo }}</td>
                                <td id="titulo" name="titulo">{{ $habitacion->titulo }}</td>
                                <td id="apellido" name="apellido">{{\App\Habitacion::where("idhabitacion","=",$habitacion->id)->get()->count()}}</td>
                                <td id="direccion" name="direccion">{{\App\Habitacion::where("idhabitacion","=",$habitacion->id)->where("idestatus","=",1)->get()->count()}}</td>
                                <td id="categoria" name="categoria">{{\App\Categoria::find($habitacion->idcategoria)->nombre}}</td>
                                <td id="telefono" name="telefono">{{ $habitacion->precio_noche }}</td>
                                <td id="telefono" name="telefono">{{ $habitacion->precio_mes }}</td>
                                <td class="d-flex">

                                <div class="modal fade" id="exampleModal1-{{$habitacion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal1Label">Editar ciudadano</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('tipohabitacion.update', $habitacion->id) }}"  role="form">
                                            {{method_field('PUT')}}
                                            {{ csrf_field() }}
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="titulo" class="col-md-4 control-label">codigo</label>
                                                   <div class="col-md-6">
                                                        <input id="codigo" type="text" class="form-control" name="codigo" value="{{ $habitacion->codigo}}" required autofocus> 
                                                    </div>

                                                    <label for="titulo" class="col-md-4 control-label">titulo</label>
                                                    <div class="col-md-6">
                                                        <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $habitacion->titulo}}" required autofocus>
                                                    </div>
                                                    <label for="titulo" class="col-md-4 control-label">Apellido</label>
                                                    <div class="col-md-6">
                                                        <input id="apellido" type="text" class="form-control" name="apellido" value="{{ $habitacion->apellido}}" required autofocus>
                                                    </div>
                                                    <label for="titulo" class="col-md-4 control-label">Email</label>
                                                    <div class="col-md-6">
                                                        <input id="email" type="text" class="form-control" name="email" value="{{ $habitacion->email}}" required autofocus>
                                                    </div>
                                                    <label for="titulo" class="col-md-4 control-label">Direccion</label>
                                                     <div class="col-md-6">
                                                        <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $habitacion->direccion}}" required autofocus>
                                                    </div>
                                                    <label for="titulo" class="col-md-4 control-label">Telefono</label>
                                                    <div class="col-md-6">
                                                        <input id="telefono" type="text" class="form-control" name="telefono" value="{{ $habitacion->telefono}}" required autofocus>
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

                                        <a type="button" data-toggle="modal" data-target="#exampleModal1-{{$habitacion->id}}" class="btn btn-warning btn-circle" style=" margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-edit"></i></a>     

			                    <div class="modal fade" id="exampleModal2-{{$habitacion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">Eliminar habitacion</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('tipohabitacion.destroy', $habitacion->id)}}" method="post">
                                                {{csrf_field()}}
                                                
                                                <input name="_method" type="hidden" value="DELETE">
                                                    
                                                    <div class="col-md-8">
                                                        <p>Seguro que desea eliminar este habitacion?</p>
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
										
                                <a type="button" data-toggle="modal" data-target="#exampleModal2-{{ $habitacion->id }}"class="btn btn-danger btn-circle" style="    margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-trash"></i></a>
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