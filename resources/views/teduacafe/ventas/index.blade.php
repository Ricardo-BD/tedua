@extends('teduacafe.layouts.app')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ventas</h1>
    </div>
    @if ( session()->has('message') )
         <div class="p-4" id="mensaje">
            
            <div class="alert @if(session()->get('message') != 'Efectivo insuficiente') alert-success @else alert-danger @endif alert-dismissable">{{ session()->get('message') }}</div>
            </div>
    @endif
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Cliente</th>
                            <th>Pago</th>
                            <th>Estado</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <?php
                        $total = 0;
                    ?>
                    @foreach($ventas as $venta)
                    
                        <?php
                            $vent = \App\Ventapendiente::where('idventa', $venta->idventa)->get();
                        ?>
                        @foreach($vent as $v)
                            <?php
                                $total += $v->cantidad * \App\Productocafe::find($v->idproducto)->precio_salida;
                            ?>
                        @endforeach
                        <tbody>
                            <tr>
                                <td >{{ $venta->idventa }}</td>
                                <td>{{\App\Clientecafe::find($venta->idcliente)->nombre}}</td>
                                <td >{{\App\Tipopago::find($venta->idtipopago)->nombre}}</td>
                                <td >{{\App\Estadoentrega::find($venta->idestado)->nombre}}</td>
                                <td >{{$total}}</td>
                                <td >{{ $venta->created_at->format('d/m/Y') }}</td>
                                <td class="d-flex" style="max-width: 10px;">

                                <div class="modal fade" id="exampleModal2-{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">Detelles venta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <table class="w-100 table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Cantidad</th>
                                                            <th>Nombre</th>
                                                            <th>Precio</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @foreach($vent as $v)
                                                        <tr>
                                                            <td>{{$v->cantidad}}</td>
                                                            <td>{{\App\Productocafe::find($v->idproducto)->nombre}}</td>
                                                            <td>{{\App\Productocafe::find($v->idproducto)->precio_salida}}</td>
                                                            <td>{{$v->cantidad * \App\Productocafe::find($v->idproducto)->precio_salida}}</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td>Subtotal</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>{{$total - ($total * \App\Configuracioncafe::first()->valor_impuesto/100)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Iva</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>{{$total * \App\Configuracioncafe::first()->valor_impuesto/100}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>{{$total}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class=" btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                             
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="exampleModal-{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar venta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('ventascafe.destroy', $venta->id)}}" method="post">
                                                {{csrf_field()}}
                                                
                                                <input name="_method" type="hidden" value="DELETE">
                                                    
                                                    <div class="col-md-8">
                                                        <p>Seguro que desea eliminar esta venta?</p>
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


                                <a type="button" data-toggle="modal" data-target="#exampleModal2-{{ $venta->id }}"class="btn-sm btn btn-primary" style="    margin: 0em 0.2em 0em 0.2em;">ver</i></a>

                                <a type="button" data-toggle="modal" data-target="#exampleModa-{{ $venta->id }}"class="btn-sm btn btn-secondary" style="    margin: 0em 0.2em 0em 0.2em;">ticket</i></a>

                                <a type="button" data-toggle="modal" data-target="#exampleModal-{{ $venta->id }}"class="btn-sm btn btn-danger" style="    margin: 0em 0.2em 0em 0.2em;">eliminar</i></a>
                                
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
    function cambio() {
        var total = $('#total').text();
        var iva = $('#iva').text();
        var subtotal = $('#subtotal').text();
        var descuento = $('#descuento').val();

        $('#total').text(Number(total) - Number(descuento));
        $('#total2').val(Number(total) - Number(descuento));

        $('#iva').text(Number($('#iva2').val()) * Number($('#total').text()));

        $('#subtotal').text(Number(Number($('#total').text()) - (Number($('#total').text()) * Number($('#iva2').val()))).toFixed(2))
    }

    document.addEventListener("DOMContentLoaded", function(event) {
        if($('#mensaje').show())
        {
            setTimeout(function(){ 
                $('#mensaje').toggle(); 
            }, 3000);
            
        }
    });
</script>              
@endsection