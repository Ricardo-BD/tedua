@extends('layouts.app2')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Clientes</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('cliente.register') }}"><i
                class="fas fa-plus fa-sm text-white-50"></i> Agregar cliente</a> 
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>CI</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($clientes as $cliente)
                    @if($cliente)

                        <tbody>
                            <tr>
                                <td id="cedula" name="cedula">{{ $cliente->cedula }}</td>
                                <td id="nombre" name="nombre">{{ $cliente->nombre }}</td>
                                <td id="apellido" name="apellido">{{ $cliente->apellido }}</td>
                                <td id="direccion" name="direccion">{{ $cliente->direccion }}</td>
                                <td id="telefono" name="telefono">{{ $cliente->telefono }}</td>
                                <td class="d-flex">

                                <div class="modal fade" id="exampleModal1-{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal1Label">Editar ciudadano</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('cliente.update', $cliente->id) }}"  role="form">
                                            {{method_field('PUT')}}
                                            {{ csrf_field() }}
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="nombre" class="col-md-4 control-label">Cedula</label>
                                                   <div class="col-md-6">
                                                        <input id="cedula" type="text" class="form-control" name="cedula" value="{{ $cliente->cedula}}" required autofocus> 
                                                    </div>

                                                    <label for="nombre" class="col-md-4 control-label">Nombre</label>
                                                    <div class="col-md-6">
                                                        <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $cliente->nombre}}" required autofocus>
                                                    </div>
                                                    <label for="nombre" class="col-md-4 control-label">Apellido</label>
                                                    <div class="col-md-6">
                                                        <input id="apellido" type="text" class="form-control" name="apellido" value="{{ $cliente->apellido}}" required autofocus>
                                                    </div>
                                                    <label for="nombre" class="col-md-4 control-label">Email</label>
                                                    <div class="col-md-6">
                                                        <input id="email" type="text" class="form-control" name="email" value="{{ $cliente->email}}" required autofocus>
                                                    </div>
                                                    <label for="nombre" class="col-md-4 control-label">Direccion</label>
                                                     <div class="col-md-6">
                                                        <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $cliente->direccion}}" required autofocus>
                                                    </div>
                                                    <label for="nombre" class="col-md-4 control-label">Telefono</label>
                                                    <div class="col-md-6">
                                                        <input id="telefono" type="text" class="form-control" name="telefono" value="{{ $cliente->telefono}}" required autofocus>
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

                                        <a type="button" data-toggle="modal" data-target="#exampleModal1-{{$cliente->id}}" class="btn btn-warning btn-circle" style=" margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-edit"></i></a>     

			                    <div class="modal fade" id="exampleModal2-{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">Eliminar cliente</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('cliente.destroy', $cliente->id)}}" method="post">
                                                {{csrf_field()}}
                                                
                                                <input name="_method" type="hidden" value="DELETE">
                                                    
                                                    <div class="col-md-8">
                                                        <p>Seguro que desea eliminar este cliente?</p>
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
										
                                <a type="button" data-toggle="modal" data-target="#exampleModal2-{{ $cliente->id }}"class="btn btn-danger btn-circle" style="    margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-trash"></i></a>
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