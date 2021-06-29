@extends('teduacafe.layouts.app')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Clientes</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('clientescafe.register') }}"><i class="fas fa-plus fa-sm text-white-50"></i> Agregar cliente</a> 
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>RUT</th>
                            <th>Nombre completo</th>
                            <th>Direccion</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($clientes as $cliente)
                 

                    

                        <tbody>
                            <tr>
                                <td>{{ $cliente->rut }}</td>
                                <td>{{ $cliente->nombre }} {{ $cliente->apellido }}</td>
                                <td>{{ $cliente->direccion }}</td>
                                <td>{{$cliente->email}}</td>
                                <td>{{ $cliente->telefono }}</td>

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
                                            <form method="POST" action="{{ route('clientescafe.update', $cliente->id) }}"  role="form">
                                          
                                            {{ csrf_field() }}
                                        
                                         <div class="form-group row" >
                                           <div class="col-md-6">
                                                <label class="col-md-8 control-label">RUT</label>
                                                <input type="text" class="form-control" name="rut" value="{{ $cliente->rut}}" required autofocus> 
                                            </div>
                                        </div>

                                        <div class="form-group row" >
                                           <div class="col-md-6">
                                                <label class="col-md-8 control-label">Nombre</label>
                                                <input type="text" class="form-control" name="nombre" value="{{ $cliente->nombre}}" required autofocus> 
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-md-8 control-label">Apellido</label>
                                                <input type="text" class="form-control" name="apellido" value="{{ $cliente->apellido}}" required autofocus> 
                                            </div>
                                        </div>


                                         <div class="form-group row" >
                                           <div class="col-md-12">
                                                <label class="col-md-8 control-label">Direccion</label>
                                                <input type="text" class="form-control" name="direccion" value="{{ $cliente->direccion}}" required autofocus> 
                                            </div>
                                        </div>

                                        <div class="form-group row" >
                                           <div class="col-md-12">
                                                <label class="col-md-8 control-label">Email</label>
                                                <input type="text" class="form-control" name="email" value="{{ $cliente->email}}" required autofocus> 
                                            </div>
                                        </div>

                                         <div class="form-group row" >
                                           <div class="col-md-6">
                                                <label class="col-md-8 control-label">Telefono</label>
                                                <input type="text" class="form-control" name="telefono" value="{{ $cliente->telefono}}" > 
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-md-8 control-label">Celular</label>
                                                <input type="text" class="form-control" name="celular" value="{{ $cliente->celular}}" > 
                                            </div>
                                        </div>
                                         <div class="form-group row" >
                                           <div class="col-md-6">
                                                <label class="col-md-8 control-label">Contacto</label>
                                                <input type="text" class="form-control" name="contacto" value="{{ $cliente->contacto}}" > 
                                            </div>
                                        </div>

                                         <div class="form-group row" >
                                           <div class="col-md-12">
                                                <label class="col-md-8 control-label">Sitio web</label>
                                                <input type="text" class="form-control" name="sitio_web" value="{{ $cliente->sitio_web}}" > 
                                            </div>
                                        </div>

                                         <div class="form-group row" >
                                            <div class="col-md-6">
                                             <div class="form-check">
                                                <input type="checkbox" class="form-check-input"  name="es_empresa" onclick="es_empresaa(this)" @if($cliente->es_empresa == 1) checked value="1" @else  value="0" @endif>
                                                <label class="form-check-label">Es empresa</label>
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

                                        <a type="button" data-toggle="modal" data-target="#exampleModal1-{{$cliente->id}}" class="btn btn-warning btn-circle" style=" margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-edit"></i></a>     

                                <div class="modal fade" id="exampleModal2-{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">Eliminar usuario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('clientescafe.destroy', $cliente->id)}}" method="post">
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
                                        
                                <a type="button" data-toggle="modal" data-target="#exampleModal2-{{ $cliente->id }}"class="btn btn-danger btn-circle" style="    margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-trash"></i></a>
                                 </td>
                            </tr>
                        </tbody>
                     
                    @endforeach
                    
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function es_empresaa(e) {
       if(e.checked){
            $(e).val('1');
       }else{
            $(e).val('0');
       }
    }
</script>                
@endsection