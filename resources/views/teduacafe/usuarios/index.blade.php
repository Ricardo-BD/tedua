@extends('teduacafe.layouts.app')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('userscafe.create') }}"><i class="fas fa-plus fa-sm text-white-50"></i> Agregar usuario</a> 
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre completo</th>
                            <th>Nombre de usuario</th>
                            <th>Email</th>
                            <th>Tipo de usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($users as $user)
                 

                    @if($user && ($user->idrole == 1 || $user->idrole == 4 || $user->idrole == 5 || $user->idrole == 6))

                        <tbody>
                            <tr>
                                <td>{{ $user->nombre_completo }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{$user->email}}</td>
                                <td>{{ \App\Role::find($user->idrole)->nombre }}</td>

                                <td class="d-flex">

                                <div class="modal fade" id="exampleModal1-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal1Label">Editar ciudadano</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form">
                                          
                                            {{ csrf_field() }}
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="titulo" class="col-md-8 control-label">Nombre completo</label>
                                                   <div class="col-md-6">
                                                        <input id="nombre_completo" type="text" class="form-control" name="nombre_completo" value="{{ $user->nombre_completo}}" required autofocus> 
                                                    </div>

                                                    <label for="titulo" class="col-md-8 control-label">Nombre de usuario</label>
                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name}}" required autofocus>
                                                    </div>
                                                    <label for="titulo" class="col-md-8 control-label">Tipo de usuario</label>
                                                    <div class="col-md-6">
                                                        <?php
                                                            $roles = \App\Role::all();
                                                        ?>
                                                       
                                                        <select class="form-control" name="idrole">
                                                            <option value="{{\App\Role::find($user->idrole)->id}}">{{\App\Role::find($user->idrole)->nombre}}</option>
                                                            @foreach($roles as $role)
                                                            @if($role->nombre != \App\Role::find($user->idrole)->nombre && $role->id == 4 || $role->id == 5 || $role->id == 6)
                                                            <option value="{{$role->id}}">{{$role->nombre}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label for="titulo" class="col-md-8 control-label">Email</label>
                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email}}" required autofocus>
                                                    </div>
                                                    <label for="titulo" class="col-md-8 control-label">Contraseña</label>
                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control" name="password" value=""  >
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

                                        <a type="button" data-toggle="modal" data-target="#exampleModal1-{{$user->id}}" class="btn btn-warning btn-circle" style=" margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-edit"></i></a>     

                                <div class="modal fade" id="exampleModal2-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">Eliminar usuario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('usercafe.destroy', $user->id)}}" method="post">
                                                {{csrf_field()}}
                                                
                                                <input name="_method" type="hidden" value="DELETE">
                                                    
                                                    <div class="col-md-8">
                                                        <p>Seguro que desea eliminar este usuario?</p>
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
                                        
                                <a type="button" data-toggle="modal" data-target="#exampleModal2-{{ $user->id }}"class="btn btn-danger btn-circle" style="    margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-trash"></i></a>
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