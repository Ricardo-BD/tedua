@extends('layouts.app2')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Entrada y salida</h1>
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
                                @if($renta->check_in == 0 && $renta->check_out == 0)
                                <form action="{{ route('check_in', $renta->id) }}" method="POST">
                                    {{ csrf_field() }}
                                <button type="submit" class="btn btn-success btn-sm" style="margin: 0em 0.2em 0em 0.2em;" href="">Check in</button>
                                </form>
                                @endif
                                @if($renta->check_in == 1 && $renta->check_out == 0)
                                <form action="{{ route('check_out', $renta->id) }}" method="POST">
                                    {{ csrf_field() }}
                                <button type="submit" class="btn btn-warning btn-sm" style="margin: 0em 0.2em 0em 0.2em;" href="{{ route('check_out', $renta->id) }}">Check out</button>
                                </form>
                                @endif
                                @if($renta->check_in == 1 && $renta->check_out == 1)<a type="button" class="btn btn-primary btn-sm" style="margin: 0em 0.2em 0em 0.2em;">Renta finalizada</a>
                                @endif
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