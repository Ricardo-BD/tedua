@extends('teduacafe.layouts.app')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cocina</h1>
    </div>
    @if ( session()->has('message') )
         <div class="p-4" id="mensaje">
            
            <div class="alert @if(session()->get('message') == 'Venta entregada exitosamente') alert-success @else alert-danger @endif alert-dismissable">{{ session()->get('message') }}</div>
            </div>
        @endif
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mesa</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Tiempo</th>
                            <th>Mesero</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    @foreach($ventas as $venta)
                    @if($venta)
                    <?php

                        $vent = \App\Ventapendiente::where('idventa', $venta->idventa)->get();

                    ?>
                    @if($venta->idestado != 1)
                    @foreach($vent as $v)
                    
                        <tbody>
                            <tr>
                                <td>{{ \App\Mesa::find($v->idmesa)->nombre }}</td>
                                <td >{{ \App\Productocafe::find($v->idproducto)->nombre }}</td>
                                <td>{{ $v->cantidad }}</td>
                                <td>{{ \App\Productocafe::find($v->idproducto)->duracion * $v->cantidad }}</td>
                                <td>{{ \App\Usercafe::find($v->idmesero)->name }}</td>
                                <td class="d-flex">
                                   
                                    <form action="{{ route('cocina.entregado', $venta->idventa) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning">Entregar</button>
                                    </form>
                                    
                                    
			                     </td>
                            </tr>
                        </tbody>
                       
                    @endforeach 
                     @endif
                    @endif    
                    @endforeach          
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        if($('#mensaje').show())
        {
            setTimeout(function(){ 
                $('#mensaje').toggle(); 
            }, 2000);
            
        }
    });
</script>            
@endsection