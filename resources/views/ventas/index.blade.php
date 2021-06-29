@extends('layouts.app2')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ventas</h1>
    </div>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Cliente</th>
                            <th>Pago</th>
                            <th>Entrega</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    @foreach($ventas as $ventaa)
                    <?php
                        
                        
                    ?>
                    @endforeach
                    <?php

                        $total = 0;
                        $aux = 0;
                        $pas = true;
                    ?>
                    @foreach($ventas as $ventaa)
                    @if($ventaa)

                        <?php
                            if($aux == $i=$ventaa->idventa){
                                $pas = false;
                            }
                            $i=$ventaa->idventa;
                            $aux = $i;
                            $ventat = \App\Venta::where('idventa', $i)->get();
                            $venta = $ventat->first();
                          
                        ?>
                        @if($venta != null && $pas == true)
                        <tbody>
                            <tr>
                                <td >{{ $venta->id }}</td>
                                <td>{{\App\Cliente::find($venta->idcliente)->nombre  }}</td>
                                <td >{{ $venta->pago }}</td>
                                <td >{{ $venta->entrega }}</td>
                                <td >{{\App\Configuracion::first()->simbolo}} {{ $venta->efectivo }}</td>
                                <td >{{ $venta->created_at->format('d/m/Y') }}</td>
                                <td class="d-flex">

                                <div class="modal fade" id="exampleModal2-{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">Eliminar venta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('venta.destroy', $venta->idventa)}}" method="post">
                                                {{csrf_field()}}
                                                
                                                <input name="_method" type="hidden" value="DELETE">
                                                    
                                                    <div class="col-md-8">
                                                        <p>Seguro que desea eliminar este venta?</p>
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

                                <a href="{{ route('factura.pdf',$venta->idventa) }}" type="button" class="btn btn-primary btn-circle"><i class="fa fa-ticket-alt"></i></a>
                                        
                                <a type="button" data-toggle="modal" data-target="#exampleModal2-{{ $venta->id }}"class="btn btn-danger btn-circle" style="    margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-trash"></i></a>
                                
                           </td>
                            </tr>
                        </tbody>
                    @endif  
                    @endif  
                    @endforeach          
                </table>
            </div>
        </div>
    </div>
</div>
                 
@endsection