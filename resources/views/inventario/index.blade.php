@extends('layouts.app2')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Invetario</h1>
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Por recibir</th>
                            <th>Disponible</th>
                            <th>Por entregar</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($productos as $producto)
                    @if($producto)

                        <tbody>
                            <tr>
                                <td id="codigo" name="codigo">{{ $producto->codigo }}</td>
                                <td id="codigo" name="codigo">{{ $producto->nombre }}</td>
                                <td id="codigo" name="codigo">0</td>
                                <td id="codigo" name="codigo">{{ $producto->inventario }}</td>
                                <td id="codigo" name="codigo">0</td>
                                <td class="d-flex">

                                
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