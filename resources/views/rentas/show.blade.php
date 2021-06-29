@extends('layouts.app2')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rentas</h1>
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Habitacion</th>
                            <th>Tipo</th>
                            <th>Cliente</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Costo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($rentas as $renta)
                    @if($renta)

                        <tbody>
                            <tr>
                                <td id="codigo" name="codigo">{{ \App\Habitacion::find($renta->idhabitacion)->codigo }}</td>
                                <td id="titulo" name="titulo">{{ \App\Tipohabitacion::find($renta->idtipohabitacion)->titulo }}</td>
                                <td id="apellido" name="apellido">{{ \App\Cliente::find($renta->idcliente)->nombre }}</td>
                                <td id="direccion" name="direccion">{{$renta->fecha_inicio}}</td>
                                <td id="categoria" name="categoria">{{$renta->fecha_fin}}</td>
                                <td id="telefono" name="telefono">{{ $renta->costo }}</td>
                                <td class="d-flex">

                             

			                    <div class="modal fade" id="exampleModal2-{{$renta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">Eliminar renta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('rentas.destroy', $renta->id)}}" method="post">
                                                {{csrf_field()}}
                                                
                                                <input name="_method" type="hidden" value="DELETE">
                                                    
                                                    <div class="col-md-8">
                                                        <p>Seguro que desea eliminar este renta?</p>
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
										
                                <a type="button" data-toggle="modal" data-target="#exampleModal2-{{ $renta->id }}"class="btn btn-danger btn-circle" style="    margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-trash"></i></a>
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