@extends('teduacafe.layouts.app')

@section('content')
<div class="container-fluid">     
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ventas por entregar</h1>
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
                            <th>Total</th>
                            <th>Fecha</th>
                            <th style="width: 300px;">Acciones</th>
                        </tr>
                    </thead>
                  
                    <?php
                        $total2 = 0;
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
                            $ventat = \App\Ventapendiente::where('idventa', $i)->get();
                            $venta = $ventat->first();

                            $vcompl = \App\Ventacafe::where('idventa', $venta->idventa)->first();
                        ?>

                        @foreach($ventat as $vt)
                        <?php
                            $total2 += $vt->cantidad * \App\Productocafe::find($vt->idproducto)->precio_salida; 
                        ?>

                        @endforeach
                        @if($ventaa->idestado != '1')
                        <tbody>
                            <tr>
                                <td>{{ $venta->id }}</td>
                                <td>{{\App\Mesa::find($venta->idmesa)->nombre}}</td>
                                <td>{{\App\Usercafe::find($venta->idmesero)->name}}</td>
                                <td>{{$total2}}</td>
                                <td>{{ $venta->created_at->format('d/m/Y') }}</td>
                                <td class="d-flex" >
                                    <form action="{{ route('cocina.entregado', $venta->idventa) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning">Entregar</button>
                                    </form>
                                
                           </td>
                            </tr>
                        </tbody>
                        @endif 
                    @endif  
              
                    <?php
                        $total2 = 0;

                    ?> 

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