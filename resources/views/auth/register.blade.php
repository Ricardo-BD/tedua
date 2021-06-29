@extends('layouts.app2')

@section('content')
<div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 d-flex justify-content-center">
                <!-- Nested Row within Card Body -->         
                   <div class="col-lg-7">
                        <div class="p-5">
            <div class="panel panel-default">
                <div class="d-sm-flex align-items-center justify-content-between mb-4 text-center">
        <h1 class="h3 mb-0 text-gray-800">Registro de usuarios</h1>
        
    </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('users.register') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                <label for="nombre_completo" class="col-md-12 control-label">Nombre de completo</label>
                                <input id="nombre_completo" type="text" class="form-control" name="nombre_completo" value="{{ old('nombre_completo') }}" required autofocus>
                            </div>
                            

                            <div class="col-md-6">
                                <label for="name" class="col-md-12 control-label">Nombre de usuario</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                      

                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                <label for="email" class="col-md-12 control-label">E-Mail</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                               
                            </div>


                            <div class="col-md-6">
                                <label for="idrole" class="col-md-12 control-label">Tipo de usuario</label>
                                <?php 
                                    $roles = \App\Role::all();
                                ?>
                                <select name="idrole" class="form-control">
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                <label for="password" class="col-md-12 control-label">Contraseña</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>


                            <div class="col-md-6">
                                <label for="password-confirm" class="col-md-12 control-label">Confirmar Contraseña</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
