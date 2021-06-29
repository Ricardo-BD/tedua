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
                            <th>Mesa</th>
                            <th>Mesero</th>
                            <th>Hora Inicio</th>
                            <th>Tiempo</th>
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
                            $ventat = \App\Ventadelivery::where('idventa', $i)->get();
                            $venta = $ventat->first();

                            $vcompl = \App\Ventacafe::where('idventa', $venta->idventa)->first();
                        ?>
                        @if($venta != null && $pas == true)
                        @if(!$vcompl)
                        <tbody>
                            <tr>
                                <td >{{ $venta->id }}</td>
                                <td>{{\App\Delivery::find($venta->idservicio)->nombre}}</td>
                                <td >{{\App\Usercafe::find($venta->idmesero)->name}}</td>
                                <td ></td>
                                <td ></td>
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
                                                
                                                <form action="{{route('ventadelivery.destroy', $venta->idventa)}}" method="post">
                                                {{csrf_field()}}
                                                
                                                <input name="_method" type="hidden" value="DELETE">
                                                    
                                                    <div class="col-md-8">
                                                        <p>Seguro que desea eliminar este venta?</p>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class=" btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="exampleModal-{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cambiar servicio</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('ventadelivery.update', $venta->idventa)}}" method="post">
                                                {{csrf_field()}}
                                            
                                                    
                                                    <div class="col-md-8">
                                                    <select class="custom-select" name="idservicio">
                                                        <?php
                                                            $servicios = \App\Delivery::all();
                                                        ?>
                                                        @foreach($servicios as $servicio)
                                                        @if($servicio->id != $venta->idservicio)
                                                        <option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class=" btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Cambiar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="exampleModa-{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModaLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModaLabel">Procesar Venta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form action="{{route('ventacompletadelivery.store', $venta->idventa)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="idventa" class="collapse" value="{{$venta->idventa}}">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label class="col-md-6">Cliente</label>
                                                        <select class="custom-select" name="idcliente">
                                                            @foreach($clientes as $cliente)
                                                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-md-6">Propina</label>
                                                        <input class="form-control" name="propina" value="0">
                                                    </div> 
                                                </div>

                                                <div class="form-group row ">
                                                    <div class="col-md-6">
                                                        <label class="col-md-6">Descuento</label>
                                                        <input class="form-control" name="descuento" id="descuento" value="0" onchange="cambio()">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-md-6">Efectivo</label>
                                                        <input class="form-control" name="efectivo" value="0">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label class="col-md-6">Tipo</label>
                                                        <select class="custom-select" name="idpago">
                                                            @foreach($tipos as $tipo)
                                                            <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-md-6">Pago</label>
                                                        <select class="custom-select" name="idtipopago">
                                                            @foreach($pagos as $pago)
                                                            <option value="{{$pago->id}}">{{$pago->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label class="col-md-6">Entrega</label>
                                                        <select class="custom-select" name="idestado">
                                                            @foreach($estados as $estado)
                                                            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div>
                                                    <table class="table table-sm w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Cantidad</th>
                                                                <th>Nombre</th>
                                                                <th>Precio</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                            $vent = \App\Ventadelivery::where('idventa', $venta->idventa)->get();
                                                            $total = 0;
                                                        ?>
                                                        <tbody>
                                                            @foreach($vent as $v)
                                                            <tr>
                                                                <td>{{$v->cantidad}}</td>
                                                                <td>{{\App\Productocafe::find($v->idproducto)->nombre}}</td>
                                                                <td>{{\App\Productocafe::find($v->idproducto)->precio_salida}}</td>
                                                                <td>{{$v->cantidad * \App\Productocafe::find($v->idproducto)->precio_salida}}</td>
                                                            </tr>
                                                            <?php
                                                                $total += $v->cantidad * \App\Productocafe::find($v->idproducto)->precio_salida; 
                                                            ?>
                                                            @endforeach
                                                        </tbody>
                                                        <?php
                                                            $configuracion = \App\Configuracioncafe::first();
                                                        ?>
                                                        <tr>
                                                            <td>Subtotal</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td id="subtotal">{{$total - ($total * ($configuracion->valor_impuesto/100))}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{$configuracion->nombre_impuesto}} ({{$configuracion->valor_impuesto}}%)</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td id="iva">{{$total * ($configuracion->valor_impuesto/100)}}</td>
                                                            <input class="collapse" value="{{$configuracion->valor_impuesto/100}}" id="iva2">
                                                        </tr>
                                                        <tr>
                                                            <td>Total</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td id="total">{{$total}}</td>
                                                            <input name="total" class="collapse" value="{{$total}}" id="total2">
                                                        </tr>

                                                    </table>

                                                </div>
                                                    
                                                   
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class=" btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Procesar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if($venta->pendiente == '1')
                                <a type="button" data-toggle="modal" data-target="#exampleModal-{{ $venta->id }}"class="btn-sm btn btn-primary " style="    margin: 0em 0.2em 0em 0.2em;">Cambiar servicio</a>

                                
                                <a type="button" data-toggle="modal" data-target="#exampleModa-{{ $venta->id }}"class="btn-sm btn btn-success " style="    margin: 0em 0.2em 0em 0.2em;">Procesar</a>
                                @else
                                <a class="btn-sm btn btn-secondary " style="    margin: 0em 0.2em 0em 0.2em;">Venta finalizada</a>
                                @endif
                              

                                <a href="{{ route('factura.pdf',$venta->idventa) }}" type="button" class="btn-sm btn btn-primary btn-circle"><i class="fa fa-ticket-alt"></i></a>
                                        
                                <a type="button" data-toggle="modal" data-target="#exampleModal2-{{ $venta->id }}"class="btn-sm btn btn-danger btn-circle" style="    margin: 0em 0.2em 0em 0.2em;"><i class="fas fa-trash"></i></a>
                                
                           </td>
                            </tr>
                        </tbody>
                    @endif  
                    @endif  
                    @endif 
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